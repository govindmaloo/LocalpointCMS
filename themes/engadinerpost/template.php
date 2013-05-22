<?php
// $Id: template.php,v 1.10 2011/01/14 02:57:57 jmburnz Exp $

/**
 * @file template.php
 */

/**
 * Automatically rebuild the theme registry.
 * Uncomment to use during development.
 */
// drupal_theme_rebuild();

/**
 * Override or insert variables into all templates.
 */
function engadinerpost_process(&$vars) {
	
  // Provide a variable to check if the page is in the overlay.
  if (module_exists('overlay')) {
    $vars['in_overlay'] = (overlay_get_mode() == 'child');
  }
  else {
    $vars['in_overlay'] = FALSE;
  }
}

/**
 * Override or insert variables into the html template.
 */
function engadinerpost_preprocess_html(&$vars) {
	if(theme_get_setting("floating_main_menu") == 1) :
		drupal_add_js('jQuery(document).ready(function(){if(document.getElementById("suckerfish")){																					
			menuYloc = jQuery(name).offset();
			jQuery(window).scroll(function () { 
						if((jQuery(document).scrollTop()) > menuYloc.top)	{	
							jQuery(name).addClass("menufloat");
							loc_top = parseInt(jQuery("body").css("padding-top").substring(0,jQuery("body").css("padding-top").indexOf("px")));						
				offset = loc_top +"px";
				jQuery(".menufloat").css("top", offset);
				var wwidth = jQuery(window).width();				
				jQuery(".menufloat").css("width", wwidth);
						}
				else if(jQuery(name).hasClass("menufloat"))
				{
					jQuery(".menufloat").css("width", "800px");
					jQuery(name).removeClass("menufloat");					
				}
			});
			
			}  });', "inline");
	endif;
	
	
  // Additional body classes to help out themers.      
  
  $sidebar_first=false;
  $sidebar_second=false;
  if (module_exists('color') && theme_get_setting('enable_color')==1) {
// if (module_exists('color')) {
   $vars['classes_array'][] = 'color_enabled';
  }
  else{$vars['classes_array'][] = 'color_disabled';}
	
  if (!$vars['is_front']) {
    // Add unique class for each page.
    $path = drupal_get_path_alias($_GET['q']);
    // Add unique class for each website section.
    list($section, ) = explode('/', $path, 2);
    if (arg(0) == 'node') {
      if (arg(1) == 'add') {
        $section = 'page-node-add';
      }
      elseif (is_numeric(arg(1)) && (arg(2) == 'edit' || arg(2) == 'delete')) {
        $section = 'page-node-' . arg(2);
      }
	  $vars['classes_array'][] = drupal_html_class('section-' . $section);
    }  
  }
  $flag=true;
  if($vars['is_front'])
  {
	  $flag=true;
  }
  else if($node = menu_get_object())
  {	  
  	//if (node_is_page($vars['node'])){
	  $flag=true;
	//  }
  }

  
 if ($flag)
  {
 
 	 if (!empty($vars['page']['sidebar_first']) || !empty($vars['page']['bot_sidebar_first'])) {
    $sidebar_first=true;
  	}
   	 if (!empty($vars['page']['sidebar_second']) || !empty($vars['page']['bot_sidebar_second'])) {
    $sidebar_second=true;
 	 }	
		
	 if (!empty($vars['page']['widget'])) {
   	 $vars['classes_array'][] = 'sidebar-two-column';
 	 }
 	 
 	 else if($sidebar_first && $sidebar_second)
 	 {
		$vars['classes_array'][] = 'sidebar-two-column';
  	 }
	 else if($sidebar_first)	 
	 {
		 $vars['classes_array'][] = 'sidebar-one-column sidebar_first';
	 }
	 else if($sidebar_second)
	 {
		 $vars['classes_array'][] = 'sidebar-one-column sidebar_second';
	 }
	  else{
		$vars['classes_array'][] = 'sidebar-no-column';
  	 }
  }
   else{
		$vars['classes_array'][] = 'sidebar-no-column';
  	 }
  
  
}

