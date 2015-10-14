		<header id="header">
			<div id="topbar">
				<div class="pull-right" id="topnav">
					<?php $_userbox_user = logged_user(); ?>
					
					<div class="dropdown" id="userMenu">
						<a href="javascript:;" data-toggle="dropdown">
							<i class="icon-user"></i> <?php echo clean($_userbox_user->getDisplayName());?><span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<?php  if ($_userbox_user->canUpdateProfile($_userbox_user)) { ?>
							        <li><a href="<?php echo logged_user()->getEditProfileUrl() ?>"><?php echo lang('update profile') ?></a></li>
							        <li><a href="<?php echo logged_user()->getEditPasswordUrl() ?>"><?php echo lang('change password') ?></a></li>
							<?php  } // if ?>
							<?php  if ($_userbox_user->canUpdatePermissions($_userbox_user)) { ?>
							        <li><a href="<?php echo logged_user()->getUpdatePermissionsUrl() ?>"><?php echo lang('update permissions') ?></a></li>
							<?php  } // if ?>
							<?php
							  // PLUGIN HOOK
							  plugin_manager()->do_action('my_account_dropdown');
							  // PLUGIN HOOK
							?>
							<li class="divider"></li>
							<li class="dropdown-submenu left">
								<a href="javascript:;"><?php echo lang('select language') ?></a>
								<ul class="dropdown-menu">
									<?php
									$base_language = config_option('installation_base_language', 'en_us');
									$languages = array( $base_language => $base_language );
									include(ROOT . '/language/locales.php');
									if ($handle = opendir(ROOT . '/language')) {
									  while (false !== ($file = readdir($handle))) {
									    if ($file != "." && $file != "..") {
									      if (array_key_exists( $file, $locales)) {
									        $languages[$file] = $locales[$file];
									      }
									    }
									  }
									  closedir($handle);
									}
									foreach( $languages as $locale => $desc ) {
									  echo '<li class="lang-option"><a href="' . get_url('dashboard', 'index', array('language' => $locale) ) . '" >' . $desc . '</a></li>';
									}
									?>
								</ul>
							</li>
						</ul>
						
					</div>
					
					
					<?php if($_userbox_user->isAdministrator()) { ?>
						<div class="dropdown" id="adminMenu">
							<a href="javascript:;" data-toggle="dropdown" href="<?php echo get_url('administration') ?>"><?php echo lang('administration') ?><span class="caret"></span></a>
					      <ul class="dropdown-menu">
					        <li class="header"><a href="<?php echo get_url('administration', 'company') ?>"><?php echo lang('company') ?></a></li>
					        <li><a href="<?php echo get_url('company', 'edit') ?>"><?php echo lang('edit company') ?></a></li>
					        <li><a href="<?php echo owner_company()->getAddContactUrl() ?>"><?php echo lang('add contact') ?></a></li>
					        <li class="header"><a href="<?php echo get_url('administration', 'clients') ?>"><?php echo lang('clients') ?></a></li>
					        <li><a href="<?php echo get_url('company', 'add_client') ?>"><?php echo lang('add client') ?></a></li>
					        <li class="header"><a href="<?php echo get_url('administration', 'projects') ?>"><?php echo lang('projects') ?></a></li>
					        <li class="header"><a href="<?php echo get_url('administration', 'configuration') ?>"><?php echo lang('configuration') ?></a></li>
					        <li class="header"><a href="<?php echo get_url('administration', 'plugins') ?>"><?php echo lang('plugins') ?></a></li>
					        <li class="header"><a href="<?php echo get_url('administration', 'tools') ?>"><?php echo lang('administration tools') ?></a></li>
					        <li><a href="<?php echo get_url('administration', 'tool_mass_mailer') ?>"><?php echo lang('administration tool name mass_mailer' ) ?></a></li>
					        <li class="header"><a href="<?php echo get_url('administration', 'upgrade') ?>"><?php echo lang('upgrade') ?></a></li>
					<?php
					 // PLUGIN HOOK
					  plugin_manager()->do_action('administration_dropdown');
					  // PLUGIN HOOK
					?>
						</ul>
					</div>
					<?php } // if ?>
					
					
					<a id="logout" class="js-confirm" href="<?php echo get_url('access', 'logout') ?>" title="<?php echo lang('confirm logout') ?>"><?php echo lang('logout') ?></a>
				</div>
				<h5 id="companyname"><a href="<?php echo get_url('dashboard', 'index') ?>"><?php echo $site_name ?></a>
				 <?php if (active_project()) { ?>
  					<a id="currentItem" href="<?php echo active_project()->getOverviewUrl() ?>"><?php echo clean(active_project()->getName()) ?> <span class="icon-caret-down"></span></a>
					<div id="dropMenu"><i class="icon icon-spin icon-spinner"></i></div>
  				<?php } ?>
				</h5>
			</div>
			
			<nav id="mainmenu">
				<?php if (is_array(tabbed_navigation_items())) { ?>
				          <ul class="nav">
				<?php foreach (tabbed_navigation_items() as $tabbed_navigation_item) { ?>
				            <li id="tabbed_navigation_item_<?php echo $tabbed_navigation_item->getID() ?>" <?php if ($tabbed_navigation_item->getSelected()) { ?> class="active" <?php } ?>><a href="<?php echo $tabbed_navigation_item->getUrl() ?>"><?php if ($tabbed_navigation_item->getID() == 'overview') { ?><i class="icon-home"></i><?php } ?> <?php echo clean($tabbed_navigation_item->getTitle()) ?></a></li>
				<?php } // foreach ?>
				          </ul>
				<?php } // if ?>
				<?php if (active_project()) { ?>
					<?php trace(__FILE__,'body searchBox') ?>
					<?php if (use_permitted(logged_user(), active_project(), 'search')) { ?>
					          <div id="searchbox">
					            <form action="<?php echo active_project()->getSearchUrl() ?>" method="get">
					              <div>
					<?php
					  $search_field_default_value = lang('search') . '...';
					  $search_field_attrs = array(
					    'onfocus' => 'if (value == \'' . $search_field_default_value . '\') value = \'\'',
					    'onblur' => 'if (value == \'\') value = \'' . $search_field_default_value . '\'');
					?>
					                <?php echo input_field('search_for', array_var($_GET, 'search_for', $search_field_default_value), $search_field_attrs) ?><button type="submit"><?php echo lang('search button caption') ?></button>
					                <input type="hidden" name="c" value="project" />
					                <input type="hidden" name="a" value="search" />
					                <input type="hidden" name="active_project" value="<?php echo active_project()->getId() ?>" />
					              </div>
					            </form>
					          </div>
					<?php } ?>
					
				<?php } ?>
			</nav>
			
			<nav id="modulemenu">
				<ul class="nav"><li><span id="pageTitle"><?php echo get_page_title() ?></span></li><?php include('_pageoptions.php'); ?></ul>
			</nav>
			
			
		</header>