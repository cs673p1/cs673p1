<div id="deneme2" class="span5 offset5">
<?php
$this->breadcrumbs=array(
	'Images'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Image','url'=>array('index')),
	array('label'=>'Create Image','url'=>array('create')),
	array('label'=>'View Image','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Image','url'=>array('admin')),
);
?>

<h1>Update Image <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
 
        <img src="<?php echo $model->image_address; ?>" class="img-rounded"height="200" width="300">
   <?php echo CHtml::link('Delete', array('image/delete', 'id'=>$model->id),
    array(
                            'submit'=>array('image/delete', 'id'=>$model->id),
                            'class' => 'delete','confirm'=>'This will remove the Image. Are you sure?'
                        )) ; ?>
</div>
