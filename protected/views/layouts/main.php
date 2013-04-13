<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
    <?php Yii::app()->bootstrap->register(); ?>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>


</head>

<body>
<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'type'=>'inverse',
    'brand'=>'HOMEOPOLY',
    'collapse'=>true,
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/index')),
                array('label'=>'House', 'url'=>array('/house/index'), 'items'=>array(
                    array('label'=>'All House', 'url'=>array('/house/index')),
                    array('label'=>'Post House', 'url'=>array('/house/create')),
                )),

            ),
        ),
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
                array('label'=>'Dashboard', 'url'=>array('/user/setting',
                    'id'=>Yii::app()->user->getId()), 'visible'=>!Yii::app()->user->isGuest,
                    'items'=>array(
                        array('label'=>'Update Profile', 'url'=>array('/user/update', 'id'=>Yii::app()->user->getId())),
                        array('label'=>'Manage My House', 'url'=>array('/user/setting','id'=>Yii::app()->user->getId())),
                    )),
                array('label'=>'Login', 'url'=>array('/site/login'),
                    'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'),
                    'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Sign Up', 'url'=>array('/user/create'),
                    'visible'=>Yii::app()->user->isGuest),
            ),
        ),
    ),
)); ?>

<div class="main" style="min-height: 500px">
    <div class="container">
        <?php echo $content; ?>
    </div>
</div>

<footer class="footer">
    <?php echo CHtml::link('CONTACT US', array('/site/contact')); ?>
    Copyright &copy; by My Company. All Rights Reserved.
</footer><!-- footer -->


</body>
</html>
