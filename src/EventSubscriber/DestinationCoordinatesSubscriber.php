<?php

namespace App\EventSubscriber;

use App\Entity\Destination;
use App\Geocoding\IGeocoding;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;

class DestinationCoordinatesSubscriber implements EventSubscriber
{
  private $geocodingService;

  public function __construct(IGeocoding $geocodingService)
  {
    $this->geocodingService = $geocodingService;
  }

  public function getSubscribedEvents()
  {
    return [
      Events::prePersist,
      Events::preUpdate
    ];
  }

  public function preUpdate(LifecycleEventArgs $args)
  {
    $entity = $args->getObject();

    if ($entity instanceof Destination) {
      $this->processCoordinates($entity);
    }
  }

  public function prePersist(LifecycleEventArgs $args)
  {
    $entity = $args->getObject();

    if ($entity instanceof Destination) {
      $this->processCoordinates($entity);
    }
  }

  public function processCoordinates(Destination $destination)
  {
    $location = $destination->getCity() . ', ' . $destination->getCountry()->getName();

    $latLng = $this->geocodingService->getLatLng($location);

    if (!empty($latLng)) {
      $destination->setCoordinates($latLng);
    }
  }
}
