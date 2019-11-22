<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ObjectifsEthicsRepository")
 */
class ObjectifsEthics
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
    private $objectif_ethics;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Opinion", inversedBy="objectifs_ethics",cascade={"persist"})
     */
    private $opinion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Probleme", inversedBy="objectifsEthics")
     */
    private $probleme;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObjectifEthics(): ?string
    {
        return $this->objectif_ethics;
    }

    public function setObjectifEthics(string $objectif_ethics): self
    {
        $this->objectif_ethics = $objectif_ethics;

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
