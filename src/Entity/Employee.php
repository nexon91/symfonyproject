<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=EmployeeRepository::class)
 */
class Employee
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
    */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank
     */
    private $employedOnDate;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $numberOfBuildings;

    /**
     * @ORM\ManyToMany(targetEntity=Office::class, inversedBy="employees")
     */
    private $offices;

    public function __construct()
    {
        $this->offices = new ArrayCollection();
    }


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

    public function getEmployedOnDate(): ?\DateTimeInterface
    {
        return $this->employedOnDate;
    }

    public function setEmployedOnDate(\DateTimeInterface $employedOnDate): self
    {
        $this->employedOnDate = $employedOnDate;

        return $this;
    }

    public function getNumberOfBuildings(): ?int
    {
        return $this->numberOfBuildings;
    }

    public function setNumberOfBuildings(int $numberOfBuildings): self
    {
        $this->numberOfBuildings = $numberOfBuildings;

        return $this;
    }

    /**
     * @return Collection|Office[]
     */
    public function getOffices(): Collection
    {
        return $this->offices;
    }

    public function addOffice(Office $office): self
    {
        if (!$this->offices->contains($office)) {
            $this->offices[] = $office;
            $office->addEmployee($this);
        }

        return $this;
    }

    public function removeOffice(Office $office): self
    {
        if ($this->offices->contains($office)) {
            $this->offices->removeElement($office);
            $office->removeEmployee($this);
        }

        return $this;
    }

}
