<?php

namespace App\Service;

use App\Entity\TvSeries;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Service
 */
class TvSeriesService
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findNext(): TvSeries
    {
        // Get the current day and time
        $now = new DateTime();
        $dayOfWeek = (int) $now->format('w'); // 0 (Sunday) to 6 (Saturday)
        $currentTime = $now->format('H:i:s');

        $qb = $this->entityManager->createQueryBuilder();

        $qb->select('tv')
            ->from('App\Entity\TvSeries', 'tv')
            ->leftJoin('tv.tvSeriesIntervals', 'interval')
            ->where('interval.week_day = :dayOfWeek')
            ->andWhere('interval.show_time > :currentTime')
            ->orderBy('interval.show_time', 'ASC')
            ->setParameter('dayOfWeek', $dayOfWeek)
            ->setParameter('currentTime', $currentTime)
            ->setMaxResults(1); // Limit to 1 result

        $query = $qb->getQuery();

        return $query->getOneOrNullResult();
    }
}
