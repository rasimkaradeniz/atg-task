<?php

namespace App\Entity;

use App\Repository\MainEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MainEntityRepository::class)]
#[ORM\Table("airports")]

class MainEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $shortcode = null;
    
    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $name = null;
    
    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $city = null;
    
    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $country = null;    
    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $location = null;   
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShortcode(): ?string
    {
        return $this->shortcode;
    }

    public function setShortcode(?string $shortcode): self
    {
        $this->shortcode = $shortcode;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }
    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location;

        return $this;
    }

}
