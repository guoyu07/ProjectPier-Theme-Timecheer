<?php $owner_company_name = (owner_company()->getName()) ?>
<?php $site_name = config_option('site_name', $owner_company_name) ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title><?php echo get_page_title() ?> | <?php echo clean(owner_company()->getName()) ?></title>
<?php //echo stylesheet_tag('project_website.css') ?> 
<?php //echo stylesheet_tag('colorbox/colorbox.css') ?>
<?php echo meta_tag('content-type', 'text/html; charset=utf-8', true) ?> 
<?php echo link_tag(ROOT_URL.'favicon.ico', 'rel', 'Shortcut Icon', array("type"=>"image/x-icon")) ?>
	<?php echo stylesheet_tag('zui/css/min.css') ?>
	<?php echo stylesheet_tag('zh-cn.default.css') ?>
<?php add_javascript_to_page('pp.js') ?>
<?php add_javascript_to_page('jquery.min.js') ?>
<?php add_javascript_to_page('jquery-ui.min.js') ?>
<?php add_javascript_to_page('jquery.colorbox-min.js') ?>
<?php add_javascript_to_page('jquery.imgareaselect.dev.js') ?>
<?php add_javascript_to_page('jquery.jeditable.mini.js') ?>
<?php add_javascript_to_page('zui/js/min.js'); ?>
<?php add_javascript_to_page('all.js'); ?>
<?php echo render_page_head() ?>
  </head>
  <body>
<?php include('inlinejs.php'); ?>
<?php echo render_system_notices(logged_user()) ?>
<div class="container-fluid">
    <div class="row">
		<?php include('_header.php'); ?>
	</div>
	
	<div id="wrap">
	
      <!-- content wrapper -->
      <div id="outerContentWrapper">
        <div id="innerContentWrapper">
<?php if (!is_null(flash_get('success'))) { ?>
          <div id="success" onclick="this.style.display = 'none'"><?php echo clean(flash_get('success')) ?></div>
<?php } ?>
<?php if (!is_null(flash_get('error'))) { ?>
          <div id="error" onclick="this.style.display = 'none'"><?php echo clean(flash_get('error')) ?></div>
<?php } ?>

          
        </div>
        

      </div>
      <!-- /content wrapper -->
	  
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
	
  </body>
</html>