<?php

namespace Upanupstudios\OneSignal\Php\Client;

/**
 * The Segments class.
 */
class Segments extends AbstractApi {

  /**
   * {@inheritdoc}
   */
  public function getAll($app_id, $params = []) {
    // @todo add params
    $url = $this->oneSignal->getApiUrl() . '/apps/' . $app_id . '/segments';

    $response = $this->oneSignal->request('GET', $url);

    return $response;
  }

}
