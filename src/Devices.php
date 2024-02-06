<?php

namespace Upanupstudios\OneSignal\Php\Client;

class Devices extends AbstractApi
{
  /**
   * Create a new device.
   */
  public function add($data)
  {
    $options['body'] = json_encode($data);

    $response = $this->client->request('POST', 'players', $options);

    return $response;
  }

  public function getAll($app_id) {
    $total = 0;
    $offset = 300;
    $allPlayers = [];

    for($i = 0; $i <= $total; $i += $offset) {
      $players = $this->client->request('GET', 'players?app_id='.$app_id.'&offset='.$i);

      if(!empty($players['total_count'])) {
        $total = $players['total_count'];
      }

      if(!empty($players['players'])) {
        foreach($players['players'] as $player) {
          $allPlayers[$player['id']] = $player;
        }
      }
    }

    return $allPlayers;
  }

  public function getByIdentifier($app_id, $identifier) {
    $players = $this->getAll($app_id);

    if(!empty($players)) {
      foreach($players as $player) {
        if($player['identifier'] == $identifier) {
          return $player;
        }
      }
    }

    return false;
  }

  public function delete($app_id, $device_id) {
    $response = $this->client->request('DELETE', 'players/'.$device_id.'?app_id='.$app_id);

    return $response;
  }

}