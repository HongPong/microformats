<?php
/**
 * @file
 * Administration form for Contact Info.
 */

namespace Drupal\microformats_hcard_site\Form;

use Drupal\Component\Utility\Html;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
/**
 *
 */
class AdminForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'microformats_hcard_site_admin_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'microformats_hcard_site.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('microformats_hcard_site.settings');
    $site_config = $this->config('system.site');

    $form['#attached']['library'][] = 'microformats_hcard_site/microformats_hcard_site';
    $form['#attached']['drupalSettings']['microformats_hcard_site']['siteName'] = Html::escape($site_config->get('name'));
    $form['#attached']['drupalSettings']['microformats_hcard_site']['siteSlogan'] = Html::escape($site_config->get('slogan'));

    $form['#tree'] = TRUE;
    $form['microformats_hcard_site']['#tree'] = TRUE;
    $form['microformats_hcard_site']['type'] = array(
      '#type' => 'radios',
      '#title' => t('Contact information type'),
      '#description' => t('Is this for an individual or a business?'),
      '#options' => array(
        'personal' => t('Personal'),
        'business' => t('Organization/Business'),
      ),
      '#default_value' => $config->get('type'),
    );
    $form['microformats_hcard_site']['fn_n'] = array(
      '#type' => 'fieldset',
      '#title' => t('Full Name'),
      '#description' => t('If this site is your personal site, enter your full name here.'),
      '#states' => array(
        // Hide this fieldset if type is set to “business”.
        'invisible' => array(
          ':input[name="microformats_hcard_site[type]"]' => array('value' => 'business'),
        ),
      ),
      '#prefix' => '<div id="edit-hcard-fn-n-wrapper">',
      '#suffix' => '</div>',
    );
    $form['microformats_hcard_site']['fn_n']['given-name'] = array(
      '#type' => 'textfield',
      '#title' => t('First Name'),
      '#description' => t('Your first name.'),
      '#default_value' => $config->get('fn_n.given_name'),
    );
    $form['microformats_hcard_site']['fn_n']['family-name'] = array(
      '#type' => 'textfield',
      '#title' => t('Last Name'),
      '#description' => t('Your last name.'),
      '#default_value' => $config->get('fn_n.family_name'),
    );
    $form['microformats_hcard_site']['org'] = array(
      '#type' => 'textfield',
      '#title' => t('Organization/Business Name'),
      '#default_value' => $config->get('org'),
      '#description' => t('The name of your organization or business.'),
      '#prefix' => '<div class="microformats_hcard_site-org-wrapper clearfix">',
    );
    $form['microformats_hcard_site']['use_site_name'] = array(
      '#type' => 'checkbox',
      '#title' => t('Use site name'),
      '#default_value' => $config->get('use_site_name'),
      '#suffix' => '</div>',
    );
    $form['microformats_hcard_site']['tagline'] = array(
      '#type' => 'textfield',
      '#title' => t('Tagline'),
      '#default_value' => $config->get('tagline'),
      '#description' => t('A short tagline.'),
      '#prefix' => '<div class="microformats_hcard_site-tagline-wrapper clearfix">',
    );
    $form['microformats_hcard_site']['use_site_slogan'] = array(
      '#type' => 'checkbox',
      '#title' => t('Use site slogan'),
      '#default_value' => $config->get('use_site_slogan'),
      '#suffix' => '</div>',
    );
    $form['microformats_hcard_site']['adr'] = array(
      '#type' => 'fieldset',
      '#title' => t('Address'),
      '#description' => t('Enter the contact address for this website.'),
    );
    $form['microformats_hcard_site']['adr']['street-address'] = array(
      '#type' => 'textfield',
      '#title' => t('Street Address'),
      '#default_value' => $config->get('street_address'),
    );
    $form['microformats_hcard_site']['adr']['extended-address'] = array(
      '#type' => 'textfield',
      '#title' => t('Extended Address'),
      '#default_value' => $config->get('extended_address'),
    );
    $form['microformats_hcard_site']['adr']['locality'] = array(
      '#type' => 'textfield',
      '#title' => t('City'),
      '#default_value' => $config->get('locality'),
    );
    $form['microformats_hcard_site']['adr']['region'] = array(
      '#type' => 'textfield',
      '#title' => t('State/Province'),
      '#default_value' => $config->get('region'),
      '#size' => 10,
    );
    $form['microformats_hcard_site']['adr']['postal-code'] = array(
      '#type' => 'textfield',
      '#title' => t('Postal Code'),
      '#default_value' => $config->get('postal_code'),
      '#size' => 10,
    );
    $form['microformats_hcard_site']['adr']['country-name'] = array(
      '#type' => 'textfield',
      '#title' => t('Country'),
      '#default_value' => $config->get('country_name'),
    );
    $form['microformats_hcard_site']['location'] = array(
      '#type' => 'fieldset',
      '#title' => t('Geographical Location'),
      '#description' => t('Enter your geographical coordinates to help people locate you.'),
    );
    $form['microformats_hcard_site']['location']['longitude'] = array(
      '#type' => 'textfield',
      '#title' => t('Longitude'),
      '#default_value' => $config->get('longitude'),
      '#description' => t('Longitude, in full decimal format (like -121.629562).'),
    );
    $form['microformats_hcard_site']['location']['latitude'] = array(
      '#type' => 'textfield',
      '#title' => t('Latitude'),
      '#default_value' => $config->get('latitude'),
      '#description' => t('Latitude, in full decimal format (like 38.827382).'),
    );
    $form['microformats_hcard_site']['phone'] = array(
      '#type' => 'fieldset',
      '#title' => t('Phones'),
      '#description' => t('Enter the numbers at which you would like to be reached.'),
    );
    $form['microformats_hcard_site']['phone']['voice'] = array(
      '#type' => 'textfield',
      '#title' => t('Voice Phone Number(s)'),
      '#default_value' => $config->get('phone.voice'),
      '#description' => t('Voice phone numbers, separated by commas.'),
    );
    $form['microformats_hcard_site']['phone']['fax'] = array(
      '#type' => 'textfield',
      '#title' => t('Fax Number(s)'),
      '#default_value' => $config->get('phone.fax'),
      '#description' => t('Fax numbers, separated by commas.'),
    );
    $form['microformats_hcard_site']['email'] = array(
      '#type' => 'textfield',
      '#title' => t('Email'),
      '#default_value' => $config->get('email'),
      '#description' => t('Enter this site’s contact email address. This address will be displayed publicly, do not enter a private address.'),
      '#element_validate' => array(
        array($this, 'validate_email'),
      ),
    );

    $form['actions']['submit']['#value'] = t('Save information');

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validate_email(array &$element, FormStateInterface $form_state) {
    $validate = \Drupal::service('email.validator');

    if (!empty($element['#value']) && !$validate->isValid($element['#value'])) {
      $form_state->setError($element, t('You must enter a valid e-mail address.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('microformats_hcard_site.settings')
      ->set('type', $form_state->getValue(array('microformats_hcard_site', 'type')))
      ->set('fn_n.given_name', $form_state->getValue(array('microformats_hcard_site', 'fn_n', 'given-name')))
      ->set('fn_n.family_name', $form_state->getValue(array('microformats_hcard_site', 'fn_n', 'family-name')))
      ->set('org', $form_state->getValue(array('microformats_hcard_site', 'org')))
      ->set('use_site_name', $form_state->getValue(array('microformats_hcard_site', 'use_site_name')))
      ->set('tagline', $form_state->getValue(array('microformats_hcard_site', 'tagline')))
      ->set('use_site_slogan', $form_state->getValue(array('microformats_hcard_site', 'use_site_slogan')))
      ->set('street_address', $form_state->getValue(array('microformats_hcard_site', 'adr', 'street-address')))
      ->set('extended_address', $form_state->getValue(array('microformats_hcard_site', 'adr', 'extended-address')))
      ->set('locality', $form_state->getValue(array('microformats_hcard_site', 'adr', 'locality')))
      ->set('region', $form_state->getValue(array('microformats_hcard_site', 'adr', 'region')))
      ->set('postal_code', $form_state->getValue(array('microformats_hcard_site', 'adr', 'postal-code')))
      ->set('country_name', $form_state->getValue(array('microformats_hcard_site', 'adr', 'country-name')))
      ->set('longitude', $form_state->getValue(array('microformats_hcard_site', 'location', 'longitude')))
      ->set('latitude', $form_state->getValue(array('microformats_hcard_site', 'location', 'latitude')))
      ->set('phone.voice', $form_state->getValue(array('microformats_hcard_site', 'phone', 'voice')))
      ->set('phone.fax', $form_state->getValue(array('microformats_hcard_site', 'phone', 'fax')))
      ->set('email', $form_state->getValue(array('microformats_hcard_site', 'email')))
      ->save();
  }

}
