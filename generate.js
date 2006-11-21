// JavaScript Document
$(document).ready(function() {
						   
	/* get values of text fields */
      var givenname = $('givenname').value;
      var additionalname = $('additionalname').value;
      var familyname = $('familyname').value;
      var email = $('email').value;
      var country = $("country").value;

	
	$hcardtemplate01 = '<div class="vcard">\n'
	$hcardtemplate02 = '		<span class="given-name">${given_name}</span>\n'
	$hcardtemplate03 = '		<span class="additional-name">${additional_name}</span>\n'
	$hcardtemplate04 = '		<span class="family-name">${family_name}</span>\n'
    $hcardtemplate05 = '		<a class="email" href="mailto:${email}">${email}<\/a>\n'
    $hcardtemplate06 = '		<span class="country-name">${country}<\/span>\n'
	$hcardtemplate07 = '</div>\n'
	
	$hcardtemplate = $hcardtemplate01 + $hcardtemplate02 + $hcardtemplate03 + $hcardtemplate04 + $hcardtemplate05 + $hcardtemplate06 + $hcardtemplate07
	$('#edit-countryname').parent().after('<div id="preview-box"><div class="comment-by">Live hCard View</div><textarea id="live-preview" rows="8">' + $hcardtemplate + '</textarea>');
	$('#live-preview').parent().after('<div id="live-preview2" style="border:1px solid #000; background:#ddd;">Preview:' + $hcardtemplate + '</div></div>');
	
	$('#edit-givenname').keyup(function() {
		 $hcardtemplate02 = '		<span class="given-name">' + $(this).val() + '</span>\n';
		 	$hcardtemplate = $hcardtemplate01 + $hcardtemplate02 + $hcardtemplate03 + $hcardtemplate04 + $hcardtemplate05 + $hcardtemplate06 + $hcardtemplate07
		$('#live-preview').html( $hcardtemplate );
		$('#live-preview2').html( $hcardtemplate );
	});
	
	$('#edit-middlename').keyup(function() {
		 $hcardtemplate03 = '		<span class="additional-name">' + $(this).val() + '</span>\n';
		 	$hcardtemplate = $hcardtemplate01 + $hcardtemplate02 + $hcardtemplate03 + $hcardtemplate04 + $hcardtemplate05 + $hcardtemplate06 + $hcardtemplate07
		$('#live-preview').html( $hcardtemplate );
		$('#live-preview2').html( $hcardtemplate );
	});
	
	$('#edit-familyname').keyup(function() {
		 $hcardtemplate04 = '		<span class="family-name">' + $(this).val() + '</span>\n';
		 	$hcardtemplate = $hcardtemplate01 + $hcardtemplate02 + $hcardtemplate03 + $hcardtemplate04 + $hcardtemplate05 + $hcardtemplate06 + $hcardtemplate07
		$('#live-preview').html( $hcardtemplate );
		$('#live-preview2').html( $hcardtemplate );
	});
	
	$('#edit-email').keyup(function() {
		 $hcardtemplate05 = '		<a class="email" href="mailto:' + $(this).val() + '">' + $(this).val() + '</a>\n';
		 	$hcardtemplate = $hcardtemplate01 + $hcardtemplate02 + $hcardtemplate03 + $hcardtemplate04 + $hcardtemplate05 + $hcardtemplate06 + $hcardtemplate07
		$('#live-preview').html( $hcardtemplate );
		$('#live-preview2').html( $hcardtemplate );
	});
	
	$('#edit-countryname').keyup(function() {
		 $hcardtemplate06 = '		<span class="country-name">' + $(this).val() + '</span>\n';
		 	$hcardtemplate = $hcardtemplate01 + $hcardtemplate02 + $hcardtemplate03 + $hcardtemplate04 + $hcardtemplate05 + $hcardtemplate06 + $hcardtemplate07
		$('#live-preview').html( $hcardtemplate );
		$('#live-preview2').html( $hcardtemplate );
	});

});

