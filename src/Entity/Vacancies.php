<?php

namespace App\Entity;

use App\Repository\VacanciesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VacanciesRepository::class)
 */
class Vacancies
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
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
    private $wage;

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $wage_currency;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Companies::class, inversedBy="vacancies")
     */
    private $company;

    public function __construct()
    {
        $this->company = new ArrayCollection();
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

    public function getWage(): ?string
    {
        return $this->wage;
    }

    public function setWage(string $wage): self
    {
        $this->wage = $wage;

        return $this;
    }

    public function getWageCurrency(): ?string
    {
        return $this->wage_currency;
    }

    public function setWageCurrency(string $wage_currency): self
    {
        $this->wage_currency = $wage_currency;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Companies[]
     */
    public function getCompany(): Collection
    {
        return $this->company;
    }

    public function addCompany(Companies $company): self
    {
        if (!$this->company->contains($company)) {
            $this->company[] = $company;
        }

        return $this;
    }

    public function removeCompany(Companies $company): self
    {
        $this->company->removeElement($company);

        return $this;
    }
}
