<?php if($page['page_top']): ?>
<div id="page-top-wrapper">
<?php print render($page['page-top']); ?>
</div>
<?php endif; ?>

<?php include("header.php"); ?>

<div id="taxonomy-page" class="clearfix <?php print $classes; ?>">
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
  
<div  class="main_content">
<div class="inner_container">

<?php if ($title): ?><h2 class="block-title" id="page-title"><?php print $title; ?></h2><?php endif; ?>
<?php  if($is_front):
		echo '<h2 class="block-title">' . Date("l F d, Y") . ' </h2>';
		endif;
?>

<?php print render($page['content']); ?></div>
</div>
</div>
<?php if($page['footer']): ?>
<div id="footer" class="inner_container">
<div id="footer-wrapper" class="clearfix"> <?php print render($page['footer']); ?> </div><div>
<?php endif; ?>
</div>
