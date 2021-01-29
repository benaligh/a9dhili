<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact_view")
     */
    public function index()
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact,
            [
                'action' => $this->generateUrl('contact_add')
            ]
        );

        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/addContact", name="contact_add")
     */
    public function addContact(Request $request, EntityManagerInterface $em)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($contact);
            $em->flush();
            $this->addFlash('success', 'Message envoyé avec succès');
        }

        return $this->forward('App\Controller\ContactController::index');
    }
}
