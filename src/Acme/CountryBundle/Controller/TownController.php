<?php

namespace Acme\CountryBundle\Controller;

use Acme\CountryBundle\Form\Type\TownType;
use Acme\CountryBundle\Entity\Town;
use Acme\StoreBundle\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TownController extends Controller
{
    /**
     * @Route ("/town", name = "town")
     */


    public function createAction()
    {
        $town = new Town();
        $town->setName('London');
        $town->setDescription('The capital of GreatBritain');

        $em = $this->getDoctrine()->getManager();
        $em->persist($town);
        $em->flush();

        return new Response('Created product id ' . $town->getId());
    }

    /**
     * @Route("/town_new", name = "town_new")
     */
    public function newAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $countries = $em->getRepository('AcmeStoreBundle:Country')
            ->findAllOrderedByName();
        $country = [];
        foreach($countries as $value){
            $country[$value->getId()] = $value->getCountry();
        }


        // создаём задачу и присваиваем ей некоторые начальные данные для примера
        $town =  new Town();
        $form = $this->createForm(new TownType(), $town, ['country'=>$country]);
        $repository = $this->getDoctrine()
            ->getRepository('AcmeCountryBundle:Town');
        $towns = $repository->findAll();

        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);

            if ($form->isValid()) {
                $town = $form->getData();
                // выполняем прочие действие, например, сохраняем задачу в базе данных
                $em = $this->getDoctrine()->getManager();
                $em->persist($town);
                $em->flush();


            }
        }
        return $this->render('AcmeCountryBundle:Default:town.html.twig', array(
            'form' => $form->createView(),
            'towns' => $towns
        ));
    }
}
