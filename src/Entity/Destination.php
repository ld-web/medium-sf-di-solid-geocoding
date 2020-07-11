<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DestinationRepository")
 */
class Destination
{
    use BaseEntityTrait;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /** @ORM\Embedded(class = "App\Entity\LatLng") */
    protected $coordinates;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Country", inversedBy="destinations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $country;

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCoordinates(): ?LatLng
    {
        return $this->coordinates;
    }

    public function setCoordinates(?LatLng $coordinates): self
    {
        $this->coordinates = $coordinates;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }
}
