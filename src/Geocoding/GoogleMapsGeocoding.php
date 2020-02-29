<?php

namespace App\Geocoding;

use App\Entity\LatLng;

final class GoogleMapsGeocoding extends AbstractGeocodingWithApiKey
{
  public function getLatLng(string $location): ?LatLng
  {
    $geoData = $this->geocode($location);

    if (empty($geoData["results"])) {
      return null;
    }

    return new LatLng(
      $geoData["results"][0]["geometry"]["location"]['lat'],
      $geoData["results"][0]["geometry"]["location"]['lng']
    );
  }

  protected function geocode(string $location): array
  {
    // Here we would do the same as OsmGeocoding
    // Perform a request to get the coordinates
    // You could also use a ScopingHttpClient to automate API key parameter passing
    // (https://symfony.com/doc/current/components/http_client.html#scoping-client)
    return [
      "results" => [
        [
          // "address_components" : [...
          "geometry" => [
            "location" => [
              "lat" => 37.4224764,
              "lng" => -122.0842499
            ]
          ]
          // location_type ...
        ]
      ],
      "status" => "OK"
    ];
  }
}
