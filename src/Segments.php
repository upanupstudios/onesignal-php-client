<?php

namespace Upanupstudios\OneSignal\Php\Client;

/**
 * The Segments class.
 */
class Segments extends AbstractApi {

  /**
   * {@inheritdoc}
   */
  public function getAll($params = []) {
    // @todo add params
    $url = $this->oneSignal->getApiUrl() . '/apps/' . $this->oneSignal->getConfig()->getAppId() . '/segments';

    $response = $this->oneSignal->request('GET', $url);

    return $response;
  }

  /**
   * {@inheritdoc}
   */
  public function get($segment_id, $params = []) {
    // @todo add params
    $url = $this->oneSignal->getApiUrl() . '/apps/' . $this->oneSignal->getConfig()->getAppId() . '/segments/' . $segment_id;

    $response = $this->oneSignal->request('GET', $url);

    return $response;
  }

}