function engadinerpost_process_html(&$vars) {	
	if (module_exists('color') && theme_get_setting('enable_color')==1) {
    _color_html_alter($vars);
  }
	
	$classes = explode(' ', $vars['classes']);
  $classes[] = theme_get_setting('font_family');
  $classes[] = theme_get_setting('headings_font_family');
  $classes[] = theme_get_setting('font_size');
  $classes[] = theme_get_setting('box_shadows');
  $classes[] = theme_get_setting('corner_radius');
  if (theme_get_setting('headings_styles_caps') == 1) {
    $classes[] = 'hs-caps';
  }
  if (theme_get_setting('headings_styles_weight') == 1) {
    $classes[] = 'hs-fwn';
  }
  if (theme_get_setting('headings_styles_shadow') == 1) {
    $classes[] = 'hs-ts';
  }
  $vars['classes'] = trim(implode(' ', $classes));
}


/**
 * Override or insert variables into the page template.
 */
function engadinerpost_process_page(&$vars) {
  // Add a wrapper div using the title_prefix and title_suffix render elements.
  if (!empty($vars['title_suffix']['add_or_remove_shortcut']) ) {
    $vars['title_prefix']['shortcut_wrapper'] = array(
      '#markup' => '<div class="shortcut-wrapper clearfix">',
      '#weight' => 100,
    );
    $vars['title_suffix']['shortcut_wrapper'] = array(
      '#markup' => '</div>',
      '#weight' => -99,
    );
    // Make sure the shortcut link is the first item in title_suffix.
    $vars['title_suffix']['add_or_remove_shortcut']['#weight'] = -100;
  }
}

/**
 * Override or insert variables into page templates.
 */ 

function engadinerpost_preprocess_page(&$vars, $hook) {
	
  global $theme;
  $terms = array('Sonderseiten', 'Romanisch lernen');
  if(arg(0)=='archive-print'){$vars['theme_hook_suggestions'][] = 'page__nosidebar';}
  if (arg(0) == 'taxonomy') {
	  $tid = arg(2);
	  $termobj = entity_load('taxonomy_term', array($tid), array());
		if(isset($termobj[$tid]->field_sidebar) && !$termobj[$tid]->field_sidebar['und'][0]['value']){
			$vars['theme_hook_suggestions'][] = 'page__nosidebar';
			}
  }

   if (isset($vars['node'])) {
  // If the node type is "blog" the template suggestion will be "page--blog.tpl.php".
   $vars['theme_hook_suggestions'][] = 'page__'. $vars['node']->type;
   $vars['node_type'] = $vars['node']->type;
  }

  // Set variables for the logo and site_name.
  if ($vars['logo']) {
    $vars['site_logo'] = '<a href="' . $vars['front_page'] . '" title="' . t('Home page') . '" rel="home"><img src="' . $vars['logo'] . '" alt="' . $vars['site_name'] . ' ' . t('logo') . '" /></a>';
  }
  if ($vars['site_name']) {
    $vars['site_name'] = '<a href="' . $vars['front_page'] . '" title="' . t('Home page') . '" rel="home">' . $vars['site_name'] . '</a>';
  }
  
  // Set variables for the primary and secondary links.
  $vars['main_menu_links'] = theme('links__system_main_menu', array('links' => $vars['main_menu'], 'attributes' => array('id' => 'suckerfish', 'class' => array('menu', 'clearfix')), 'heading' => array('text' => t('Main menu'),'level' => 'h2','class' => array('element-invisible'),)));

  $vars['secondary_menu_links'] = theme('links__system_secondary_menu', array('links' => $vars['secondary_menu'], 'attributes' => array('id' => 'secondary-menu', 'class' => array('links', 'clearfix')), 'heading' => array('text' => t('Secondary menu'),'level' => 'h2','class' => array('element-invisible'),))); 

  }
  
  

/**
 * Override or insert variables into the node templates.
 */
function engadinerpost_preprocess_node(&$vars) {
  global $user;
  $node = $vars['node'];
  
  
 /* if(isset($node->field_contype) && $vars['view_mode'] == "full"):
	  drupal_set_title("Access Denied");
	  
	  print $node->field_contype[$node->language][0]['value'];			
  endif;*/
  
  $vars['created'] = 	format_date($node->created, $type = 'custom', $format = 'l, d. M Y', $timezone = NULL, $langcode = NULL);
  // Add to node classes.
  if ($node->uid && $node->uid == $user->uid) {
    // Node is authored by current user.
	
   $vars['classes_array'][] = 'node-mine';
  }
  if ($vars['page']) {
    // Node is displayed as teaser.
    $vars['classes_array'][] = 'node-view';
  }
  // Set variable for status.
  if (!$vars['status']) {
    $vars['unpublished'] = TRUE;
  }
  else {
    $vars['unpublished'] = FALSE;
  }
}

