/**
 * @file
 * JS for the microformats_hcard_site module settings form.
 */
(function ($) {
  "use strict";
  Drupal.behaviors.microformats_hcard_site = {
    attach: function () {
      var microformats_hcard_siteProperties = {
        org: {
          $checkbox: $('#edit-microformats_hcard_site-use-site-name'),
          $textField: $('#edit-microformats_hcard_site-org'),
          siteSettingsVal: drupalSettings.microformats_hcard_site.siteName
        },
        tagline: {
          $checkbox: $('#edit-microformats_hcard_site-use-site-slogan'),
          $textField: $('#edit-microformats_hcard_site-tagline'),
          siteSettingsVal: drupalSettings.microformats_hcard_site.siteSlogan
        }
      };

      $.each(microformats_hcard_siteProperties, function (i, v) {
        // Store user-entered value.
        var userEnteredVal = v.$textField.val();
        if (v.$checkbox.is(':checked')) {
          v.$textField.attr('disabled', 'disabled').val(v.siteSettingsVal);
        }
        v.$checkbox.change(function () {
          if ($(this).is(':checked')) {
            // Store latest user-entered value in case the checkbox gets unchecked.
            userEnteredVal = v.$textField.val();
            v.$textField.attr('disabled', 'disabled').val(v.siteSettingsVal);
          }
          else {
            v.$textField.removeAttr('disabled').val(userEnteredVal);
          }
        });
      });
    }
  };
})(jQuery);
