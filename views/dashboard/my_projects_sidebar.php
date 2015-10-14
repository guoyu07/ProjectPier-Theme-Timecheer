<?php if (isset($active_projects) && is_array($active_projects) && count($active_projects)) { ?>
<div class="panel panel-info panel-block">
	<div class="panel-heading">
	    <i class="icon-folder-open"></i> <strong><?php echo lang('active projects') ?></strong>
	    <div class="panel-actions pull-right"></div>
	  </div>
  <div class="blockContent">
    <ul>
<?php foreach ($active_projects as $project) { ?>
      <li><a href="<?php echo $project->getOverviewUrl() ?>"><?php echo clean($project->getName()) ?></a></li>
<?php } // foreach ?>
    </ul>
  </div>
</div>
<?php } // if ?>

<?php if (isset($finished_projects) && is_array($finished_projects) && count($finished_projects)) { ?>
<div class="panel panel-block">
	<div class="panel-heading">
	    <i class="icon-folder-close"></i> <strong><?php echo lang('finished projects') ?></strong>
	    <div class="panel-actions pull-right"></div>
	  </div>
  <div class="blockContent" title="<?php echo lang('my projects archive desc') ?>">
    <ul class="listWithDetails">
<?php foreach ($finished_projects as $project) { ?>
      <li><a href="<?php echo $project->getOverviewUrl() ?>"><?php echo clean($project->getName()) ?></a>
<?php if (is_null($project->getCompletedBy())) { ?>
<span class="desc">(<?php echo lang('completed on by', format_date($project->getCompletedOn()), lang('deleted user') ) ?>)</span></li>
<?php } else { ?>
<span class="desc">(<?php echo lang('completed on by', format_date($project->getCompletedOn()), $project->getCompletedBy()->getCardUrl(), clean($project->getCompletedBy()->getDisplayName())) ?>)</span></li>
<?php } // if ?>
<?php } // foreach ?>
    </ul>
  </div>
</div>
<?php } // if ?>