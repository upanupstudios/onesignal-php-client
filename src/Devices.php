<?php

namespace Upanupstudios\OneSignal\Php\Client;

/**
 * The Devices class.
 */
class Devices extends AbstractApi {

  /**
   * {@inheritdoc}
   */
  public function add($data) {
    $options['body'] = json_encode($data);

    $url = $this->oneSignal->getApiUrl() . '/players';

    $response = $this->oneSignal->request('POST', $url, $options);

    return $response;
  }

  /**
   * {@inheritdoc}
   */
  public function getAll($app_id) {
    $total = 0;
    $offset = 300;
    $allPlayers = [];

    for ($i = 0; $i <= $total; $i += $offset) {
      $url = $this->oneSignal->getApiUrl() . '/players?app_id=' . $app_id . '&offset=' . $i;

      $players = $this->oneSignal->request('GET', $url);

      if (!empty($players['total_count'])) {
        $total = $players['total_count'];
      }

      if (!empty($players['players'])) {
        foreach ($players['players'] as $player) {
          $allPlayers[$player['id']] = $player;
        }
      }
    }

    return $allPlayers;
  }

  /**
   * {@inheritdoc}
   */
  public function getByIdentifier($app_id, $identifier) {
    $players = $this->getAll($app_id);

    if (!empty($players)) {
      foreach ($players as $player) {
        if ($player['identifier'] == $identifier) {
          return $player;
        }
      }
    }

    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function delete($app_id, $device_id) {
    $url = $this->oneSignal->getApiUrl() . 'players/' . $device_id . '?app_id=' . $app_id;

    $response = $this->oneSignal->request('DELETE', $url);

    return $response;
  }

}
