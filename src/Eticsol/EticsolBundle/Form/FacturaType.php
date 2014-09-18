<?php

namespace Eticsol\EticsolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FacturaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numeroFactura')
            ->add('fecha')
            ->add('iva')
            ->add('condicionPago')
            ->add('localidad')
            /*->add('detalles', 'collection', array('type' => new DetalleType(),
            ));*/
            ->add('total')
            ->add('detalles', 'collection', array('type' => new DetalleType(),
            'allow_add' => true)
                         
            );
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Eticsol\EticsolBundle\Entity\Factura',
            'cascade_validation' => true,
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
