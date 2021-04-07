<?php

namespace App\Entity;

use App\Repository\PresentationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PresentationRepository::class)
 */
class Presentation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Medicament::class, inversedBy="presentations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $medicament;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite_offerte;

    /**
     * @ORM\ManyToOne(targetEntity=CompteRendu::class, inversedBy="presentation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compteRendu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMedicament(): ?Medicament
    {
        return $this->medicament;
    }

    public function setMedicament(?Medicament $medicament): self
    {
        $this->medicament = $medicament;

        return $this;
    }

    public function getQuantiteOfferte(): ?int
    {
        return $this->quantite_offerte;
    }

    public function setQuantiteOfferte(int $quantite_offerte): self
    {
        $this->quantite_offerte = $quantite_offerte;

        return $this;
    }

    public function getCompteRendu(): ?CompteRendu
    {
        return $this->compteRendu;
    }

    public function setCompteRendu(?CompteRendu $compteRendu): self
    {
        $this->compteRendu = $compteRendu;

        return $this;
    }
}
