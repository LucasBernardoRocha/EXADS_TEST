<?php

namespace App\Service;

use App\Entity\TvSeries;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

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

    /**
     * @throws Exception
     */
    public function findNext(?string $title = null, ?int $dayOfWeek = null, ?string $dateTime = null): ?TvSeries
    {
        $now = new DateTime();

        // Use provided dayOfWeek or current day of week
        $dayOfWeek = $dayOfWeek ?? (int) $now->format('w');

        // Use provided dateTime or current time
        $dateTime = $dateTime ? new DateTime($dateTime) : $now->format('H:i:s');

        $qb = $this->entityManager->createQueryBuilder();

        $qb->select('tv')
            ->from('App\Entity\TvSeries', 'tv')
            ->leftJoin('tv.tvSeriesIntervals', 'interval')
            ->where('interval.week_day = :dayOfWeek');

        $qb->andWhere('interval.show_time >= :dateTime')
            ->setParameter('dateTime', $dateTime);

        $qb->orderBy('interval.show_time', 'ASC')
            ->setParameter('dayOfWeek', $dayOfWeek);


        if ($title) {
            $qb->andWhere('tv.title LIKE :title')
                ->setParameter('title', "%$title%");
        }

        $qb->setMaxResults(1);

        $query = $qb->getQuery();

        return $query->getOneOrNullResult();
    }
}
