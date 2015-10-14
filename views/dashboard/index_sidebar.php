<?php if (isset($online_users) && is_array($online_users) && count($online_users)) { ?>
<div class="panel panel-block ">
	<div class="panel-heading" title="<?php echo lang('online users desc') ?>">
	    <i class="icon-user"></i> <strong><?php echo lang('online users') ?></strong>
	    <div class="panel-actions pull-right"></div>
	  </div>
  
  <div class="blockContent">
    
    <ul>
<?php foreach ($online_users as $user) { ?>
<?php if (logged_user()->canSeeUser($user)) { ?>
      <li><a href="<?php echo $user->getCardUrl() ?>"><?php echo clean($user->getDisplayName()) ?></a> <span class="desc">(<?php echo clean($user->getCompanyDisplayName()) ?>)</span></li>
<?php } // if ?>
<?php } // foreach ?>
    </ul>
  </div>
</div>
<?php } // if ?>

<?php if (isset($my_projects) && is_array($my_projects) && count($my_projects)) { ?>
<div class="panel panel-block">
	<div class="panel-heading">
	    <i class="icon-folder-close-alt"></i> <strong><?php echo lang('my projects') ?></strong>
	    <div class="panel-actions pull-right"></div>
	  </div>
  <div class="blockContent">
    <ul>
<?php foreach ($my_projects as $my_project) { ?>
      <li><a href="<?php echo $my_project->getOverviewUrl() ?>"><?php echo clean($my_project->getName()) ?></a></li>
<?php } // foreach ?>
    </ul>
  </div>
</div>
<?php } // if ?>


<?php if (isset($my_files) && is_array($my_files) && count($my_files)) { ?>
<div class="panel panel-block">
	<div class="panel-heading">
	    <i class="icon-file"></i> <strong><?php echo lang('my files') ?></strong>
	    <div class="panel-actions pull-right"></div>
	  </div>
  <div class="blockContent">
    <ul>
<?php foreach ($my_files as $my_file) { ?>
      <li><a href="<?php echo $my_file->getViewUrl() ?>"><?php echo clean($my_file->getFileName()) ?></a></li>
<?php } // foreach ?>
    </ul>
  </div>
</div>
<?php } // if ?>

<div class="panel panel-block">
	<div class="panel-heading">
	    <i class="icon-rss"></i> <strong><?php echo lang('rss feeds') ?></strong>
	    <div class="panel-actions pull-right"></div>
	  </div>
  <div class="blockContent">
    <ul id="listOfRssFeeds">
      <li><a href="<?php echo logged_user()->getRecentActivitiesFeedUrl() ?>"><?php echo lang('recent activities feed') ?></a></li>
    </ul>
  </div>
</div>