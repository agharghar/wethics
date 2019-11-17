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
     * @ORM\ManyToOne(targetEntity="App\Entity\post", inversedBy="contextesDeSoins")
     */
    private $post;

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
