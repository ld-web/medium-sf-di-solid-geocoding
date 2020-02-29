<?php

namespace App\Geocoding;

use Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class AbstractGeocoding implements IGeocoding
{
  protected $baseUrl;
  protected $client;

  public function __construct(string $baseUrl, HttpClientInterface $client)
  {
    $this->baseUrl = $baseUrl;
    $this->client = $client;
  }

  abstract protected function geocode(string $location): array;
}
