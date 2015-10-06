<?php
namespace Acme\StoreBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class CountryRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT country FROM AcmeStoreBundle:Country country ORDER BY country.country ASC'
            )
            ->getResult();
    }
}