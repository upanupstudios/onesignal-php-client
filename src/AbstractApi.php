<?php

namespace Upanupstudios\OneSignal\Php\Client;

/**
 * The AbstractApi class.
 */
abstract class AbstractApi {

  /**
   * The OneSignal object.
   *
   * @var Onesignal
   */
  protected $oneSignal;

  /**
   * {@inheritdoc}
   */
  public function __construct(Onesignal $oneSignal) {
    $this->oneSignal = $oneSignal;
  }

}
