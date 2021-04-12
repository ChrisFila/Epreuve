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
    private $nomCommercial;

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
    private $contreIndications;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixEchantillon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $famille;

    /**
     * @ORM\OneToMany(targetEntity=Presentation::class, mappedBy="medicament")
     */
    private $presentations;

    public function __construct()
    {
        $this->presentations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCommercial(): ?string
    {
        return $this->nomCommercial;
    }

    public function setNomCommercial(string $nomCommercial): self
    {
        $this->nom_commercial = $nomCommercial;

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
        return $this->contreIndications;
    }

    public function setContreIndications(string $contreIndications): self
    {
        $this->contre_indications = $contreIndications;

        return $this;
    }

    public function getPrixEchantillon(): ?int
    {
        return $this->prixEchantillon;
    }

    public function setPrixEchantillon(int $prixEchantillon): self
    {
        $this->prix_echantillon = $prixEchantillon;

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
     * @return Collection|Presentation[]
     */
    public function getPresentations(): Collection
    {
        return $this->presentations;
    }

    public function addPresentation(Presentation $presentation): self
    {
        if (!$this->presentations->contains($presentation)) {
            $this->presentations[] = $presentation;
            $presentation->setMedicament($this);
        }

        return $this;
    }

    public function removePresentation(Presentation $presentation): self
    {
        if ($this->presentations->removeElement($presentation)) {
            // set the owning side to null (unless already changed)
            if ($presentation->getMedicament() === $this) {
                $presentation->setMedicament(null);
            }
        }

        return $this;
    }
}
