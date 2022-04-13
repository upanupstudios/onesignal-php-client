<?php

namespace Upanupstudios\OneSignal\Php\Client;

class Notifications extends AbstractApi
{
  /**
   * Create a new notifications to be sent.
   */
  public function create(array $data)
  {
    $options['body'] = json_encode($data);

    $response = $this->client->request('POST', 'notifications', $options);

    return $response;
  }
}