<?php

namespace App\Geocoding;

use App\Entity\LatLng;

interface IGeocoding
{
  public function getLatLng(string $location): ?LatLng;
}
