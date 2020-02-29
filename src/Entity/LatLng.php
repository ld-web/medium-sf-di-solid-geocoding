<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Embeddable */
class LatLng
{
  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private string $lat;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private string $lng;

  public function __construct(?string $lat, ?string $lng) {
    $this->lat = $lat;
    $this->lng = $lng;
  }

  public function getLat(): ?string
  {
    return $this->lat;
  }

  public function getLng(): ?string
  {
    return $this->lng;
  }

  public function setLat(?string $lat): self
  {
    $this->lat = $lat;
    return $this;
  }

  public function setLng(?string $lng): self
  {
    $this->lng = $lng;
    return $this;
  }
}
