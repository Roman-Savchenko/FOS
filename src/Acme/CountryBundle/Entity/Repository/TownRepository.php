<?php
namespace Acme\CountryBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

class TownRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT town FROM AcmeCountryBundle:Town town ORDER BY town.name ASC')
            ->getResult();
    }
}
