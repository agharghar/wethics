<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RatingUserRepository")
 */
class RatingUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $risque;

    /**
     * @ORM\Column(type="smallint")
     */
    private $benefice;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="Rating")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaire", mappedBy="rating")
     */
    private $commentaires;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
    }

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
            $user->setRating($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getRating() === $this) {
                $user->setRating(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setRating($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->contains($commentaire)) {
            $this->commentaires->removeElement($commentaire);
            // set the owning side to null (unless already changed)
            if ($commentaire->getRating() === $this) {
                $commentaire->setRating(null);
            }
        }

        return $this;
    }
}
