<?php

namespace Upanupstudios\Onesignal\Php\Client;

final class Config
{
  private $appId;
  private $apiKey;

  public function __construct(string $appId, string $apiKey)
  {
    $this->appId = $appId;
    $this->apiKey = $apiKey;
  }

  /**
   * Get API token.
   */
  public function getAppId(): string
  {
    return $this->appId;
  }

  /**
   * Get API token.
   */
  public function getApiKey(): string
  {
    return $this->apiKey;
  }
}