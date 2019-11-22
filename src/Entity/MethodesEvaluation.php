<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MethodesEvaluationRepository")
 */
class MethodesEvaluation
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
    private $methode_evaluation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Opinion", inversedBy="methodes_evaluation",cascade={"persist"})
     */
    private $opinion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Probleme", inversedBy="methodesEvaluation")
     */
    private $probleme;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMethodeEvaluation(): ?string
    {
        return $this->methode_evaluation;
    }

    public function setMethodeEvaluation(string $methode_evaluation): self
    {
        $this->methode_evaluation = $methode_evaluation;

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
