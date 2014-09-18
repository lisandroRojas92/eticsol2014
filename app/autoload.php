<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';

    function __construct() {
        
    }


#linea creada el dia Lunes 1 de Septiembre a las 1:35 am 

#-----------------------------------------------------------
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
