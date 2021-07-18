<?php

namespace App\Entity;

use App\Repository\ConciertoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConciertoRepository::class)
 */
class Concierto
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
    private $numero_espectadores;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rentabilidad;

    /**
     * @ORM\ManyToMany(targetEntity=Grupo::class, mappedBy="conciertos", cascade={"persist"})
     */
    private $grupos;

    /**
     * @ORM\ManyToMany(targetEntity=Medio::class, mappedBy="conciertos", cascade={"persist"})
     */
    private $medios;

    /**
     * @ORM\ManyToOne(targetEntity=Promotor::class, inversedBy="conciertos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $promotor;

    /**
     * @ORM\ManyToOne(targetEntity=Recinto::class, inversedBy="conciertos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $recinto;

    public function __construct()
    {
        $this->grupos = new ArrayCollection();
        $this->medios = new ArrayCollection();
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

    public function getNumeroEspectadores(): ?int
    {
        return $this->numero_espectadores;
    }

    public function setNumeroEspectadores(int $numero_espectadores): self
    {
        $this->numero_espectadores = $numero_espectadores;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getRentabilidad(): ?int
    {
        return $this->rentabilidad;
    }

    public function setRentabilidad(int $rentabilidad): self
    {
        $this->rentabilidad = $rentabilidad;

        return $this;
    }

    public function getIdPromotor(): ?int
    {
        return $this->id_promotor;
    }

    public function setIdPromotor(int $id_promotor): self
    {
        $this->id_promotor = $id_promotor;

        return $this;
    }

    public function getIdRecinto(): ?int
    {
        return $this->id_recinto;
    }

    public function setIdRecinto(int $id_recinto): self
    {
        $this->id_recinto = $id_recinto;

        return $this;
    }

    /**
     * @return Collection|Grupo[]
     */
    public function getGrupos(): Collection
    {
        return $this->grupos;
    }

    public function addGrupo(Grupo $grupo): self
    {
        if (!$this->grupos->contains($grupo)) {
            $this->grupos[] = $grupo;
            $grupo->addConcierto($this);
        }

        return $this;
    }

    public function removeGrupo(Grupo $grupo): self
    {
        if ($this->grupos->removeElement($grupo)) {
            $grupo->removeConcierto($this);
        }

        return $this;
    }

    /**
     * @return Collection|Medio[]
     */
    public function getMedios(): Collection
    {
        return $this->medios;
    }

    public function addMedio(Medio $medio): self
    {
        if (!$this->medios->contains($medio)) {
            $this->medios[] = $medio;
            $medio->addConcierto($this);
        }

        return $this;
    }

    public function removeMedio(Medio $medio): self
    {
        if ($this->medios->removeElement($medio)) {
            $medio->removeConcierto($this);
        }

        return $this;
    }

    public function getPromotor(): ?Promotor
    {
        return $this->promotor;
    }

    public function setPromotor(?Promotor $promotor): self
    {
        $this->promotor = $promotor;

        return $this;
    }

    public function getRecinto(): ?Recinto
    {
        return $this->recinto;
    }

    public function setRecinto(?Recinto $recinto): self
    {
        $this->recinto = $recinto;

        return $this;
    }
}
