<?php

namespace App\Entity;

use App\Repository\GrupoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GruposRepository::class)
 */
class Grupo
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
    private $cache;

    /**
     * @ORM\ManyToMany(targetEntity=Concierto::class, inversedBy="grupos", cascade={"persist"})
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

    public function getCache(): ?int
    {
        return $this->cache;
    }

    public function setCache(int $cache): self
    {
        $this->cache = $cache;

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
}
