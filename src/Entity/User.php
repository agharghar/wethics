<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface ;
/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface , \Serializable
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255,unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="date")
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tel;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_inscription;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Professionel", mappedBy="user", cascade={"persist", "remove"})
     */
    private $professionel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RatingUser", inversedBy="users",cascade={"persist", "remove"})
     */
    private $rating;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Role")
     * @ORM\JoinColumn(nullable=false)
     */
    private $roles;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Commentaire", inversedBy="users",cascade={"persist", "remove"})
     */
    private $commentaires;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Post", inversedBy="users",cascade={"persist", "remove"})
     */
    private $posts;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->date_inscription;
    }

    public function setDateInscription(?\DateTimeInterface $date_inscription): self
    {
        $this->date_inscription = $date_inscription;

        return $this;
    }

    public function getProfessionel(): ?Professionel
    {
        return $this->professionel;
    }

    public function setProfessionel(Professionel $professionel): self
    {
        $this->professionel = $professionel;

        // set the owning side of the relation if necessary
        if ($professionel->getUser() !== $this) {
            $professionel->setUser($this);
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

    public function getRoles(): ?array
    {
        $roles[] = $this->roles->getRole();
       // return array_unique($roles);
        return array_unique(["ROLE_ADMIN"]);

    }

    public function setRoles(?Role $roles): self
    {
        $this->roles = $roles;

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

    public function getPosts(): ?Post
    {
        return $this->posts;
    }

    public function setPosts(?Post $posts): self
    {
        $this->posts = $posts;

        return $this;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return  $this->email ;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * String representation of object
     * @link https://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->email,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->email,

            ) = unserialize($serialized, array('allowed_classes' => false));
    }
}
