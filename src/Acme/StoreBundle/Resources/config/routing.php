<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('acme_store_homepage', new Route('/product', array(
    '_controller' => 'AcmeStoreBundle:Default:create',
)));


$collection->add('acme_store_homepage', new Route('/product/{id}', array(
    '_controller' => 'AcmeStoreBundle:Default:show',
)));

return $collection;
