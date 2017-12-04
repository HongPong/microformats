<?php

/**
 * @file
 * Contains \Drupal\microformats\Plugin\Block\ContactInfoBlock.
 */
namespace Drupal\microformats\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\contactinfo\Utility;
/**
 * Provides a 'Contact Info' block.
 *
 * @Block(
 *   id = "microformats_contactinfo_block",
 *   admin_label = @Translation("Microformats Contact Info Block")
 * )
 */
class ContactInfoBlock extends BlockBase {
    /**
     * {@inheritdoc}
     */
    public function build() {

        $render = ['#theme' => 'microformats_contactinfo_block'];
        $render = array_merge($render, Utility::getContactInfoVars());
        $render['#attached']['library'][] = 'microformats/microformats';
        return $render;
    }
}