README for microformats_hcard_site for Drupal 8

This module collects site-wide contact information and displays it in a block
that you can place anywhere on your site.

Contact information that you provide will be displayed on the site in the hCard
microformat ( http://microformats.org/wiki/hcard ). An hCard is a small bundle of
code that you want to put on your web site so that Google Maps (and other
mapping services) can more easily index the site's location information.

INSTALLATION
============

- Download and place into /modules or /sites/all/modules
- Enable the module at /admin/modules
- Enter your contact information at /admin/config/system/microformats/hcard_site
- Place the 'Contact information' block into one of your theme's regions at
  /admin/structure/block/list/

RECOMMENDED MODULES
===================

- Invisimail ( http://drupal.org/project/invisimail )
  Email addresses within the hCard will be obfuscated if the Invisimail module
  is installed. (Not yet implemented for Drupal 8.)

FURTHER INFO
============

- Information about validators ( http://microformats.org/wiki/validators )
- Other hCard implementations ( http://microformats.org/wiki/hcard-implementations )
- Indieweb on hCard ( https://indiewebcamp.com/h-card )
- Validator ( http://indiewebify.me/validate-h-card/ )

THANKS
======
Thanks to Shawn DeArmond, author of the hCard module on drupal.org which
inspired this module.


BASED ON WORK BY
================
- https://www.drupal.org/project/contactinfo
- Contact Info by dboulet (Daniel Boulet)
- Drupal 8 patch by rang501