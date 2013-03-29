
<?php
$this->breadcrumbs=array(
	'Houses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List House','url'=>array('index')),
	array('label'=>'Create House','url'=>array('create')),
	array('label'=>'Update House','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete House','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage House','url'=>array('admin')),
);
?>

<h1>View House #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'address_1',
		'address_2',
		'city',
		'state',
		'zip_code',
		'description',
		'number_of_floor',
		'garage',
		'garden',
		'backdoor',
		'number_of_bathroom',
		'number_of_room',
	),
)); ?>
 

<h1>View Image #<?php echo $model->id; $image=$model->id;?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'house_id',
		'image_address',
	),
)); ?>



<?php $images = $model->images ?>
 
<?php foreach ($images as $image): ?>
 <img src ="<?php echo $image->image_address; ?>">
 <?php endforeach; ?>
 
 
 
 
 
 
