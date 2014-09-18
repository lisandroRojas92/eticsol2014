<?php

namespace Eticsol\EticsolBundle\Entity;

use Doctrine\ORM\EntityRepository;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FacturaRepository
 *
 * @author Rojas Lisandro
 */
class FacturaRepository extends EntityRepository {

    //put your code here

    
    
     public function getAcFacturaFiltradas($filtrosArray) {
       $gb = $this->createQueryBuilder('f');
       
      if ($filtrosArray['numeroFactura']) {
            $gb->where('f.numeroFactura = :nroFactura')
              ->setParameter('nroFactura', $filtrosArray['numeroFactura']);
       }
    
        
        return $gb->getQuery()->getResult();
     }
}