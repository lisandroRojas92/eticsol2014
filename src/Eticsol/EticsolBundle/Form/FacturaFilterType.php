<?php

namespace Eticsol\EticsolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FacturaFilterType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numeroFactura','text', array(
                   'attr' => array("placeholder"=>"0002")))
                    ->add('fecha',"date")
            ->add('iva','entity',array(
                'required'=>false,
                'empty_value'=>'Seleccionar',
                'class'=>'EticsolBundle:iva',
                'property' => 'descripcion'))
            ->add('condicionPago','entity',array(
                'required'=>false,
                'empty_value'=>'Seleccionar',
                'class'=>'EticsolBundle:condicionPago',
                'property' => 'descripcion'))
            ->add('localidad','entity',array(
                'required'=>false,
                'empty_value'=>'Seleccionar',
                'class'=>'EticsolBundle:localidad',
                'property' => 'descripcion'));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection'=> false
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'eticsol_eticsolbundle_factura';
    }
}
