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
     * @ORM\ManyToOne(targetEntity="App\Entity\post", inversedBy="methodesEvaluations")
     */
    private $post;

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

    public function getPost(): ?post
    {
        return $this->post;
    }

    public function setPost(?post $post): self
    {
        $this->post = $post;

        return $this;
    }
}
