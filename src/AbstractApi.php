<?php

namespace Upanupstudios\Onesignal\Php\Client;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;

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