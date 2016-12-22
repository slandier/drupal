<?php

namespace Drupal\as_job\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class DefaultController.
 *
 * @package Drupal\as_job\Controller
 */
class DefaultController extends ControllerBase {

  /**
   * Applicationform.
   *
   * @return string
   *   Return Hello string.
   */
  public function applicationForm($advert, $user) {

      $form = \Drupal::formBuilder()->getForm('Drupal\as_job\Form\ApplicationForm');
      $form['advert']['#value']=$advert;
      $form['user']['#value']=$user;
      return $form;
  }

}
