<?php

namespace App\Entity;

use App\Repository\BuildingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BuildingRepository::class)
 */
class Building
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $windows;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $overtime;

    /**
     * @ORM\Column(type="date")
     */
    private $date_washed;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getWindows(): ?string
    {
        return $this->windows;
    }

    public function setWindows(string $windows): self
    {
        $this->windows = $windows;

        return $this;
    }

    public function getOvertime(): ?string
    {
        return $this->overtime;
    }

    public function setOvertime(string $overtime): self
    {
        $this->overtime = $overtime;

        return $this;
    }

    public function getDateWashed(): ?\DateTimeInterface
    {
        return $this->date_washed;
    }

    public function setDateWashed(\DateTimeInterface $date_washed): self
    {
        $this->date_washed = $date_washed;

        return $this;
    }
}
