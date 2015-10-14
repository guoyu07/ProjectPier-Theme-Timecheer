<div class="panel panel-info">
	<div class="panel-heading">
	    <i class="icon-calendar"></i> <strong><?php echo lang('icalendar') ?></strong>
	    <div class="panel-actions pull-right"></div>
	  </div>
  <div class="blockContent">
    <a href="<?php echo logged_user()->getICalendarUrl() ?>" class="iCalSubscribe"><?php echo lang('icalendar subscribe') ?></a>
    <p><?php echo lang('icalendar subscribe desc') ?></p>
    <p><?php echo lang('icalendar password change notice') ?></p>
  </div>
</div>

<div class="panel panel-info">
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