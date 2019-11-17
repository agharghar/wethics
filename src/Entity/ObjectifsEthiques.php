<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ObjectifsEthiquesRepository")
 */
class ObjectifsEthiques
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
    private $objectif_ethique;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\post", inversedBy="objectifsEthiques")
     */
    private $post;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObjectifEthique(): ?string
    {
        return $this->objectif_ethique;
    }

    public function setObjectifEthique(string $objectif_ethique): self
    {
        $this->objectif_ethique = $objectif_ethique;

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
