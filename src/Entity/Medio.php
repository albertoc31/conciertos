<?php

namespace App\Entity;

use App\Repository\MedioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedioRepository::class)
 */
class Medio
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
     * @ORM\ManyToMany(targetEntity=Concierto::class, inversedBy="medios", cascade={"persist"})
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
        }

        return $this;
    }

    public function removeConcierto(Concierto $concierto): self
    {
        $this->conciertos->removeElement($concierto);

        return $this;
    }

    // Registra el método mágico para imprimir el nombre
    public function __toString() {
        return $this->name;
    }
}
