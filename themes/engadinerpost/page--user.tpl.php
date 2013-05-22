
<?php include("header.php"); ?>
<div id="user-page" class="clearfix <?php print $classes; ?>">

<?php print render($page['help']); ?>
 <?php if ($breadcrumb): ?>
      <div id="breadcrumb"><?php print $breadcrumb; ?></div>
    <?php endif; ?>
<div class="main_content">
<div class="inner_container">
        <a id="main-content"></a>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php if ($tabs): ?><div id="tabs"><?php print render($tabs); ?></div><?php endif; ?>
         <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>
<?php print render($page['content']); ?></div>
</div>

</div>
