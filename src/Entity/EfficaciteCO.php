<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EfficaciteCORepository")
 */
class EfficaciteCO
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $risque;

    /**
     * @ORM\Column(type="integer")
     */
    private $benefice;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="efficacite_c_o")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\opinion", inversedBy="efficacitecos")
     */
    private $opinion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRisque(): ?int
    {
        return $this->risque;
    }

    public function setRisque(int $risque): self
    {
        $this->risque = $risque;

        return $this;
    }

    public function getBenefice(): ?int
    {
        return $this->benefice;
    }

    public function setBenefice(int $benefice): self
    {
        $this->benefice = $benefice;

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

    public function getOpinion(): ?Opinion
    {
        return $this->opinion;
    }

    public function setOpinion(?Opinion $opinion): self
    {
        $this->opinion = $opinion;

        return $this;
    }
}
