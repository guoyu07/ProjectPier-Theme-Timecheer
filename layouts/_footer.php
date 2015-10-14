        <!--footer -->
        <div id="footer">
			<div id="crumbs">
				<?php 
				$bread_crumbs = bread_crumbs();
				if (is_array($bread_crumbs)) { 
					$count = count($bread_crumbs);
					$i = 0;
					?>
				
				<?php foreach ($bread_crumbs as $bread_crumb) { ?>
					<?php if ($bread_crumb->getUrl()) { ?>
				              <a href="<?php echo $bread_crumb->getUrl() ?>"><?php echo clean($bread_crumb->getTitle()) ?></a>
							  <?php } else {?>
				             <a href="#"><span><?php echo clean($bread_crumb->getTitle()) ?></span></a>
							 <?php } // if {
								 if ($i < $count - 1) {
								 ?>
					<i class="icon-angle-right"></i>
				<?php 
				}
				$i++;
				} // foreach ?>
				           
				<?php } // if ?>
			</div>
			
          <div id="poweredby">
<?php if (is_valid_url($owner_company_homepage = owner_company()->getHomepage())) { ?>
            <?php echo lang('footer copy with homepage', date('Y'), $owner_company_homepage, clean(owner_company()->getName())) ?>
<?php } else { ?>
            <?php echo lang('footer copy without homepage', date('Y'), clean(owner_company()->getName())) ?>
<?php } // if ?>
          <?php echo product_signature() ?><span id="request_duration"><?php printf(' in %.3f seconds', (microtime(true) - $GLOBALS['request_start_time']) ); ?></span></div>
        </div>
        <!--footer -->