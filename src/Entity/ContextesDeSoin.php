<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContextesDeSoinRepository")
 */
class ContextesDeSoin
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
    private $contexte_de_soin;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Opinion", inversedBy="contextes_de_soin",cascade={"persist"})
     */
    private $opinion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Probleme", inversedBy="contextesDeSoin")
     */
    private $probleme;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContexteDeSoin(): ?string
    {
        return $this->contexte_de_soin;
    }

    public function setContexteDeSoin(string $contexte_de_soin): self
    {
        $this->contexte_de_soin = $contexte_de_soin;

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
