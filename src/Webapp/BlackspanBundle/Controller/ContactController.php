<?php

namespace Webapp\BlackspanBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Webapp\BlackspanBundle\Entity\Contact;
use Webapp\BlackspanBundle\Form\ContactType;

class ContactController extends Controller {

public function contactAction() {

        $contact = new Contact();
        $form = $this->createForm(new ContactType(), $contact);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {

                $message = \Swift_Message::newInstance()
                        ->setSubject('Contact ContactType Blackspan')
                        ->setFrom('yacouba.ouologuem@gmail.com')
                        ->setTo(
                                $this->container
                                        ->getParameter(
                                                'webapp_blackspan.emails.contact_email'))
                        ->setBody(
                                $this
                                        ->renderView(
                                                'WebappBlackspanBundle:Contact:contactEmail.txt.twig',
                                                array('contact' => $contact)));
                $this->get('mailer')->send($message);
                $this->get('session')->setFlash('info', 'Message envoyé');
                return $this->redirect($this->generateUrl('blackspan_contact'));
            }
        }
        return $this
                ->render('WebappBlackspanBundle:Contact:contact.html.twig',
                        array('form' => $form->createView()));
    }
}