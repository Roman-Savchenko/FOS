<?php

// Acme/StoreBundle/Form/Type/CountryType.php
namespace Acme\StoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CountryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('country')
            ->add('save', 'submit')
        ;
    }

    public function getName()
    {
        return 'country';
    }
}5
?>