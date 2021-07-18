<?php

namespace App\Entity;

use App\Repository\PromotorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PromotorRepository::class)
 */
class Promotor
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
     * @ORM\OneToMany(targetEntity=Concierto::class, mappedBy="promotor")
     */
    private $conciertos;

    public function __construct()
    {
        $this->conciertos = new ArrayCollection();
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

    /**
     * @return Collection|Concierto[]
     */
    public function getConciertos(): Collection
    {
        return $this->conciertos;
    }

    public function addConcierto(Concierto $concierto): self
    {
        if (!$this->conciertos->contains($concierto)) {
            $this->conciertos[] = $concierto;
            $concierto->setPromotor($this);
        }

        return $this;
    }

    public function removeConcierto(Concierto $concierto): self
    {
        if ($this->conciertos->removeElement($concierto)) {
            // set the owning side to null (unless already changed)
            if ($concierto->getPromotor() === $this) {
                $concierto->setPromotor(null);
            }
        }

        return $this;
    }
}
