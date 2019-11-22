<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ObjectifsDeSoinRepository")
 */
class ObjectifsDeSoin
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
    private $objectif_de_soin;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Opinion", inversedBy="objectifs_de_soins",cascade={"persist"})
     */
    private $opinion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Probleme", inversedBy="objectifsDeSoin")
     */
    private $probleme;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObjectifDeSoin(): ?string
    {
        return $this->objectif_de_soin;
    }

    public function setObjectifDeSoin(string $objectif_de_soin): self
    {
        $this->objectif_de_soin = $objectif_de_soin;

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
