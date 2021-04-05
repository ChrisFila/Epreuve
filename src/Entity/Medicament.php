<?php

namespace App\Entity;

use App\Repository\MedicamentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedicamentRepository::class)
 */
class Medicament
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
    private $nom_commercial;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $composition;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $effets;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contre_indications;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix_echantillon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $famille;

    /**
     * @ORM\ManyToMany(targetEntity=CompteRendu::class, mappedBy="presentation")
     */
    private $compteRendus;

    public function __construct()
    {
        $this->compteRendus = new ArrayCollection();
    }

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCommercial(): ?string
    {
        return $this->nom_commercial;
    }

    public function setNomCommercial(string $nom_commercial): self
    {
        $this->nom_commercial = $nom_commercial;

        return $this;
    }

    public function getComposition(): ?string
    {
        return $this->composition;
    }

    public function setComposition(string $composition): self
    {
        $this->composition = $composition;

        return $this;
    }

    public function getEffets(): ?string
    {
        return $this->effets;
    }

    public function setEffets(string $effets): self
    {
        $this->effets = $effets;

        return $this;
    }

    public function getContreIndications(): ?string
    {
        return $this->contre_indications;
    }

    public function setContreIndications(string $contre_indications): self
    {
        $this->contre_indications = $contre_indications;

        return $this;
    }

    public function getPrixEchantillon(): ?int
    {
        return $this->prix_echantillon;
    }

    public function setPrixEchantillon(int $prix_echantillon): self
    {
        $this->prix_echantillon = $prix_echantillon;

        return $this;
    }

    public function getFamille(): ?string
    {
        return $this->famille;
    }

    public function setFamille(string $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * @return Collection|CompteRendu[]
     */
    public function getCompteRendus(): Collection
    {
        return $this->compteRendus;
    }

    public function addCompteRendu(CompteRendu $compteRendu): self
    {
        if (!$this->compteRendus->contains($compteRendu)) {
            $this->compteRendus[] = $compteRendu;
            $compteRendu->addPresentation($this);
        }

        return $this;
    }

    public function removeCompteRendu(CompteRendu $compteRendu): self
    {
        if ($this->compteRendus->removeElement($compteRendu)) {
            $compteRendu->removePresentation($this);
        }

        return $this;
    }
}
