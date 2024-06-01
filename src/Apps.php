<?php

namespace Upanupstudios\OneSignal\Php\Client;

/**
 * The Apps class.
 */
class Apps extends AbstractApi {

  /**
   * {@inheritdoc}
   */
  public function view($id) {
    $url = $this->oneSignal->getApiUrl() . '/apps/' . $id;

    $response = $this->oneSignal->request('GET', $url);

    return $response;
  }

}
