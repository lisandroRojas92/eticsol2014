<?php

namespace Eticsol\EticsolBundle\Controller;

use Eticsol\EticsolBundle\Entity\Detalle;
use Eticsol\EticsolBundle\Entity\Factura;
use Eticsol\EticsolBundle\Form\FacturaFilterType;
use Eticsol\EticsolBundle\Form\FacturaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

/**
 * Factura controller.
 *
 */
class FacturaController extends Controller
{

    /**
     * Lists all Factura entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EticsolBundle:Factura')->findAll();
        
        $filterForm = $this->createForm(new FacturaFilterType());

         if($request->getMethod()=='POST'){
             $filterForm->handleRequest($request);
             if($filterForm->isValid()){
                 $arrayFiltros = $filterForm->getData();
                 
                 $serviciosBusqueda = $this->get('factura.buscador');
                 $entities = $serviciosBusqueda->getAcFacturaFiltradas($arrayFiltros);
             }
         }
        
        return $this->render('EticsolBundle:Factura:index.html.twig', array(
            'entities' => $entities, 
            'filter_form'=> $filterForm->createView(),
        ));
    }
    /**
     * Creates a new Factura entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Factura();
                    
        $form = $this->createCreateForm($entity);
        
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            /*metodo creado el 27-08-14*/
            $detalles=$entity->getDetalles();
            foreach ($detalles as $detalle){
                $detalle->setFactura($entity);
            }
            $em->persist($entity);
            $em->flush();
             return $this->redirect($this->generateUrl('factura_show', array('id' => $entity->getId())));
        }

        return $this->render('EticsolBundle:Factura:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Factura entity.
     *
     * @param Factura $entity The entity
     *
     * @return Form The form
     */
    private function createCreateForm(Factura $entity)
    {
        $form = $this->createForm(new FacturaType(), $entity, array(
            'action' => $this->generateUrl('factura_create'),
            'method' => 'POST',
        ));

//        $form->add('submit', 'submit', array('label' => 'Create'));
//       $form->add('button', 'button', array('label' => 'Nuevo Detalle'));
        return $form;
    }

    /**
     * Displays a form to create a new Factura entity.
     *
     */
    public function newAction()
    {
        $entity = new Factura();
       /*  permite concatenar en el formulario de factura el type dactura*/
       $detalles= new Detalle();
              /*agrega el detalle al type de formuarios */
       $entity->addDetalle($detalles);  
           /* genera la nueva vista de la factura*/
       $form   = $this->createCreateForm($entity);

        return $this->render('EticsolBundle:Factura:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(), 
        ));
        
    }

    /**
     * Finds and displays a Factura entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EticsolBundle:Factura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Factura entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EticsolBundle:Factura:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Factura entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EticsolBundle:Factura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Factura entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EticsolBundle:Factura:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Factura entity.
    *
    * @param Factura $entity The entity
    *
    * @return Form The form
    */
    private function createEditForm(Factura $entity)
    {
        $form = $this->createForm(new FacturaType(), $entity, array(
            'action' => $this->generateUrl('factura_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar'));

        return $form;
    }
    /**
     * Edits an existing Factura entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EticsolBundle:Factura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Factura entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('factura_edit', array('id' => $id)));
        }

        return $this->render('EticsolBundle:Factura:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Factura entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EticsolBundle:Factura')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Factura entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('factura'));
    }

    /**
     * Creates a form to delete a Factura entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('factura_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
