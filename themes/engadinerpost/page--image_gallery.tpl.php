<?php if($page['page_top']): ?>
<div id="page-top-wrapper">
<?php print render($page['page_top']); ?>
</div>
<?php endif; ?>

<div id="header-wrapper" class="clearfix">
<div id="header">
<div id="logo" class="clearfix">
    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" >
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
    <?php endif; ?>
			</div>

<?php if($page['header']): ?>
<div id="header-block" class="inner_container"> <?php print render($page['header']); ?> </div>
<?php endif; ?>
</div>

<div id="social-menu-wrapper">
<?php engadinerpost_social_menu(); ?>
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

<div id="content_all" class="clearfix <?php print $classes; ?>">
 <?php if ($breadcrumb): ?>
      <div id="breadcrumb"><?php print $breadcrumb; ?></div>
    <?php endif; ?>
    
        <a id="main-content"></a>
        <?php print render($title_prefix); ?>
        
        <?php print render($title_suffix); ?>
        

 <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>

<?php if ($tabs): ?><div id="tabs"><?php print render($tabs); ?></div><?php endif; ?>
  

<div id="comment-page" class="clearfix <?php print $classes; ?>">
<div class="main_content">
<div class="inner_container"><?php print render($page['content']); ?></div>
</div>

</div>