<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ModelesDeSoinsRepository")
 */
class ModelesDeSoins
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
    private $modele_de_soin;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Opinion", inversedBy="modele_de_soin",cascade={"persist"})
     */
    private $opinion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Probleme", inversedBy="ModelesDeSoins")
     */
    private $probleme;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModeleDeSoin(): ?string
    {
        return $this->modele_de_soin;
    }

    public function setModeleDeSoin(string $modele_de_soin): self
    {
        $this->modele_de_soin = $modele_de_soin;

        return $this;
    }

    public function getOpinion(): ?Opinion
    {
        return $this->opinion;
    }

    public function setOpinion(?Opinion $opinion): self
    {
        $this->opinion = $opinion;

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
