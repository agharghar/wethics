<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentaireRepository")
 */
class Commentaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $flag_solution;

    /**
     * @ORM\Column(type="smallint")
     */
    private $moyenne_benefice;

    /**
     * @ORM\Column(type="smallint")
     */
    private $moyenne_risque;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $objectif_de_soins;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $objectif_ethiques;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $modeles_de_soins;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contectes_de_soin;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $methode_evaluation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_mise_en_ligne;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="commentaires")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RatingUser", inversedBy="commentaires")
     */
    private $rating;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Post", mappedBy="commentaires")
     */
    private $posts;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->posts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getFlagSolution(): ?bool
    {
        return $this->flag_solution;
    }

    public function setFlagSolution(?bool $flag_solution): self
    {
        $this->flag_solution = $flag_solution;

        return $this;
    }

    public function getMoyenneBenefice(): ?int
    {
        return $this->moyenne_benefice;
    }

    public function setMoyenneBenefice(int $moyenne_benefice): self
    {
        $this->moyenne_benefice = $moyenne_benefice;

        return $this;
    }

    public function getMoyenneRisque(): ?int
    {
        return $this->moyenne_risque;
    }

    public function setMoyenneRisque(int $moyenne_risque): self
    {
        $this->moyenne_risque = $moyenne_risque;

        return $this;
    }

    public function getObjectifDeSoins(): ?string
    {
        return $this->objectif_de_soins;
    }

    public function setObjectifDeSoins(?string $objectif_de_soins): self
    {
        $this->objectif_de_soins = $objectif_de_soins;

        return $this;
    }

    public function getObjectifEthiques(): ?string
    {
        return $this->objectif_ethiques;
    }

    public function setObjectifEthiques(?string $objectif_ethiques): self
    {
        $this->objectif_ethiques = $objectif_ethiques;

        return $this;
    }

    public function getModelesDeSoins(): ?string
    {
        return $this->modeles_de_soins;
    }

    public function setModelesDeSoins(?string $modeles_de_soins): self
    {
        $this->modeles_de_soins = $modeles_de_soins;

        return $this;
    }

    public function getContectesDeSoin(): ?string
    {
        return $this->contectes_de_soin;
    }

    public function setContectesDeSoin(?string $contectes_de_soin): self
    {
        $this->contectes_de_soin = $contectes_de_soin;

        return $this;
    }

    public function getMethodeEvaluation(): ?string
    {
        return $this->methode_evaluation;
    }

    public function setMethodeEvaluation(?string $methode_evaluation): self
    {
        $this->methode_evaluation = $methode_evaluation;

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
            $user->setCommentaires($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getCommentaires() === $this) {
                $user->setCommentaires(null);
            }
        }

        return $this;
    }

    public function getRating(): ?RatingUser
    {
        return $this->rating;
    }

    public function setRating(?RatingUser $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * @return Collection|Post[]
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPost(Post $post): self
    {
        if (!$this->posts->contains($post)) {
            $this->posts[] = $post;
            $post->setCommentaires($this);
        }

        return $this;
    }

    public function removePost(Post $post): self
    {
        if ($this->posts->contains($post)) {
            $this->posts->removeElement($post);
            // set the owning side to null (unless already changed)
            if ($post->getCommentaires() === $this) {
                $post->setCommentaires(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->description;
    }

}
