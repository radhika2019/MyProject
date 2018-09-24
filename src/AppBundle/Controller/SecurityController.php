<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Members;
use AppBundle\Form\AuthenticationType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class SecurityController extends Controller{

    /**
     * @Route("/register", name="register")
     */
    public function register(Request $request){
        $users = new members();
        $form = $this->createForm(AuthenticationType::class, $users);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $encoded = $encoder->encodePassword($users, $password);
             $users->setPassword($encoded);
             $task = $form->getData();
             // saving the data to the database
             $entityManager = $this->getDoctrine()->getManager();

             $entityManager->persist($task);
             $entityManager->flush();
        }
        return $this->render('register.html.twig', array(
            'registerform' => $form->createView(),
        ));
    }

     /**
     * @Route("/login", name="login")
     */
    public function login(Request $request){
        $users = new members();
        $form = $this->createForm(AuthenticationType::class, $users);
        $form->handleRequest($request);
        return $this->render('login.html.twig', array(
            'loginform' => $form->createView(),
        ));
        return $this->render('login.html.twig');
    }
}