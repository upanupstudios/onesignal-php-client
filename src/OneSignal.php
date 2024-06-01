<?php

namespace Upanupstudios\OneSignal\Php\Client;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;

/**
 * The Onesignal class.
 */
class OneSignal {

  /**
   * The REST API URL.
   *
   * @var string
   */
  private $apiUrl = 'https://api.onesignal.com';

  /**
   * The config instance.
   *
   * @var Config
   */
  private $config;

  /**
   * The client instance.
   *
   * @var \GuzzleHttp\ClientInterface
   */
  private $httpClient;

  /**
   * {@inheritdoc}
   */
  public function __construct(ClientInterface $httpClient, Config $config) {
    $this->config = $config;
    $this->httpClient = $httpClient;
  }

  /**
   * {@inheritdoc}
   */
  public function getApiUrl() {
    return $this->apiUrl;
  }

  /**
   * {@inheritdoc}
   */
  public function getConfig(): Config {
    return $this->config;
  }

  /**
   * {@inheritdoc}
   */
  public function request(string $method, string $url, array $options = []) {
    try {
      $defaultOptions = [
        'headers' => [
          'Content-Type' => 'application/json',
          'Authorization' => 'Basic ' . $this->config->getApiKey(),
          'Cache-Control' => 'no-cache',
          'Content-Type' => 'application/json',
        ],
      ];

      if (!empty($options)) {
        $options = array_merge_recursive($defaultOptions, $options);
      }
      else {
        $options = $defaultOptions;
      }

      $response = $this->httpClient->request($method, $url, $options);
    }
    catch (RequestException $exception) {
      $response = $exception->getResponse();
    }

    // Get body.
    $body = $response->getBody();
    $body = $body->__toString();

    // Return as array.
    $response = json_decode($body, TRUE);

    return $response;
  }

  /**
   * Throws InvalidArgumentException if $class does not exist.
   *
   * @throws \InvalidArgumentException
   */
  public function api(string $class) {
    switch ($class) {
      case 'apps':
        $api = new Apps($this);
        break;

      case 'devices':
        $api = new Devices($this);
        break;

      case 'notifications':
        $api = new Notifications($this);
        break;

      case 'segments':
        $api = new Segments($this);
        break;

      default:
        throw new \InvalidArgumentException("Undefined api instance called: '$class'.");
    }

    return $api;
  }

  /**
   * {@inheritdoc}
   */
  public function __call(string $name, array $args): object {
    try {
      return $this->api($name);
    }
    catch (\InvalidArgumentException $e) {
      throw new \BadMethodCallException("Undefined method called: '$name'.");
    }
  }

}
