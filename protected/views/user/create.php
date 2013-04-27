<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
    'Users'=>array('index'),
    'Create',
);

$this->menu=array(
    array('label'=>'List User', 'url'=>array('index')),
    array('label'=>'Manage User', 'url'=>array('admin')),
);
?>
<div id="form-wrap2" class="span5 offset4">
<h1>Create User</h1>
<div>
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div></div>
