<?php

namespace Webapp\BlackspanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Webapp\BlackspanBundle\Entity\Request;
use Webapp\BlackspanBundle\Form\RequestType;

/**
 * Request controller.
 *
 */
class RequestController extends Controller
{
    /**
     * Lists all Request entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('WebappBlackspanBundle:Request')->findAll();

        return $this->render('WebappBlackspanBundle:Request:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Request entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('WebappBlackspanBundle:Request')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Request entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WebappBlackspanBundle:Request:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Request entity.
     *
     */
    public function newAction()
    {
        $entity = new Request();
        $form   = $this->createForm(new RequestType(), $entity);

        return $this->render('WebappBlackspanBundle:Request:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Request entity.
     *
     */
    public function createAction()
    {
        $entity  = new Request();
        $request = $this->getRequest();
        $form    = $this->createForm(new RequestType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blackspan_show', array('id' => $entity->getId())));
            
        }

        return $this->render('WebappBlackspanBundle:Request:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Request entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('WebappBlackspanBundle:Request')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Request entity.');
        }

        $editForm = $this->createForm(new RequestType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WebappBlackspanBundle:Request:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Request entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('WebappBlackspanBundle:Request')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Request entity.');
        }

        $editForm   = $this->createForm(new RequestType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blackspan_edit', array('id' => $id)));
        }

        return $this->render('WebappBlackspanBundle:Request:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Request entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('WebappBlackspanBundle:Request')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Request entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blackspan'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
