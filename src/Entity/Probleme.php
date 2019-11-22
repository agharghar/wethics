<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProblemeRepository")
 */
class Probleme
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_mise_online;

    /**
     * @ORM\Column(type="boolean",options={"default":true})
     */
    private $fermer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="problemes")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ObjectifsDeSoin", mappedBy="probleme", cascade={"persist", "remove"})
     */
    private $objectifsDeSoin;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ContextesDeSoin", mappedBy="probleme", cascade={"persist", "remove"})
     */
    private $contextesDeSoin;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MethodesEvaluation", mappedBy="probleme", cascade={"persist", "remove"})
     */
    private $methodesEvaluation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ModelesDeSoins", mappedBy="probleme", cascade={"persist", "remove"})
     */
    private $ModelesDeSoins;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ObjectifsEthics", mappedBy="probleme", cascade={"persist", "remove"})
     */
    private $objectifsEthics;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Opinion", mappedBy="probleme", cascade={"persist", "remove"})
     */
    private $opinions;

    public function __construct()
    {
        $this->objectifsDeSoin = new ArrayCollection();
        $this->contextesDeSoin = new ArrayCollection();
        $this->methodesEvaluation = new ArrayCollection();
        $this->ModelesDeSoins = new ArrayCollection();
        $this->objectifsEthics = new ArrayCollection();
        $this->opinions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

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

    public function getDateMiseOnline(): ?\DateTimeInterface
    {
        return $this->date_mise_online;
    }

    public function setDateMiseOnline(\DateTimeInterface $date_mise_online): self
    {
        $this->date_mise_online = $date_mise_online;

        return $this;
    }

    public function getFermer(): ?bool
    {
        return $this->fermer;
    }

    public function setFermer(bool $fermer): self
    {
        $this->fermer = $fermer;

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
     * @return Collection|ObjectifsDeSoin[]
     */
    public function getObjectifsDeSoin(): Collection
    {
        return $this->objectifsDeSoin;
    }

    public function addObjectifsDeSoin(ObjectifsDeSoin $objectifsDeSoin): self
    {
        if (!$this->objectifsDeSoin->contains($objectifsDeSoin)) {
            $this->objectifsDeSoin[] = $objectifsDeSoin;
            $objectifsDeSoin->setProbleme($this);
        }

        return $this;
    }

    public function removeObjectifsDeSoin(ObjectifsDeSoin $objectifsDeSoin): self
    {
        if ($this->objectifsDeSoin->contains($objectifsDeSoin)) {
            $this->objectifsDeSoin->removeElement($objectifsDeSoin);
            // set the owning side to null (unless already changed)
            if ($objectifsDeSoin->getProbleme() === $this) {
                $objectifsDeSoin->setProbleme(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ContextesDeSoin[]
     */
    public function getContextesDeSoin(): Collection
    {
        return $this->contextesDeSoin;
    }

    public function addContextesDeSoin(ContextesDeSoin $contextesDeSoin): self
    {
        if (!$this->contextesDeSoin->contains($contextesDeSoin)) {
            $this->contextesDeSoin[] = $contextesDeSoin;
            $contextesDeSoin->setProbleme($this);
        }

        return $this;
    }

    public function removeContextesDeSoin(ContextesDeSoin $contextesDeSoin): self
    {
        if ($this->contextesDeSoin->contains($contextesDeSoin)) {
            $this->contextesDeSoin->removeElement($contextesDeSoin);
            // set the owning side to null (unless already changed)
            if ($contextesDeSoin->getProbleme() === $this) {
                $contextesDeSoin->setProbleme(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MethodesEvaluation[]
     */
    public function getMethodesEvaluation(): Collection
    {
        return $this->methodesEvaluation;
    }

    public function addMethodesEvaluation(MethodesEvaluation $methodesEvaluation): self
    {
        if (!$this->methodesEvaluation->contains($methodesEvaluation)) {
            $this->methodesEvaluation[] = $methodesEvaluation;
            $methodesEvaluation->setProbleme($this);
        }

        return $this;
    }

    public function removeMethodesEvaluation(MethodesEvaluation $methodesEvaluation): self
    {
        if ($this->methodesEvaluation->contains($methodesEvaluation)) {
            $this->methodesEvaluation->removeElement($methodesEvaluation);
            // set the owning side to null (unless already changed)
            if ($methodesEvaluation->getProbleme() === $this) {
                $methodesEvaluation->setProbleme(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ModelesDeSoins[]
     */
    public function getModelesDeSoins(): Collection
    {
        return $this->ModelesDeSoins;
    }

    public function addModelesDeSoin(ModelesDeSoins $modelesDeSoin): self
    {
        if (!$this->ModelesDeSoins->contains($modelesDeSoin)) {
            $this->ModelesDeSoins[] = $modelesDeSoin;
            $modelesDeSoin->setProbleme($this);
        }

        return $this;
    }

    public function removeModelesDeSoin(ModelesDeSoins $modelesDeSoin): self
    {
        if ($this->ModelesDeSoins->contains($modelesDeSoin)) {
            $this->ModelesDeSoins->removeElement($modelesDeSoin);
            // set the owning side to null (unless already changed)
            if ($modelesDeSoin->getProbleme() === $this) {
                $modelesDeSoin->setProbleme(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ObjectifsEthics[]
     */
    public function getObjectifsEthics(): Collection
    {
        return $this->objectifsEthics;
    }

    public function addObjectifsEthic(ObjectifsEthics $objectifsEthic): self
    {
        if (!$this->objectifsEthics->contains($objectifsEthic)) {
            $this->objectifsEthics[] = $objectifsEthic;
            $objectifsEthic->setProbleme($this);
        }

        return $this;
    }

    public function removeObjectifsEthic(ObjectifsEthics $objectifsEthic): self
    {
        if ($this->objectifsEthics->contains($objectifsEthic)) {
            $this->objectifsEthics->removeElement($objectifsEthic);
            // set the owning side to null (unless already changed)
            if ($objectifsEthic->getProbleme() === $this) {
                $objectifsEthic->setProbleme(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Opinion[]
     */
    public function getOpinions(): Collection
    {
        return $this->opinions;
    }

    public function addOpinion(Opinion $opinion): self
    {
        if (!$this->opinions->contains($opinion)) {
            $this->opinions[] = $opinion;
            $opinion->setProbleme($this);
        }

        return $this;
    }

    public function removeOpinion(Opinion $opinion): self
    {
        if ($this->opinions->contains($opinion)) {
            $this->opinions->removeElement($opinion);
            // set the owning side to null (unless already changed)
            if ($opinion->getProbleme() === $this) {
                $opinion->setProbleme(null);
            }
        }

        return $this;
    }
}
