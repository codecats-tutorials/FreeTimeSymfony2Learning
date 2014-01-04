<?php

namespace Acme\StoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductRepository extends EntityRepository
{
    public function findAllByName() 
    {
        return $this->getEntityManager()->createQuery('
            SELECT p FROM AcmeStoreBundle:Product p ORDER BY p.name ASC
        ')->getResult();
    }
    
    public function findOneByIdJonedToCategory($id)
    {
        $query = $this->getEntityManager()->createQuery('
                SELECT p, c FROM AcmeStoreBundle:Product p
                JOIN p.category c
                WHERE p.id = :id
        ')->setParameter('id', $id);
        
        try {
            return $query->getSingleResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}
