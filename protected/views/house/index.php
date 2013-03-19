<?php
$this->breadcrumbs=array(
	'Houses',
);

$this->menu=array(
	array('label'=>'Create House','url'=>array('create')),
	array('label'=>'Manage House','url'=>array('admin')),
);
?>

<h1>Houses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