function engadinerpost_preprocess_views_view_fields(&$vars) {
	if ($vars['view']->name == "rss_feeds"){
  // If the node type is "blog" the template suggestion will be "page--blog.tpl.php".
   $vars['theme_hook_suggestions'][] = 'views_view_fields__'. $vars['view']->name;
   }
}
/**
 * Override or insert variables in comment templates.
 */
function engadinerpost_preprocess_comment(&$vars) {
  // Add odd and even classes to comments
  $vars['classes_array'][] = $vars['zebra'];
}

/**
 * Override or insert variables into block templates.
 */
function engadinerpost_preprocess_block(&$vars) {
  $block = $vars['block'];
  $vars['title'] = $block->subject;
  // Special classes for blocks
  $vars['classes_array'][] = 'block-' . $vars['block_zebra'];
  $vars['classes_array'][] = 'block-' . drupal_html_class($block->region);
  $vars['classes_array'][] = 'block-count-' . $vars['id'];
  
   if ($vars['block']->region == 'header') {
    $vars['title_attributes_array']['class'][] = 'element-invisible';
  }
  
}


function engadinerpost_preprocess_field()
{
	 if (isset($vars['node']) && ($vars['node']->type === 'image_gallery')) {
  // If the node type is "blog" the template suggestion will be "page--blog.tpl.php".
   $vars['theme_hook_suggestions'][] = 'field__'. $vars['node']->type;
  }
}

function engadinerpost_admin_block_content($vars) {
  $content = $vars['content'];
  $output = '';
  if (!empty($content)) {
    $output = system_admin_compact_mode() ? '<ul class="admin-list compact">' : '<ul class="admin-list">';
    foreach ($content as $item) {
      $output .= '<li class="leaf">';
      $output .= l($item['title'], $item['href'], $item['localized_options']);
      if (isset($item['description']) && !system_admin_compact_mode()) {
        $output .= '<div class="description">' . filter_xss_admin($item['description']) . '</div>';
      }
      $output .= '</li>';
    }
    $output .= '</ul>';
  }
  return $output;
}


/**
 * Converts a string to an id.
 *
 * @param $string
 *   The string
 * @return
 *   The converted string
 *
 * @see http://drupal.org/project/zen
 */
function safe_string($string) {
  $string = strtolower(preg_replace('/[^a-zA-Z0-9_-]+/', '-', $string));
  if (!ctype_lower($string{0})) {
    $string = 'id'. $string;
  }
  return $string;
}

/*
function phptemplate_menu_links($links, $attributes = array()) {
 
  if (!count($links)) {
    return '';
  }
  $level_tmp = explode('-', key($links));
  $level = $level_tmp[0];
  $output = "<ul class=\"links-$level ".$attributes['class']. "\" id=\"".$attributes['id']."\">\n";
 
  $num_links = count($links);
  $i = 1;
 
  foreach ($links as $index => $link) {
    $output .= '<li';
 
    $output .= ' class="';
    if (stristr($index, 'active')) {
		$link['attributes']['class'] = 'inactive';
      $output .= 'inactive';
    }
    elseif((drupal_is_front_page()) && ($link['href']=='<front>')){
      $link['attributes']['class'] = 'inactive';
      $output .= 'imactive';
    }
    if ($i == 1) {
      $output .= ' first'; }
    if ($i == $num_links) {
      $output .= ' last'; }
 
    $output .= '"';
 
    $output .= ">". l($link['title'], $link['href'], $link['attributes'], $link['query'], $link['fragment']) ."</li>\n";
 
    $i++;
  }
  $output .= '</ul>';
  return $output;
}
 */
 
 
 /*function engadinerpost_menu_item_link($link) {
  // Allows for images as menu items. Just supply the path to the image as the title
  if (strpos($link['title'], '.png') !== false || strpos($link['title'], '.jpg') !== false || strpos($link['title'], '.gif') !== false) {
    $link['title'] = '<img alt="'. $link['description'] .'" title="'. $link['description'] .'" src="'. url($link['title']) .'" />';
    $link['localized_options']['html'] = TRUE;
  }
  return social_menu_menu_item_link($link); // Let Zen take over from here.
}*/

