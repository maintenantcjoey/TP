<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $familyName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $givenName;

    /**
     * @ORM\Column(type="array")
     */
    private $google_token = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $selected_calendar = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $unselected_calendar = [];

    /**
     * @ORM\Column(type="boolean")
     */
    private $display;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User")
     */
    private $relations;

    public function __construct()
    {
        $this->relations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFamilyName(): ?string
    {
        return $this->familyName;
    }

    public function setFamilyName(string $familyName): self
    {
        $this->familyName = $familyName;

        return $this;
    }

    public function getGivenName(): ?string
    {
        return $this->givenName;
    }

    public function setGivenName(string $givenName): self
    {
        $this->givenName = $givenName;

        return $this;
    }

    public function getGoogleToken(): ?array
    {
        return $this->google_token;
    }

    public function setGoogleToken(array $google_token): self
    {
        $this->google_token = $google_token;

        return $this;
    }

    public function getSelectedCalendar(): ?array
    {
        return $this->selected_calendar;
    }

    public function setSelectedCalendar(?array $selected_calendar): self
    {
        $this->selected_calendar = $selected_calendar;

        return $this;
    }

    public function getUnselectedCalendar(): ?array
    {
        return $this->unselected_calendar;
    }

    public function setUnselectedCalendar(?array $unselected_calendar): self
    {
        $this->unselected_calendar = $unselected_calendar;

        return $this;
    }

    public function getDisplay(): ?bool
    {
        return $this->display;
    }

    public function setDisplay(bool $display): self
    {
        $this->display = $display;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getRelations(): Collection
    {
        return $this->relations;
    }

    public function addRelation(self $relation): self
    {
        if (!$this->relations->contains($relation)) {
            $this->relations[] = $relation;
        }

        return $this;
    }

    public function removeRelation(self $relation): self
    {
        if ($this->relations->contains($relation)) {
            $this->relations->removeElement($relation);
        }

        return $this;
    }
}
