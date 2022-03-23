<?php

namespace Upanupstudios\Onesignal\Php\Client;

final class Config
{
  private $apiToken;

  public function __construct(string $apiToken)
  {
    $this->apiToken = $apiToken;
  }

  /**
   * Get API token.
   */
  public function getApiToken(): string
  {
    return $this->apiToken;
  }
}