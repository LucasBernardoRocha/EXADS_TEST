<?php

namespace App\Entity;

use App\Repository\TvSeriesIntervalsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TvSeriesIntervalsRepository::class)]
class TvSeriesIntervals
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'tvSeriesIntervals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TvSeries $tv_series = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $week_day = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $show_time = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTvSeries(): ?TvSeries
    {
        return $this->tv_series;
    }

    public function setTvSeries(?TvSeries $tv_series): static
    {
        $this->tv_series = $tv_series;

        return $this;
    }

    public function getWeekDay(): ?int
    {
        return $this->week_day;
    }

    public function setWeekDay(int $week_day): static
    {
        $this->week_day = $week_day;

        return $this;
    }

    public function getShowTime(): ?\DateTimeInterface
    {
        return $this->show_time;
    }

    public function setShowTime(\DateTimeInterface $show_time): static
    {
        $this->show_time = $show_time;

        return $this;
    }
}
