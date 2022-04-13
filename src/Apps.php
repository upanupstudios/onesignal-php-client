<?php

namespace Upanupstudios\OneSignal\Php\Client;

class Apps extends AbstractApi
{
  /**
   * View an app
   */
  public function view($id)
  {
    $response = $this->client->request('GET', 'apps/'.$id);

    return $response;
  }
}