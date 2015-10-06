<?php
// src/Acme/StoreBundle/Controller/TownController.php
namespace Acme\StoreBundle\Controller;

use Acme\StoreBundle\Entity\User;
use Acme\StoreBundle\Entity\Country;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Acme\StoreBundle\Form\Type\CountryType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/task_new", name = "task_new")
     */
    public function newAction(Request $request)
    {
        // создаём задачу и присваиваем ей некоторые начальные данные для примера
        $country = new Country();

        $form = $this->createFormBuilder($country)
            ->add('country', 'text')
            ->getForm();

        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);

            if ($form->isValid()) {
                $country = $form->getData();
                // выполняем прочие действие, например, сохраняем задачу в базе данных
                $em = $this->getDoctrine()->getManager();
                $em->persist($country);
                $em->flush();


            }
        }

        return $this->render('AcmeStoreBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'StoreBundle\Entity\Country',
        ));
    }
    /**
     * @Route("/product")
     */
    public function createProductAction()
    {
        $con = array ('Paris','London','Ukraine');
        $em = $this->getDoctrine()->getManager();

        $user = new User();
        $user->setUser('Ivanov');

        foreach($con as $value){
            $country = new Country();
            $country->setCountry($value);
            $em->persist($country);
            $user->addCountry($country);
            $country->addUser($user);
        }

        $em->persist($user);
        $em->flush();

        return new Response(
            'Created product id: '.$user->getId().' and category id: '.$country->getId()
        );
    }

    /**
     * @Route("/product/create")
     */
    public function createProduct1Action()
    {
        $con = array ('France','Italy','Ukraine','Russia','Moldova','Poland');
        $em = $this->getDoctrine()->getManager();

        $countries = [];
        foreach($con as $value){
            $country = new Country();
            $country->setCountry($value);
            $em->persist($country);
            $countries[$value]= $country;
        }

        $users = [];
        $con = array ('User 1','User 2','User 3');
        foreach($con as $value){
            $user = new User();
            $user->setUser($value);
            $em->persist($user);
            $users[$value]= $user;
        }


        foreach ($countries as $country) {
            /**
             * @var $user User
             */
            $user = $users['User 1'];
            $user->addCountry($country);

        }

        /**
         * @var $country Country
         */
        $country = $countries['Ukraine'];
        foreach($users as $user) {
            $country->addUser($user);
        }


        $em->flush();

        return new Response(
            'Done'
            #'Created product id: '.$user->getId().' and category id: '.$country->getId()
        );
    }

    /**
     * @Route("/product/{id}")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AcmeStoreBundle:User')->find($id);

        if (!$user) {
            throw $this->createNotFoundException('No product found for id '.$id);
        }

        //$country = $user->getCountries();

        return $this->render('AcmeStoreBundle:Country:country.html.twig',
            array(
             //   'countries' => $country,
                'user' => $user
            )
        );
    }
}
?>