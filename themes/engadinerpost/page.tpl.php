<?php if($page['page_top']): ?>
<div id="page-top-wrapper">
<?php print render($page['page_top']); ?>
</div>
<?php endif; ?>

<?php include("header.php"); ?>

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

      <?php if ($page['highlighted']): ?>
        <ul class="highlighted">
          <?php print render($page['highlighted']); ?>
        </ul>
      <?php endif; ?>

<?php if ($tabs): ?><div id="tabs"><?php print render($tabs); ?></div><?php endif; ?>
  
<div class="main_content">
<?php if ($title): ?><h2 class="block-title" id="page-title"><?php print $title; ?></h2><?php endif; ?>
<?php  if($is_front):
		echo '<h2 class="block-title">' . Date("l F d, Y") . ' </h2>';
		endif;
?>

<?php print render($page['content']); ?>
<?php print $feed_icons; ?>

</div>
<?php // if(!isset($node)): ?>
<div class="sidebar">
<?php   if($page['sidebar_first'] || $page['sidebar_second']):?>
<div id="sidebar-top-column">
<?php if($page['sidebar_first']): ?>
<div id="sidebar-top-column-left" class="sidebar-column1">
<?php print render($page['sidebar_first']); ?>
</div>
<?php endif; if($page['sidebar_second']): ?>
<div id="sidebar-top-column-right" class="sidebar-column2">
<?php print render($page['sidebar_second']); ?>
</div>
<?php endif; ?>
<div class="clearfix"></div>
</div>
<?php endif; ?>

<?php if($page['widget']): ?>
<div id="widget-content" class="widget">
<?php print render($page['widget']); ?>
</div>
<?php endif; ?>


<?php if($page['bot_sidebar_first'] || $page['bot_sidebar_second']):?>
<div id="sidebar-bot-column">
<?php if($page['bot_sidebar_first'] ): ?>
<div id="sidebar-bot-column-left" class="sidebar-column1">

<?php print render($page['bot_sidebar_first']); ?>

</div>
<?php endif;?>
 <?php if($page['bot_sidebar_second'] ) :?>
<div id="sidebar-bot-column-right" class="sidebar-column2">

<?php print render($page['bot_sidebar_second']); ?>

</div>
<?php endif; ?>
<div class="clearfix"></div>
</div>
<?php endif; ?>


</div>
<?php // endif; ?>

</div>
<?php if($page['footer']): ?>
<div id="footer" class="inner_container">
<div id="footer-wrapper" class="clearfix"> <?php print render($page['footer']); ?> </div><div>
<?php endif; ?>
</div>
<?php if($page['page_bottom']): ?>
<div id="page-bottom-wrapper">
<?php print render($page['page_bottom']); ?>
</div>
<?php endif; ?>