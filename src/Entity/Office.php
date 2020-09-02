<?php

namespace App\Entity;

use App\Repository\OfficeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=OfficeRepository::class)
 */
class Office
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
    private $address;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $number;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $floors;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $workingHours;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $employeesWorkingOnCleaning;

    /**
     * @ORM\ManyToMany(targetEntity=Employee::class, mappedBy="offices")
     */
    private $employees;



    public function __construct()
    {
        $this->employees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

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

    public function getFloors(): ?int
    {
        return $this->floors;
    }

    public function setFloors(int $floors): self
    {
        $this->floors = $floors;

        return $this;
    }

    public function getWorkingHours(): ?string
    {
        return $this->workingHours;
    }

    public function setWorkingHours(string $workingHours): self
    {
        $this->workingHours = $workingHours;

        return $this;
    }

    public function getEmployeesWorkingOnCleaning(): ?int
    {
        return $this->employeesWorkingOnCleaning;
    }

    public function setEmployeesWorkingOnCleaning(int $employeesWorkingOnCleaning): self
    {
        $this->employeesWorkingOnCleaning = $employeesWorkingOnCleaning;

        return $this;
    }

    /**
     * @return Collection|Employee[]
     */
    public function getEmployees(): Collection
    {
        return $this->employees;
    }

    public function addEmployee(Employee $employee): self
    {
        if (!$this->employees->contains($employee)) {
            $this->employees[] = $employee;
            $employee->addOffice($this);
        }

        return $this;
    }

    public function removeEmployee(Employee $employee): self
    {
        if ($this->employees->contains($employee)) {
            $this->employees->removeElement($employee);
            $employee->removeOffice($this);
        }

        return $this;
    }


}
