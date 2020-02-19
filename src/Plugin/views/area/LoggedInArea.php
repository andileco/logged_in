<?php

namespace Drupal\logged_in\Plugin\views\area;


use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\area\AreaPluginBase;

/**
 * Area handler that shows different content for logged in and logged out users.
 *
 * @ingroup views_area_handlers
 * @ViewsArea("logged_in_area")
 */
class LoggedInArea extends AreaPluginBase {

  /**
   * {@inheritdoc}
   */
  protected function defineOptions() {
    $options = parent::defineOptions();

    $options['logged_in_message'] = ['default' => ''];
    $options['logged_out_message'] = ['default' => ''];

    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);

    $form['logged_in_message'] = [
      '#type' => 'text_format',
      '#format' => 'full_html',
      '#title' => $this->t('Logged in message'),
      '#default_value' => $this->options['logged_in_message'] ? $this->options['logged_in_message']['value'] : '',
    ];
    $form['logged_out_message'] = [
      '#type' => 'text_format',
      '#format' => 'full_html',
      '#title' => $this->t('Logged in message'),
      '#default_value' => $this->options['logged_out_message'] ? $this->options['logged_out_message']['value'] : '',
    ];

  }

  /**
   * {@inheritdoc}
   */
  public function query() {
  }

  /**
   * {@inheritdoc}
   */
  public function render($empty = FALSE) {

    $logged_in = \Drupal::currentUser()->isAuthenticated();
    if ($logged_in) {
      $build['#markup'] = $this->options['logged_in_message']['value'];
    }
    else {
      $build['#markup'] = $this->options['logged_out_message']['value'];
    }

    return $build;
  }

}