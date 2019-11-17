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
     * @ORM\ManyToOne(targetEntity="App\Entity\Post", inversedBy="objectifsDeSoins")
     */
    private $post;

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

    public function getPost(): ?Post
    {
        return $this->post;
    }

    public function setPost(?Post $post): self
    {
        $this->post = $post;

        return $this;
    }
}
