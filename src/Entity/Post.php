<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 */
class Post
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
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $objectif_de_soins;

    /**
     * @ORM\Column(type="text")
     */
    private $objectif_ethiques;

    /**
     * @ORM\Column(type="text")
     */
    private $modeles_evaluation;

    /**
     * @ORM\Column(type="text")
     */
    private $contextes_de_soin;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_mise_en_ligne;

    /**
     * @ORM\Column(type="boolean")
     */
    private $fermer;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="posts")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Commentaire", inversedBy="posts")
     */
    private $commentaires;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Role")
     */
    private $roles;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getObjectifDeSoins(): ?string
    {
        return $this->objectif_de_soins;
    }

    public function setObjectifDeSoins(string $objectif_de_soins): self
    {
        $this->objectif_de_soins = $objectif_de_soins;

        return $this;
    }

    public function getObjectifEthiques(): ?string
    {
        return $this->objectif_ethiques;
    }

    public function setObjectifEthiques(string $objectif_ethiques): self
    {
        $this->objectif_ethiques = $objectif_ethiques;

        return $this;
    }

    public function getModelesEvaluation(): ?string
    {
        return $this->modeles_evaluation;
    }

    public function setModelesEvaluation(string $modeles_evaluation): self
    {
        $this->modeles_evaluation = $modeles_evaluation;

        return $this;
    }

    public function getContextesDeSoin(): ?string
    {
        return $this->contextes_de_soin;
    }

    public function setContextesDeSoin(string $contextes_de_soin): self
    {
        $this->contextes_de_soin = $contextes_de_soin;

        return $this;
    }

    public function getDateMiseEnLigne(): ?\DateTimeInterface
    {
        return $this->date_mise_en_ligne;
    }

    public function setDateMiseEnLigne(\DateTimeInterface $date_mise_en_ligne): self
    {
        $this->date_mise_en_ligne = $date_mise_en_ligne;

        return $this;
    }

    public function getFermer(): ?bool
    {
        return $this->fermer;
    }

    public function setFermer(bool $fermer): self
    {
        $this->fermer = $fermer;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setPosts($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getPosts() === $this) {
                $user->setPosts(null);
            }
        }

        return $this;
    }

    public function getCommentaires(): ?Commentaire
    {
        return $this->commentaires;
    }

    public function setCommentaires(?Commentaire $commentaires): self
    {
        $this->commentaires = $commentaires;

        return $this;
    }

    public function getRoles(): ?Role
    {
        return $this->roles;
    }

    public function setRoles(?Role $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
}
