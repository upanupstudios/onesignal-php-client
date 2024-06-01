<?php

namespace Upanupstudios\OneSignal\Php\Client;

/**
 * The Contacts class.
 */
class Notifications extends AbstractApi {

  /**
   * {@inheritdoc}
   */
  public function create(array $data) {
    $options['body'] = json_encode($data);

    $url = $this->oneSignal->getApiUrl() . '/notifications';

    $response = $this->oneSignal->request('POST', $url, $options);

    return $response;
  }

}
