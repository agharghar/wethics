<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ModelesDeSoinRepository")
 */
class ModelesDeSoin
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
     * @ORM\ManyToOne(targetEntity="App\Entity\post", inversedBy="modelesDeSoins")
     */
    private $post;

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
