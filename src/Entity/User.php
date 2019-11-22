<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

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
     * @ORM\Column(type="string", length=20,unique=true)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=60,unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $passwod;

    /**
     * @ORM\Column(type="date")
     */
    private $date_inscription;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Role", inversedBy="users")
     */
    private $roles;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EfficaciteCO", mappedBy="user")
     */
    private $efficacite_c_o;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EfficaciteME", mappedBy="user")
     */
    private $efficacite_m_e;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Opinion", mappedBy="user")
     */
    private $opinions;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Probleme", mappedBy="user")
     */
    private $problemes;

    public function __construct()
    {
        $this->efficacite_c_o = new ArrayCollection();
        $this->efficacite_m_e = new ArrayCollection();
        $this->opinions = new ArrayCollection();
        $this->problemes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

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

    public function getPasswod(): ?string
    {
        return $this->passwod;
    }

    public function setPasswod(string $passwod): self
    {
        $this->passwod = $passwod;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->date_inscription;
    }

    public function setDateInscription(\DateTimeInterface $date_inscription): self
    {
        $this->date_inscription = $date_inscription;

        return $this;
    }

    public function getRoles(): ?role
    {
        return $this->roles;
    }

    public function setRoles(?role $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return Collection|EfficaciteCO[]
     */
    public function getEfficaciteCO(): Collection
    {
        return $this->efficacite_c_o;
    }

    public function addEfficaciteCO(EfficaciteCO $efficaciteCO): self
    {
        if (!$this->efficacite_c_o->contains($efficaciteCO)) {
            $this->efficacite_c_o[] = $efficaciteCO;
            $efficaciteCO->setUser($this);
        }

        return $this;
    }

    public function removeEfficaciteCO(EfficaciteCO $efficaciteCO): self
    {
        if ($this->efficacite_c_o->contains($efficaciteCO)) {
            $this->efficacite_c_o->removeElement($efficaciteCO);
            // set the owning side to null (unless already changed)
            if ($efficaciteCO->getUser() === $this) {
                $efficaciteCO->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EfficaciteME[]
     */
    public function getEfficaciteME(): Collection
    {
        return $this->efficacite_m_e;
    }

    public function addEfficaciteME(EfficaciteME $efficaciteME): self
    {
        if (!$this->efficacite_m_e->contains($efficaciteME)) {
            $this->efficacite_m_e[] = $efficaciteME;
            $efficaciteME->setUser($this);
        }

        return $this;
    }

    public function removeEfficaciteME(EfficaciteME $efficaciteME): self
    {
        if ($this->efficacite_m_e->contains($efficaciteME)) {
            $this->efficacite_m_e->removeElement($efficaciteME);
            // set the owning side to null (unless already changed)
            if ($efficaciteME->getUser() === $this) {
                $efficaciteME->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Opinion[]
     */
    public function getOpinions(): Collection
    {
        return $this->opinions;
    }

    public function addOpinion(Opinion $opinion): self
    {
        if (!$this->opinions->contains($opinion)) {
            $this->opinions[] = $opinion;
            $opinion->setUser($this);
        }

        return $this;
    }

    public function removeOpinion(Opinion $opinion): self
    {
        if ($this->opinions->contains($opinion)) {
            $this->opinions->removeElement($opinion);
            // set the owning side to null (unless already changed)
            if ($opinion->getUser() === $this) {
                $opinion->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Probleme[]
     */
    public function getProblemes(): Collection
    {
        return $this->problemes;
    }

    public function addProbleme(Probleme $probleme): self
    {
        if (!$this->problemes->contains($probleme)) {
            $this->problemes[] = $probleme;
            $probleme->setUser($this);
        }

        return $this;
    }

    public function removeProbleme(Probleme $probleme): self
    {
        if ($this->problemes->contains($probleme)) {
            $this->problemes->removeElement($probleme);
            // set the owning side to null (unless already changed)
            if ($probleme->getUser() === $this) {
                $probleme->setUser(null);
            }
        }

        return $this;
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
            $this->pseudo
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->email,
            $this->pseudo
            ) = unserialize($serialized, array('allowed_classes' => false));
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string|null The encoded password if any
     */
    public function getPassword()
    {
        // TODO: Implement getPassword() method.
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
        $this->pseudo;
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
}
