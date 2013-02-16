<?php
$this->breadcrumbs=array(
	'Message'=>array('message/index'),
	'HelloWorld',
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<h3><?php date_default_timezone_set("America/New_York"); echo $time ?></h3>