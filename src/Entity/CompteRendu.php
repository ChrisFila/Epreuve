<?php

namespace App\Entity;

use App\Repository\CompteRenduRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompteRenduRepository::class)
 */
class CompteRendu
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_visite;

    /**
     * @ORM\ManyToOne(targetEntity=Praticien::class, inversedBy="compteRendus")
     * @ORM\JoinColumn(nullable=false)
     */
    private $praticien;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motif;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=Presentation::class, mappedBy="compte_rendu", orphanRemoval=true)
     */
    private $presentation;

    public function __construct()
    {
        $this->presentation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateVisite(): ?\DateTimeInterface
    {
        return $this->date_visite;
    }

    public function setDateVisite(\DateTimeInterface $date_visite): self
    {
        $this->date_visite = $date_visite;

        return $this;
    }

    public function getPraticien(): ?Praticien
    {
        return $this->praticien;
    }

    public function setPraticien(?Praticien $praticien): self
    {
        $this->praticien = $praticien;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): self
    {
        $this->motif = $motif;

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
     * @return Collection|Presentation[]
     */
    public function Presentation(): Collection
    {
        return $this->presentation;
    }

    public function addPresentation(Presentation $presentation): self
    {
        if (!$this->presentation->contains($presentation)) {
            $this->presentation[] = $presentation;
            $presentation->setCompteRendu($this);
        }

        return $this;
    }

    public function removeMedicament(Presentation $medicament): self
    {
        if ($this->medicament->removeElement($medicament)) {
            // set the owning side to null (unless already changed)
            if ($medicament->getCompteRendu() === $this) {
                $medicament->setCompteRendu(null);
            }
        }

        return $this;
    }
}
