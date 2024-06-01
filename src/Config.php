<?php

namespace Upanupstudios\Onesignal\Php\Client;

/**
 * The Config class.
 */
final class Config {

  /**
   * The App ID.
   *
   * @var string
   */
  private $appId;

  /**
   * The API Key.
   *
   * @var string
   */
  private $apiKey;

  /**
   * {@inheritdoc}
   */
  public function __construct(string $appId, string $apiKey) {
    $this->appId = $appId;
    $this->apiKey = $apiKey;
  }

  /**
   * Get App ID.
   */
  public function getAppId(): string {
    return $this->appId;
  }

  /**
   * Get API Key.
   */
  public function getApiKey(): string {
    return $this->apiKey;
  }

}
