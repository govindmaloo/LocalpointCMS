<div id="header-wrapper" class="clearfix">
<div id="header">
<div id="logo" class="clearfix">
    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" >
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
    <?php endif; ?>
			</div>
<div class="social_menu">
<?php if($page['social_menu']): 
		print render($page['social_menu']);
 endif ?>
</div>
<div id="menu-with-search" class="clearfix">
<?php if($page['main_menu_links']): ?>
<div id="main_menu_wrapper" >
<?php print render($page['main_menu_links']);?>

</div>
<?php endif; ?>

<?php if($page['search_box']): ?>
<div class="search-wrapper"><?php print render($page['search_box']); ?></div>
<?php endif; ?>
</div>

<?php if($page['header']): ?>
<div id="header-block" class="inner_container"> <?php print render($page['header']); ?> </div>
<?php endif; ?>
</div>




<?php 
//global $user;
// Grab the user roles
//$roles = $user->roles;

//if ($messages && (in_array('administrator', array_values($user->roles)))): ?>
   <div id="messages"><div class="section clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
  <?php //endif;  ?>
  
  

</div>