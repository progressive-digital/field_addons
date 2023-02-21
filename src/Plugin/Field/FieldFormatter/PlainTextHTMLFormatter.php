<?php

namespace Drupal\field_addons\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'html_plain_text_wrapper' formatter.
 *
 * @FieldFormatter(
 *   id = "html_plain_text_wrapper",
 *   label = @Translation("Plain text HTML Wrapper"),
 *   field_types = {
 *     "string"
 *   }
 * )
 */
class PlainTextHTMLFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $summary[] = $this->t('Wraps text in HTML tag.');
    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'html_tag' => 'h2',
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];
    $tag = $this->getSetting('html_tag');

    foreach ($items as $delta => $item) {
      // Render each element as markup.
      $markup = '<' . $tag . '>' . $item->value . '</' . $tag . '>';
      $element[$delta] = ['#markup' => $markup];
    }

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $form['html_tag'] = [
      '#title' => $this->t('HTML Tag'),
      '#type' => 'select',
      '#options' => [
        'h1' => $this->t('H1'),
        'h2' => $this->t('H2'),
        'h3' => $this->t('H3'),
        'h4' => $this->t('H4'),
        'h5' => $this->t('H5'),
        'h6' => $this->t('H6'),
        'span' => $this->t('Span'),
        'div' => $this->t('Div'),
      ],
      '#default_value' => $this->getSetting('html_tag'),
    ];

    return $form;
  }

}
