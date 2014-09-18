<?php

namespace Eticsol\EticsolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EticsolController extends Controller
{
    public function inicioAction()
    {
        return $this->render('EticsolBundle:Eticsol:index.html.twig');
    }
}
