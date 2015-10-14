<?php $owner_company_name = clean(owner_company()->getName()) ?>
<?php $site_name = config_option('site_name', $owner_company_name) ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
<?php if (active_project() instanceof Project) { ?>
    <title><?php echo get_page_title() ?> | <?php echo clean(active_project()->getName()) ?> | <?php echo clean(owner_company()->getName()) ?></title>
<?php } else { ?>
    <title><?php echo get_page_title() ?> | <?php echo clean(owner_company()->getName()) ?></title>
<?php } // if ?>
    
<?php //echo stylesheet_tag('project_website.css') ?> 
<?php echo stylesheet_tag('jquery/jquery-ui-1.8.6.custom.css') ?> 
<?php echo stylesheet_tag('colorbox/colorbox.css') ?> 
<?php echo meta_tag('content-type', 'text/html; charset=utf-8', true) ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" /> 
<?php echo link_tag(ROOT_URL.'favicon.ico', 'rel', 'Shortcut Icon', array("type"=>"image/x-icon")) ?>
	<?php echo stylesheet_tag('zui/css/min.css') ?>
	<?php echo stylesheet_tag('zh-cn.default.css') ?>
<?php echo link_tag(logged_user()->getRecentActivitiesFeedUrl(), 'rel', 'alternate', array("type"=>"application/rss+xml", "title"=>lang('recent activities feed'))) ?>
<?php add_javascript_to_page('pp.js') ?>
<?php add_javascript_to_page('jquery.min.js') ?>
<?php add_javascript_to_page('jquery-ui.min.js') ?>
<?php add_javascript_to_page('jquery.colorbox-min.js') ?>
<?php add_javascript_to_page('jquery.jeditable.mini.js') ?>
<?php add_javascript_to_page('jquery.imgareaselect.dev.js') ?>
<?php add_javascript_to_page('zui/js/min.js'); ?>
<?php add_javascript_to_page('all.js'); ?>
<?php echo render_page_head() ?>
  </head>
  <body>
<?php include('inlinejs.php') ?>

<?php trace(__FILE__,'body begin') ?>
<?php echo render_system_notices(logged_user()) ?>

<div class="container-fluid">
    <div class="row">
		<?php include('_header.php'); ?>
	</div>
	
	<div id="wrap">
		

<?php trace(__FILE__,'body contentWrapper') ?>

      
<div class="outer" id="wrap" style="min-height:600px;">
  	<div class="row">
  		<div class="col-md-8">
              <!-- Content -->
              <?php echo $content_for_layout ?>
              <!-- /Content -->
  		</div>
		
  		<div class="col-md-4">
  			<?php if (isset($content_for_sidebar)) { ?>
  			            <div id="sidebar"><?php echo $content_for_sidebar ?></div>
  			<?php } // if ?>
			
  		</div>
  	</div>
</div>
      
    </div>
	
</div>
	
	<?php include('_footer.php'); ?>
<?php //include dirname(__FILE__) . '/memo.php'?>
<?php trace(__FILE__,'body end') ?>
  </body>
</html>