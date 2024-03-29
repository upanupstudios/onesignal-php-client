<?php

namespace Upanupstudios\OneSignal\Php\Client;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;

class Onesignal
{
  /**
   * The REST API URL.
   *
   * @var string $api_url
   */
  private $api_url = 'https://onesignal.com/api/v1';

  private $config;
  private $httpClient;

  public function __construct(Config $config, ClientInterface $httpClient)
  {
    $this->config = $config;
    $this->httpClient = $httpClient;
  }

  public function getApiUrl()
  {
    return $this->api_url;
  }

  public function getConfig(): Config
  {
    return $this->config;
  }

  public function request(string $method, string $uri, array $options = [])
  {
    try {
      $defaultOptions = [
        'headers' => [
          'Content-Type' => 'application/json',
          'Authorization' => 'Basic '.$this->config->getApiKey()
        ]
      ];

      if(!empty($options)) {
        //TODO: This might not be a deep merge...
        $options = array_merge($defaultOptions, $options);
      } else {
        $options = $defaultOptions;
      }

      $request = $this->httpClient->request($method, $this->api_url.'/'.$uri, $options);

      $body = $request->getBody();
      $response = $body->__toString();

      // Return as array
      $response = json_decode($response, TRUE);
    } catch (\JsonException $exeption) {
      $response = $exeption->getMessage();
    } catch (RequestException $exception) {
      $response = $exception->getMessage();
    }

    return $response;
  }

  /**
   * @return object
   *
   * @throws \InvalidArgumentException
   *  If $class does not exist.
   */
  public function api(string $class)
  {
    switch ($class) {
      case 'apps':
        $api = new Apps($this);
        break;

      case 'notifications':
        $api = new Notifications($this);
        break;

      case 'devices':
        $api = new Devices($this);
        break;

      default:
        throw new \InvalidArgumentException("Undefined api instance called: '$class'.");
    }

    return $api;
  }

  public function __call(string $name, array $args): object
  {
    try {
        return $this->api($name);
    } catch (\InvalidArgumentException $e) {
        throw new \BadMethodCallException("Undefined method called: '$name'.");
    }
  }
}