function engadinerpost_social_menu()
{
	$social_links = theme_get_setting('social_links');
	if($social_links=='1')
	{
		$twitter_img= theme_get_setting('twitter_logo_path');
		$facebook_img= theme_get_setting('facebook_logo_path');
		$rss_img= theme_get_setting('rss_logo_path');
		
 		$facebook_url= theme_get_setting('facebook_url_path');
		$twitter_url= theme_get_setting('twitter_url_path');
		$rss_url= theme_get_setting('rss_url_path');
		
		if (file_uri_scheme($facebook_img) == 'public') {
		     $facebook_img = file_create_url($facebook_img);			  
   		 }
		 if (file_uri_scheme($twitter_img) == 'public') {
		     $twitter_img = file_create_url($twitter_img);			  
   		 }
		 if (file_uri_scheme($rss_img) == 'public') {
		     $rss_img = file_create_url($rss_img);			  
   		 }
		print '<ul class="social_menu">
		 <li><a href="'.$facebook_url.'" title="Follow Us On Facebook" target="_blank"><img src="'.$facebook_img.'"></a></li> 
		 <li><a href="'.$twitter_url.'" title="Follow Us On Twitter" target="_blank"><img src="'.$twitter_img.'"></a></li>
		 <li><a href="'.$rss_url.'" title="Follow Us On Rss" target="_blank"><img src="'.$rss_img.'"></a></li>		 
		 </ul>';
	}
}




function engadinerpost_link($vars) {
	if($vars['path'] == "<none>"):
	 return '<a href="javascript:void(0);"' . drupal_attributes($vars['options']['attributes']) . '><span>' . ($vars['options']['html'] ? $vars['text'] : check_plain($vars['text'])) . '</span></a>';
	 else :
  return '<a href="' . check_plain(url($vars['path'], $vars['options'])) . '"' . drupal_attributes($vars['options']['attributes']) . '><span>' . ($vars['options']['html'] ? $vars['text'] : check_plain($vars['text'])) . '</span></a>';
  endif;
}

function engadinerpost_links__system_main_menu($vars){
  $links = $vars['links'];
  $attributes = $vars['attributes'];
  $heading = $vars['heading'];
  global $language_url;
  $output = '';

  if (count($links) > 0) {
    $output = '';
    // Treat the heading first if it is present to prepend it to the
    // list of links.
    if (!empty($heading)) {
      if (is_string($heading)) {
        // Prepare the array that will be used when the passed heading
        // is a string.
        $heading = array(
          'text' => $heading,
          // Set the default level of the heading.
          'level' => 'h2',
        );
      }
      $output .= '<' . $heading['level'];
      if (!empty($heading['class'])) {
        $output .= drupal_attributes(array('class' => $heading['class']));
      }
      $output .= '>' . check_plain($heading['text']) . '</' . $heading['level'] . '>';
    }

    $output .= '<ul' . drupal_attributes($attributes) . '>';

    $num_links = count($links);
    $i = 1;

    foreach ($links as $key => $link) {
      $class = array($key);

      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class[] = 'first';
      }
      if ($i == $num_links) {
        $class[] = 'last';
      }
      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))
          && (empty($link['language']) || $link['language']->language == $language_url->language)) {
        $class[] = 'active';
      }
      $output .= '<li' . drupal_attributes(array('class' => $class)) . '>';

      if (isset($link['href'])) {
        // Pass in $link as $options, they share the same keys.
        $output .= l($link['title'], $link['href'], $link);
      }
      elseif (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes.
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        $output .= '<span' . $span_attributes . '>' . $link['title'] . '</span>';
      }

      $i++;
      $output .= "</li>\n";
    }

    $output .= '</ul>';
  }

  return $output;
}


function engadinerpost_breadcrumb($vars) {
  $breadcrumb = $vars['breadcrumb'];
$crumbs ="";
  if (!empty($breadcrumb)) {
      $crumbs = '<ul class="breadcrumb">';

      foreach($breadcrumb as $value) {
           $crumbs .= '<li>'.$value.'</li>';
      }
      $crumbs .= '</ul>';
    }
      return $crumbs;
  }
 
?>