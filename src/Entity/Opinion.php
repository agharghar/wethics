<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OpinionRepository")
 */
class Opinion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $moyenne_risque;

    /**
     * @ORM\Column(type="integer")
     */
    private $moyenne_benefice;

    /**
     * @ORM\Column(type="boolean",options={"default":true})
     */
    private $flag_solution;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="opinions")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EfficaciteCO", mappedBy="opinion", cascade={"persist", "remove"})
     */
    private $efficacitecos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EfficaciteME", mappedBy="opinion", cascade={"persist", "remove"})
     */
    private $efficacitemes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ObjectifsEthics", mappedBy="opinion", cascade={"persist", "remove"})
     */
    private $objectifs_ethics;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MethodesEvaluation", mappedBy="opinion", cascade={"persist", "remove"})
     */
    private $methodes_evaluation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ModelesDeSoins", mappedBy="opinion", cascade={"persist", "remove"})
     */
    private $modele_de_soin;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ContextesDeSoin", mappedBy="opinion", cascade={"persist", "remove"})
     */
    private $contextes_de_soin;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ObjectifsDeSoin", mappedBy="opinion", cascade={"persist", "remove"})
     */
    private $objectifs_de_soins;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Probleme", inversedBy="opinions", cascade={"persist", "remove"})
     */
    private $probleme;

    public function __construct()
    {
        $this->efficacitecos = new ArrayCollection();
        $this->efficacitemes = new ArrayCollection();
        $this->objectifs_ethics = new ArrayCollection();
        $this->methodes_evaluation = new ArrayCollection();
        $this->modele_de_soin = new ArrayCollection();
        $this->contextes_de_soin = new ArrayCollection();
        $this->objectifs_de_soins = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMoyenneRisque(): ?int
    {
        return $this->moyenne_risque;
    }

    public function setMoyenneRisque(int $moyenne_risque): self
    {
        $this->moyenne_risque = $moyenne_risque;

        return $this;
    }

    public function getMoyenneBenefice(): ?int
    {
        return $this->moyenne_benefice;
    }

    public function setMoyenneBenefice(int $moyenne_benefice): self
    {
        $this->moyenne_benefice = $moyenne_benefice;

        return $this;
    }

    public function getFlagSolution(): ?bool
    {
        return $this->flag_solution;
    }

    public function setFlagSolution(bool $flag_solution): self
    {
        $this->flag_solution = $flag_solution;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|EfficaciteCO[]
     */
    public function getEfficacitecos(): Collection
    {
        return $this->efficacitecos;
    }

    public function addEfficaciteco(EfficaciteCO $efficaciteco): self
    {
        if (!$this->efficacitecos->contains($efficaciteco)) {
            $this->efficacitecos[] = $efficaciteco;
            $efficaciteco->setOpinion($this);
        }

        return $this;
    }

    public function removeEfficaciteco(EfficaciteCO $efficaciteco): self
    {
        if ($this->efficacitecos->contains($efficaciteco)) {
            $this->efficacitecos->removeElement($efficaciteco);
            // set the owning side to null (unless already changed)
            if ($efficaciteco->getOpinion() === $this) {
                $efficaciteco->setOpinion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Efficaciteme[]
     */
    public function getEfficacitemes(): Collection
    {
        return $this->efficacitemes;
    }

    public function addEfficaciteme(EfficaciteME $efficaciteme): self
    {
        if (!$this->efficacitemes->contains($efficaciteme)) {
            $this->efficacitemes[] = $efficaciteme;
            $efficaciteme->setOpinion($this);
        }

        return $this;
    }

    public function removeEfficaciteme(EfficaciteME $efficaciteme): self
    {
        if ($this->efficacitemes->contains($efficaciteme)) {
            $this->efficacitemes->removeElement($efficaciteme);
            // set the owning side to null (unless already changed)
            if ($efficaciteme->getOpinion() === $this) {
                $efficaciteme->setOpinion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ObjectifsEthics[]
     */
    public function getObjectifsEthics(): Collection
    {
        return $this->objectifs_ethics;
    }

    public function addObjectifsEthic(ObjectifsEthics $objectifsEthic): self
    {
        if (!$this->objectifs_ethics->contains($objectifsEthic)) {
            $this->objectifs_ethics[] = $objectifsEthic;
            $objectifsEthic->setOpinion($this);
        }

        return $this;
    }

    public function removeObjectifsEthic(ObjectifsEthics $objectifsEthic): self
    {
        if ($this->objectifs_ethics->contains($objectifsEthic)) {
            $this->objectifs_ethics->removeElement($objectifsEthic);
            // set the owning side to null (unless already changed)
            if ($objectifsEthic->getOpinion() === $this) {
                $objectifsEthic->setOpinion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MethodesEvaluation[]
     */
    public function getMethodesEvaluation(): Collection
    {
        return $this->methodes_evaluation;
    }

    public function addMethodesEvaluation(MethodesEvaluation $methodesEvaluation): self
    {
        if (!$this->methodes_evaluation->contains($methodesEvaluation)) {
            $this->methodes_evaluation[] = $methodesEvaluation;
            $methodesEvaluation->setOpinion($this);
        }

        return $this;
    }

    public function removeMethodesEvaluation(MethodesEvaluation $methodesEvaluation): self
    {
        if ($this->methodes_evaluation->contains($methodesEvaluation)) {
            $this->methodes_evaluation->removeElement($methodesEvaluation);
            // set the owning side to null (unless already changed)
            if ($methodesEvaluation->getOpinion() === $this) {
                $methodesEvaluation->setOpinion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ModelesDeSoins[]
     */
    public function getModeleDeSoin(): Collection
    {
        return $this->modele_de_soin;
    }

    public function addModeleDeSoin(ModelesDeSoins $modeleDeSoin): self
    {
        if (!$this->modele_de_soin->contains($modeleDeSoin)) {
            $this->modele_de_soin[] = $modeleDeSoin;
            $modeleDeSoin->setOpinion($this);
        }

        return $this;
    }

    public function removeModeleDeSoin(ModelesDeSoins $modeleDeSoin): self
    {
        if ($this->modele_de_soin->contains($modeleDeSoin)) {
            $this->modele_de_soin->removeElement($modeleDeSoin);
            // set the owning side to null (unless already changed)
            if ($modeleDeSoin->getOpinion() === $this) {
                $modeleDeSoin->setOpinion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ContextesDeSoin[]
     */
    public function getContextesDeSoin(): Collection
    {
        return $this->contextes_de_soin;
    }

    public function addContextesDeSoin(ContextesDeSoin $contextesDeSoin): self
    {
        if (!$this->contextes_de_soin->contains($contextesDeSoin)) {
            $this->contextes_de_soin[] = $contextesDeSoin;
            $contextesDeSoin->setOpinion($this);
        }

        return $this;
    }

    public function removeContextesDeSoin(ContextesDeSoin $contextesDeSoin): self
    {
        if ($this->contextes_de_soin->contains($contextesDeSoin)) {
            $this->contextes_de_soin->removeElement($contextesDeSoin);
            // set the owning side to null (unless already changed)
            if ($contextesDeSoin->getOpinion() === $this) {
                $contextesDeSoin->setOpinion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ObjectifsDeSoin[]
     */
    public function getObjectifsDeSoins(): Collection
    {
        return $this->objectifs_de_soins;
    }

    public function addObjectifsDeSoin(ObjectifsDeSoin $objectifsDeSoin): self
    {
        if (!$this->objectifs_de_soins->contains($objectifsDeSoin)) {
            $this->objectifs_de_soins[] = $objectifsDeSoin;
            $objectifsDeSoin->setOpinion($this);
        }

        return $this;
    }

    public function removeObjectifsDeSoin(ObjectifsDeSoin $objectifsDeSoin): self
    {
        if ($this->objectifs_de_soins->contains($objectifsDeSoin)) {
            $this->objectifs_de_soins->removeElement($objectifsDeSoin);
            // set the owning side to null (unless already changed)
            if ($objectifsDeSoin->getOpinion() === $this) {
                $objectifsDeSoin->setOpinion(null);
            }
        }

        return $this;
    }

    public function getProbleme(): ?Probleme
    {
        return $this->probleme;
    }

    public function setProbleme(?Probleme $probleme): self
    {
        $this->probleme = $probleme;

        return $this;
    }
}
