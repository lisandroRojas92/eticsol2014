<?php

namespace Eticsol\EticsolBundle\services;

class BuscadorFactura  {
    //put your code here
    
    private $em;
    
    public function __construct(\Doctrine\ORM\EntityManager $entityManager) {
             $this->em=$entityManager;
       
    }
    
    public function getAcFacturaFiltradas($arrayFiltros){
        $factura =   $this->em->getRepository('EticsolBundle:Factura')->getAcFacturaFiltradas($arrayFiltros);
        return $factura;
    }
    
}
