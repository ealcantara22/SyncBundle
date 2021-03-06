<?php

namespace NTI\SyncBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * SyncNewItemStateRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SyncNewItemStateRepository extends EntityRepository
{
    public function findFromTimestampAndMapping($mappingName, $timestamp) {
        $qb = $this->createQueryBuilder('s');
        $qb ->innerJoin('s.mapping', 'm')
            ->andWhere('m.name = :mappingName')
            ->setParameter('mappingName', $mappingName)
            ->andWhere('s.timestamp >= :timestamp')
            ->setParameter('timestamp', $timestamp)
            ->orderBy('s.timestamp', 'asc');
        return $qb->getQuery()->getResult();
    }
}
