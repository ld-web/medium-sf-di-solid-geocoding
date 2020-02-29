<?php

namespace App\Geocoding;

use Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class AbstractGeocodingWithApiKey extends AbstractGeocoding
{
  protected $apiKey;

  public function __construct(string $apiKey, string $baseUrl, HttpClientInterface $client)
  {
    $this->apiKey = $apiKey;
    parent::__construct($baseUrl, $client);
  }

  public function getApiKey(): string
  {
    return $this->apiKey;
  }
}
