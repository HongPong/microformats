<?php
/**
 * @file
 * Provides Contact Info block.
 *
 * @Block(
 *   id = "microformats_hcard_site",
 *   admin_label = @translation("Contact Info"),
 * )
 */

namespace Drupal\microformats_hcard_site\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
/**
 * ContactInfoBlock is based on BlockBase and implements BlockPluginInterface.
 */
class MicroformatsHcardSiteBlock extends BlockBase implements BlockPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#theme' => 'microformats_hcard_site',
      '#contextual_links' => array(
        'block' => array(
          'route_parameters' => array('microformats_hcard_site' => 'microformats_hcard_site_configure'),
        ),
      ),
      '#microformats_hcard_site' => NULL,
      '#type' => 'personal',
      '#given_name' => NULL,
      '#family_name' => NULL,
      '#org' => NULL,
      '#tagline' => NULL,
      '#street_address' => NULL,
      '#extended_address' => NULL,
      '#locality' => NULL,
      '#region' => NULL,
      '#postal_code' => NULL,
      '#country' => NULL,
      '#longitude' => NULL,
      '#latitude' => NULL,
      '#phones' => array(),
      '#faxes' => array(),
      '#email' => NULL,
      '#attached' => array(
        'library' => array('microformats_hcard_site/microformats_hcard_site-block'),
      ),
    );
  }

}
