<?php

namespace App\Repository;

use App\Entity\TvSeries;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TvSeries>
 *
 * @method TvSeries|null find($id, $lockMode = null, $lockVersion = null)
 * @method TvSeries|null findOneBy(array $criteria, array $orderBy = null)
 * @method TvSeries[]    findAll()
 * @method TvSeries[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TvSeriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TvSeries::class);
    }

    //    /**
    //     * @return TvSeries[] Returns an array of TvSeries objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('t.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?TvSeries
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
