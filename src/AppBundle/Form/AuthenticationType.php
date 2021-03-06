<?php
namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class AuthenticationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class)
            ->add('email', TextType::class)
            ->add('status', HiddenType::class, array('data' => '1'))
            ->add('password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array(
                    'label' => 'Password'
                ),
                'second_options'  => array(
                    'label' => 'Password Confirm'
                ),
              ));
    }

}
?>
