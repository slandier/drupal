<?php

namespace Drupal\as_job\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;
/**
 * Class ApplicationForm.
 *
 * @package Drupal\as_job\Form
 */
class ApplicationForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'application_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['advert'] = [
      '#type' => 'hidden',
      '#title' => $this->t('Id de l&#039;annonce'),

    ];
    $form['user'] = [
      '#type' => 'hidden',
      '#title' => $this->t('Id du candidat'),
    ];

    $form['submit'] = [
        '#type' => 'submit',
        '#value' => t('Postuler'),
    ];

    return $form;
  }

  /**
    * {@inheritdoc}
    */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    $advert_id = $form_state->getValue('advert');
    $user = $form_state->getValue('user');
    $advert = Node::load($advert_id);
    $users = $advert->get('field_applicant')->getValue();
    array_push($users,$user);
    $advert->set('field_applicant', $users);
    $advert->save();

  }

}
