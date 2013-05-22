<?php

// Create theme settings form widgets using Forms API

// Layout Settings

/*
$form['themes_ettings']['enable_color'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable Color Module'),
    '#default_value' => theme_get_setting('enable_color'),
	 '#description' => t('Check here if you want the theme to use the color module supplied with it.'),
  );
  

  $form['social_menu'] = array(
    '#type' => 'fieldset',
    '#title' => t('Social Menu Settings'),
    '#collapsible' => FALSE,
	
  );

  $form['social_menu']['social_links'] = array(
    '#type' => 'checkbox',
    '#title' => t('Social Menu'),
    '#default_value' => theme_get_setting('social_links'),
     '#description' => t('Check Here To unable Social Menu Links'),
  );
 
$form['social_menu']['social_links_container'] = array(
      '#type' => 'container',
      '#states' => array(
        // Hide the logo settings when using the default logo.
        'invisible' => array(
          'input[name="social_links"]' => array('checked' => FALSE),
        ),
      ),
    );
	
	$form['social_menu']['social_links_container'] ['facebook'] = array(
    '#type' => 'fieldset',
    '#title' => t('Facebook Settings'),
    '#collapsible' => TRUE,
	'#collapsed' => TRUE,
  );
  
  $form['social_menu']['social_links_container'] ['twitter'] = array(
    '#type' => 'fieldset',
    '#title' => t('Twitter Settings'),
    '#collapsible' => TRUE,
	'#collapsed' => TRUE,
	
  );
  $form['social_menu']['social_links_container'] ['rss'] = array(
    '#type' => 'fieldset',
    '#title' => t('RSS Settings'),
    '#collapsible' => TRUE,
	'#collapsed' => TRUE,
  );
  
  $facebook_logo_path = theme_get_setting('facebook_logo_path');
  $twitter_logo_path = theme_get_setting('twitter_logo_path');
  $rss_logo_path = theme_get_setting('rss_logo_path');
  
   if (file_uri_scheme($facebook_logo_path) == 'public') {
      $facebook_logo_path = file_uri_target($facebook_logo_path);
    }
	 if (file_uri_scheme($twitter_logo_path) == 'public') {
      $twitter_logo_path = file_uri_target($twitter_logo_path);
    }
	 if (file_uri_scheme($rss_logo_path) == 'public') {
      $rss_logo_path = file_uri_target($rss_logo_path);
    }
 $form['social_menu']['social_links_container']['facebook']['facebook_logo_path'] = array(
      '#type' => 'textfield',
      '#title' => t('Facebook Logo Path'),
      '#default_value' => $facebook_logo_path,
      '#description' => t('The path to the file you would like to use as your logo file instead of the default logo.'),
    );
	
	$form['social_menu']['social_links_container']['facebook']['facebook_logo_upload'] = array(
      '#type' => 'file',
      '#title' => t('Upload Facebook logo image'),
      '#maxlength' => 40,
      '#description' => t("If you don't have direct file access to the server, use this field to upload your logo.")
    );
	
	$form['social_menu']['social_links_container']['facebook']['facebook_url_path'] = array(
      '#type' => 'textfield',
      '#title' => t('Facebook URL'),
      '#default_value' => theme_get_setting('facebook_url_path'),
      '#description' => t('The path to the file you would like to use as your logo file instead of the default logo.'),
    );
	
	
    $form['social_menu']['social_links_container']['twitter']['twitter_logo_path'] = array(
      '#type' => 'textfield',
      '#title' => t('Path to custom logo'),
      '#default_value' => $twitter_logo_path,
      '#description' => t('The path to the file you would like to use as your logo file instead of the default logo.'),
    );
	
	$form['social_menu']['social_links_container']['twitter']['twitter_logo_upload'] = array(
      '#type' => 'file',
      '#title' => t('Upload Twitter logo image'),
      '#maxlength' => 40,
      '#description' => t("If you don't have direct file access to the server, use this field to upload your logo.")
    );
	
	$form['social_menu']['social_links_container']['twitter']['twitter_url_path'] = array(
      '#type' => 'textfield',
      '#title' => t('Twitter URL'),
      '#default_value' => theme_get_setting('twitter_url_path'),
      '#description' => t('The path to the file you would like to use as your logo file instead of the default logo.'),
    );
	
	 $form['social_menu']['social_links_container']['rss']['rss_logo_path'] = array(
      '#type' => 'textfield',
      '#title' => t('Path to custom logo'),
      '#default_value' => $rss_logo_path,
      '#description' => t('The path to the file you would like to use as your logo file instead of the default logo.'),
    );
	
	$form['social_menu']['social_links_container']['rss']['rss_logo_upload'] = array(
      '#type' => 'file',
      '#title' => t('Upload RSS feeds logo image'),
      '#maxlength' => 40,
      '#description' => t("If you don't have direct file access to the server, use this field to upload your logo.")
    );
	
	$form['social_menu']['social_links_container']['rss']['rss_url_path'] = array(
      '#type' => 'textfield',
      '#title' => t('Site Rss URL'),
      '#default_value' => theme_get_setting('rss_url_path'),
      '#description' => t('The path to the file you would like to use as your logo file instead of the default logo.'),
    );
	
	$form['#submit'][] = 'engadinerpost_theme_settings_submit';
	
	
	function engadinerpost_theme_settings_submit($form, &$form_state)
	{
		 $validators = array('file_validate_is_image' => array());
		  // Check for a new uploaded logo.
 		 $file = file_save_upload('facebook_logo_upload', $validators);
		  if (isset($file)) {
 	  			 // File upload was attempted.
 		   		if ($file) {
  		   			 // Put the temporary file in form_values so we can save it on submit.
    		 		 $form_state['values']['facebook_logo_upload'] = $file;
					 unset($form_state['values']['facebook_logo_upload']);
  			 		 $filename = file_unmanaged_copy($file->uri);
   					$form_state['values']['facebook_logo_path'] = $filename;
   				 }
   				 else {
    		  // File upload failed.
    				  form_set_error('facebook_logo_upload', t('The logo could not be uploaded.'));
    			 }
  			}
		
		 $file1 = file_save_upload('twitter_logo_upload', $validators);
		  if (isset($file1)) {
 	  			 // File upload was attempted.
 		   		if ($file1) {
  		   			 // Put the temporary file in form_values so we can save it on submit.
    		 		 $form_state['values']['twitter_logo_upload'] = $file1;
					 unset($form_state['values']['twitter_logo_upload']);
  			 		 $filename = file_unmanaged_copy($file1->uri);
   					$form_state['values']['twitter_logo_path'] = $filename;
   				 }
   				 else {
    		  // File upload failed.
    				  form_set_error('twitter_logo_upload', t('The logo could not be uploaded.'));
    			 }
  			}
		$file2 = file_save_upload('rss_logo_upload', $validators);
		  if (isset($file2)) {
 	  			 // File upload was attempted.
 		   		if ($file2) {
  		   			 // Put the temporary file in form_values so we can save it on submit.
    		 		 $form_state['values']['rss_logo_upload'] = $file2;
					 unset($form_state['values']['rss_logo_upload']);
  			 		 $filename = file_unmanaged_copy($file2->uri);
   					$form_state['values']['rss_logo_path'] = $filename;
   				 }
   				 else {
    		  // File upload failed.
    				  form_set_error('rss_logo_upload', t('The logo could not be uploaded.'));
    			 }
  			}
			$values = $form_state['values'];
			if (!empty($values['twitter_logo_path'])) {				
    $form_state['values']['twitter_logo_path'] = _system_theme_settings_validate_path($values['twitter_logo_path']);
  }
  		if (!empty($values['facebook_logo_path'])) {
    $form_state['values']['facebook_logo_path'] = _system_theme_settings_validate_path($values['facebook_logo_path']);
  }
  if (!empty($values['rss_logo_path'])) {
    $form_state['values']['rss_logo_path'] = _system_theme_settings_validate_path($values['rss_logo_path']);
  }

}

*/
  $form['floating_main_menu_con'] = array(
    '#type' => 'fieldset',
    '#title' => t('Main Menu Settings'),
    '#collapsible' => TRUE,
	'#collapsed' => TRUE,	
  );
  $form['floating_main_menu_con']['floating_main_menu'] = array(
    '#type' => 'checkbox',
    '#title' => t('Floating Menu'),
    '#default_value' => theme_get_setting('floating_main_menu'),
     '#description' => t('Check Here To unable Floating Menu'),
  );
  
  
  if (theme_get_setting('enable_styles') == 'on') {
    $form['styles'] = array(
      '#type' => 'fieldset',
      '#title' => t('Style settings'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    );
    $form['styles']['font'] = array(
      '#type' => 'fieldset',
      '#title' => t('Font and Headings settings'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
    );
    $form['styles']['font']['font_family'] = array(
      '#type' => 'select',
      '#title' => t('Font family'),
      '#default_value' => theme_get_setting('font_family'),
      '#options' => array(
        'ff-sss' => t('Helvetica Nueue, Trebuchet MS, Arial, Nimbus Sans L, FreeSans, sans-serif'),
        'ff-ssl' => t('Verdana, Geneva, Arial, Helvetica, sans-serif'),
        'ff-a'   => t('Arial, Helvetica, sans-serif'),
        'ff-ss'  => t('Garamond, Perpetua, Nimbus Roman No9 L, Times New Roman, serif'),
        'ff-sl'  => t('Baskerville, Georgia, Palatino, Palatino Linotype, Book Antiqua, URW Palladio L, serif'),
        'ff-m'   => t('Myriad Pro, Myriad, Arial, Helvetica, sans-serif'),
        'ff-l'   => t('Lucida Sans, Lucida Grande, Lucida Sans Unicode, Verdana, Geneva, sans-serif'),
      ),
    );
    $form['styles']['font']['headings_font_family'] = array(
      '#type' => 'select',
      '#title' => t('Headings Font family'),
      '#default_value' => theme_get_setting('headings_font_family'),
      '#options' => array(
        'hff-sss' => t('Helvetica Nueue, Trebuchet MS, Arial, Nimbus Sans L, FreeSans, sans-serif'),
        'hff-ssl' => t('Verdana, Geneva, Arial, Helvetica, sans-serif'),
        'hff-a'   => t('Arial, Helvetica, sans-serif'),
        'hff-ss'  => t('Garamond, Perpetua, Nimbus Roman No9 L, Times New Roman, serif'),
        'hff-sl'  => t('Baskerville, Georgia, Palatino, Palatino Linotype, Book Antiqua, URW Palladio L, serif'),
        'hff-m'   => t('Myriad Pro, Myriad, Arial, Helvetica, sans-serif'),
        'hff-l'   => t('Lucida Sans, Lucida Grande, Lucida Sans Unicode, Verdana, Geneva, sans-serif'),
      ),
    );
    $form['styles']['font']['font_size'] = array(
      '#type' => 'select',
      '#title' => t('Base Font Size'),
      '#default_value' => theme_get_setting('font_size'),
      '#description' => t('This sets a base font-size on the body element - all text will scale relative to this value.'),
      '#options' => array(
        'fs-10' => t('0.833em'),
        'fs-11' => t('0.917em'),
        'fs-12' => t('1em'),
        'fs-13' => t('1.083em'),
        'fs-14' => t('1.167em'),
        'fs-15' => t('1.25em'),
        'fs-16' => t('1.333em'),
      ),
    );
    $form['styles']['font']['headings_styles'] = array(
      '#type' => 'fieldset',
      '#title' => t('Heading Styles'),
      '#description' => t('Add extra styles to headings. Shadows ony work for CSS3 capable browsers such as Firefox, Safari, IE9 etc.'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    );
    $form['styles']['font']['headings_styles']['headings_styles_caps'] = array(
      '#type' => 'checkbox',
      '#title' => t('All Caps'),
      '#default_value' => theme_get_setting('headings_styles_caps'),
    );
    $form['styles']['font']['headings_styles']['headings_styles_weight'] = array(
      '#type' => 'checkbox',
      '#title' => t('Font weight normal'),
      '#default_value' => theme_get_setting('headings_styles_weight'),
    );
    $form['styles']['font']['headings_styles']['headings_styles_shadow'] = array(
      '#type' => 'checkbox',
      '#title' => t('Text shadows'),
      '#default_value' => theme_get_setting('headings_styles_shadow'),
    );
    $form['styles']['corners'] = array(
      '#type' => 'fieldset',
      '#title' => t('Rounded corner settings'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
    );
    $form['styles']['corners']['corner_radius'] = array(
      '#type' => 'select',
      '#title' => t('Corner radius'),
      '#default_value' => theme_get_setting('corner_radius'),
      '#description' => t('Change the corner radius for blocks, node teasers and comments.'),
      '#options' => array(
        'rc-0' => t('none'),
        'rc-4' => t('4px'),
        'rc-8' => t('8px'),
        'rc-12' => t('12px'),
      ),
    );
    $form['styles']['pagestyles'] = array(
      '#type' => 'fieldset',
      '#title' => t('Page style'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
    );
    $form['styles']['pagestyles']['box_shadows'] = array(
      '#type' => 'radios',
      '#title' => t('Box shadow'),
      '#default_value' => theme_get_setting('box_shadows'),
      '#description' => t('Add styles for CSS3 browsers.'),
      '#options' => array(
        'bs-n' => t('None'),
        'bs-l' => t('Box shadow - light'),
        'bs-d' => t('Box shadow - dark'),
      ),
    );
  } // endif styles