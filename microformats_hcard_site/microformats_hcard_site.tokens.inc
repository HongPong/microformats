<?php
/**
 * @file
 * Token support for the microformats_hcard_site module.
 */

/**
 * Implements hook_token_info().
 */
function microformats_hcard_site_token_info() {
  $type = array(
    'name' => t('Microformat Site-Wide hCard Contact information'),
    'description' => t('Tokens for this site\'s contact information.'),
  );

  $tokens['type'] = array(
    'name' => t('Contact information type'),
    'description' => t('Either "Personal" or "Organization/Business".'),
  );
  $tokens['given-name'] = array(
    'name' => t('First Name'),
    'description' => t('Site contact person\'s first name.'),
  );
  $tokens['family-name'] = array(
    'name' => t('Last Name'),
    'description' => t('Site contact person\'s last name.'),
  );
  $tokens['org'] = array(
    'name' => t('Organization/Business Name'),
    'description' => t('The name of the organization or business.'),
  );
  $tokens['tagline'] = array(
    'name' => t('Tagline'),
    'description' => t('A short tagline.'),
  );
  $tokens['adr-street-address'] = array(
    'name' => t('Street Address'),
    'description' => t('The street address portion of the contact address.'),
  );
  $tokens['adr-extended-address'] = array(
    'name' => t('Extended Address'),
    'description' => t('The extended address portion of the contact address.'),
  );
  $tokens['adr-locality'] = array(
    'name' => t('City'),
    'description' => t('The city portion of the contact address.'),
  );
  $tokens['adr-region'] = array(
    'name' => t('State/Province'),
    'description' => t('The state or province portion of the contact address.'),
  );
  $tokens['adr-postal-code'] = array(
    'name' => t('Postal Code'),
    'description' => t('The postal code portion of the contact address.'),
  );
  $tokens['adr-country-name'] = array(
    'name' => t('Country'),
    'description' => t('The country name portion of the contact address.'),
  );
  $tokens['location-longitude'] = array(
    'name' => t('Longitude'),
    'description' => t('Longitude, in full decimal format (like -121.629562).'),
  );
  $tokens['location-latitude'] = array(
    'name' => t('Latitude'),
    'description' => t('Latitude, in full decimal format (like 38.827382).'),
  );
  $tokens['phone-voice'] = array(
    'name' => t('Voice Phone Number(s)'),
    'description' => t('Voice phone numbers, separated by commas.'),
  );
  $tokens['phone-fax'] = array(
    'name' => t('Fax Number(s)'),
    'description' => t('Fax numbers, separated by commas.'),
  );
  $tokens['email'] = array(
    'name' => t('Email'),
    'description' => t('This site\'s contact email address.'),
  );

  return array(
    'types' => array(
      'microformats_hcard_site' => $type,
    ),
    'tokens' => array(
      'microformats_hcard_site' => $tokens,
    ),
  );
}

/**
 * Implements hook_tokens().
 */
function contactinfo_tokens($type, $tokens, array $data = array(), array $options = array()) {
  $replacements = array();
  $sanitize = !empty($options['sanitize']);

  if ($type === 'microformats_hcard_site') {
    $config = \Drupal::config('microformats_hcard_site.settings');
    $site_config = \Drupal::config('system.site');

    foreach ($tokens as $name => $original) {
      $value = FALSE;
      switch ($name) {
        case 'type':
          $value = $config->get('type');
          break;

        case 'given-name':
          $value = $config->get('fn_n.given_name');
          break;

        case 'family-name':
          $value = $config->get('fn_n.family_name');
          break;

        case 'org':
          $value = $config->get('use_site_name') ? $site_config->get('name') : $config->get('org');
          break;

        case 'tagline':
          $value = $config->get('use_site_slogan') ? $site_config->get('slogan') : $config->get('tagline');
          break;

        case 'adr-street-address':
          $value = $config->get('street_address');
          break;

        case 'adr-extended-address':
          $value = $config->get('extended_address');
          break;

        case 'adr-locality':
          $value = $config->get('locality');
          break;

        case 'adr-region':
          $value = $config->get('region');
          break;

        case 'adr-postal-code':
          $value = $config->get('postal_code');
          break;

        case 'adr-country-name':
          $value = $config->get('country_name');
          break;

        case 'location-latitude':
          $value = $config->get('latitude');
          break;

        case 'location-longitude':
          $value = $config->get('longitude');
          break;

        case 'phone-voice':
          $value = $config->get('phone.voice');
          break;

        case 'phone-fax':
          $value = $config->get('phone.fax');
          break;

        case 'email':
          $value = $config->get('email');
          break;

      }
      if ($value) {
        $replacements[$original] = $sanitize ? check_plain($value) : $value;
      }
    }
  }

  return $replacements;
}
