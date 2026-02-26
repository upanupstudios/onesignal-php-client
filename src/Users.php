<?php

namespace Upanupstudios\OneSignal\Php\Client;

/**
 * The Users class.
 */
class Users extends AbstractApi {

  /**
   * {@inheritdoc}
   */
  public function create($data) {
    $options['body'] = json_encode($data);

    $url = $this->oneSignal->getApiUrl() . '/apps/' . $this->oneSignal->getConfig()->getAppId() . '/users';

    $response = $this->oneSignal->request('POST', $url, $options);

    return $response;
  }

  public function update($alias, $id, $data) {
    $options['body'] = json_encode($data);

    $url = $this->oneSignal->getApiUrl() . '/apps/' . $this->oneSignal->getConfig()->getAppId() . '/users/by/' . $alias . '/' . $id;

    $response = $this->oneSignal->request('PATCH', $url, $options);

    return $response;
  }
}
