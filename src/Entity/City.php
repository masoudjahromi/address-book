<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CityRepository")
 */
class City
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
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Country", inversedBy="cities")
     * @ORM\JoinColumn(nullable=false)
     */
    private $country_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCountryId(): ?Country
    {
        return $this->country_id;
    }

    public function setCountryId(?Country $country_id): self
    {
        $this->country_id = $country_id;

        return $this;
    }
}
