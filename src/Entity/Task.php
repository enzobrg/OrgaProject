<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TaskRepository::class)
 */
class Task
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Months::class, inversedBy="tasks")
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Months::class, inversedBy="tasks")
     */
    private $months;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    public function __construct()
    {
        $this->name = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Months[]
     */
    public function getName(): Collection
    {
        return $this->name;
    }

    public function addName(Months $name): self
    {
        if (!$this->name->contains($name)) {
            $this->name[] = $name;
        }

        return $this;
    }

    public function removeName(Months $name): self
    {
        $this->name->removeElement($name);

        return $this;
    }

    public function getMonths(): ?Months
    {
        return $this->months;
    }

    public function setMonths(?Months $months): self
    {
        $this->months = $months;

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
}
