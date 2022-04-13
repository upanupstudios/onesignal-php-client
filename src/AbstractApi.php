<?php

namespace Upanupstudios\OneSignal\Php\Client;

abstract class AbstractApi
{
  /**
   * @var Onesignal
   */
  protected $client;

  public function __construct(Onesignal $client)
  {
      $this->client = $client;
  }
}