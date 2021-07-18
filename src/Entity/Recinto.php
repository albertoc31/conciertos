<?php

namespace App\Entity;

use App\Repository\RecintoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecintoRepository::class)
 */
class Recinto
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
    private $coste_alquiler;

    /**
     * @ORM\Column(type="integer")
     */
    private $precio_entrada;

    /**
     * @ORM\OneToMany(targetEntity=Concierto::class, mappedBy="recinto")
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

    public function getCosteAlquiler(): ?int
    {
        return $this->coste_alquiler;
    }

    public function setCosteAlquiler(int $coste_alquiler): self
    {
        $this->coste_alquiler = $coste_alquiler;

        return $this;
    }

    public function getPrecioEntrada(): ?int
    {
        return $this->precio_entrada;
    }

    public function setPrecioEntrada(int $precio_entrada): self
    {
        $this->precio_entrada = $precio_entrada;

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
            $concierto->setRecinto($this);
        }

        return $this;
    }

    public function removeConcierto(Concierto $concierto): self
    {
        if ($this->conciertos->removeElement($concierto)) {
            // set the owning side to null (unless already changed)
            if ($concierto->getRecinto() === $this) {
                $concierto->setRecinto(null);
            }
        }

        return $this;
    }
}
