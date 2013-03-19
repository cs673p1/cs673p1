<?php
$this->breadcrumbs=array(
	'Houses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List House','url'=>array('index')),
	array('label'=>'Create House','url'=>array('create')),
	array('label'=>'View House','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage House','url'=>array('admin')),
);
?>

<h1>Update House <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>