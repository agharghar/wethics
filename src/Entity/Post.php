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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ObjectifsDeSoin", mappedBy="post")
     */
    private $objectifsDeSoins;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ObjectifsEthiques", mappedBy="post")
     */
    private $objectifsEthiques;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ModelesDeSoin", mappedBy="post")
     */
    private $modelesDeSoins;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ContextesDeSoin", mappedBy="post")
     */
    private $contextesDeSoins;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MethodesEvaluation", mappedBy="post")
     */
    private $methodesEvaluations;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->objectifsDeSoins = new ArrayCollection();
        $this->objectifsEthiques = new ArrayCollection();
        $this->modelesDeSoins = new ArrayCollection();
        $this->contextesDeSoins = new ArrayCollection();
        $this->methodesEvaluations = new ArrayCollection();
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

    /**
     * @return Collection|ObjectifsDeSoin[]
     */
    public function getObjectifsDeSoins(): Collection
    {
        return $this->objectifsDeSoins;
    }

    public function addObjectifsDeSoin(ObjectifsDeSoin $objectifsDeSoin): self
    {
        if (!$this->objectifsDeSoins->contains($objectifsDeSoin)) {
            $this->objectifsDeSoins[] = $objectifsDeSoin;
            $objectifsDeSoin->setPost($this);
        }

        return $this;
    }

    public function removeObjectifsDeSoin(ObjectifsDeSoin $objectifsDeSoin): self
    {
        if ($this->objectifsDeSoins->contains($objectifsDeSoin)) {
            $this->objectifsDeSoins->removeElement($objectifsDeSoin);
            // set the owning side to null (unless already changed)
            if ($objectifsDeSoin->getPost() === $this) {
                $objectifsDeSoin->setPost(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ObjectifsEthiques[]
     */
    public function getObjectifsEthiques(): Collection
    {
        return $this->objectifsEthiques;
    }

    public function addObjectifsEthique(ObjectifsEthiques $objectifsEthique): self
    {
        if (!$this->objectifsEthiques->contains($objectifsEthique)) {
            $this->objectifsEthiques[] = $objectifsEthique;
            $objectifsEthique->setPost($this);
        }

        return $this;
    }

    public function removeObjectifsEthique(ObjectifsEthiques $objectifsEthique): self
    {
        if ($this->objectifsEthiques->contains($objectifsEthique)) {
            $this->objectifsEthiques->removeElement($objectifsEthique);
            // set the owning side to null (unless already changed)
            if ($objectifsEthique->getPost() === $this) {
                $objectifsEthique->setPost(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ModelesDeSoin[]
     */
    public function getModelesDeSoins(): Collection
    {
        return $this->modelesDeSoins;
    }

    public function addModelesDeSoin(ModelesDeSoin $modelesDeSoin): self
    {
        if (!$this->modelesDeSoins->contains($modelesDeSoin)) {
            $this->modelesDeSoins[] = $modelesDeSoin;
            $modelesDeSoin->setPost($this);
        }

        return $this;
    }

    public function removeModelesDeSoin(ModelesDeSoin $modelesDeSoin): self
    {
        if ($this->modelesDeSoins->contains($modelesDeSoin)) {
            $this->modelesDeSoins->removeElement($modelesDeSoin);
            // set the owning side to null (unless already changed)
            if ($modelesDeSoin->getPost() === $this) {
                $modelesDeSoin->setPost(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ContextesDeSoin[]
     */
    public function getContextesDeSoins(): Collection
    {
        return $this->contextesDeSoins;
    }

    public function addContextesDeSoin(ContextesDeSoin $contextesDeSoin): self
    {
        if (!$this->contextesDeSoins->contains($contextesDeSoin)) {
            $this->contextesDeSoins[] = $contextesDeSoin;
            $contextesDeSoin->setPost($this);
        }

        return $this;
    }

    public function removeContextesDeSoin(ContextesDeSoin $contextesDeSoin): self
    {
        if ($this->contextesDeSoins->contains($contextesDeSoin)) {
            $this->contextesDeSoins->removeElement($contextesDeSoin);
            // set the owning side to null (unless already changed)
            if ($contextesDeSoin->getPost() === $this) {
                $contextesDeSoin->setPost(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MethodesEvaluation[]
     */
    public function getMethodesEvaluations(): Collection
    {
        return $this->methodesEvaluations;
    }

    public function addMethodesEvaluation(MethodesEvaluation $methodesEvaluation): self
    {
        if (!$this->methodesEvaluations->contains($methodesEvaluation)) {
            $this->methodesEvaluations[] = $methodesEvaluation;
            $methodesEvaluation->setPost($this);
        }

        return $this;
    }

    public function removeMethodesEvaluation(MethodesEvaluation $methodesEvaluation): self
    {
        if ($this->methodesEvaluations->contains($methodesEvaluation)) {
            $this->methodesEvaluations->removeElement($methodesEvaluation);
            // set the owning side to null (unless already changed)
            if ($methodesEvaluation->getPost() === $this) {
                $methodesEvaluation->setPost(null);
            }
        }

        return $this;
    }
}
