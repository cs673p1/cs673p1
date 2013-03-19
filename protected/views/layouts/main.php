<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <!-- twitter bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/bootstrap.min.js" ></script>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <style>
    </style>

</head>

<body>
<header class="navbar navbar-inverse navbar-fixed-top">
    <nav class="navbar-inner">
        <div class="container-fluid">
            <ul class="nav">
                <li><?php echo CHtml::link('HOME', array('/site/index')); ?></li>
                <li><?php echo CHtml::link('Contact me', array('/site/contact')); ?></li>
            </ul>
            <div class="pull-right">
                <ul class="nav">
                    <li><?php echo Yii::app()->user->isGuest ? CHtml::link('Sign in', array('/site/login')) :
                            CHtml::link('Dashboard', array('/user/update', 'id'=>Yii::app()->user->getId())); ?></li>
                    <li><?php echo Yii::app()->user->isGuest ? CHtml::link('Sign up', array('/user/create')) : ''; ?></li>
                    <li><?php echo !Yii::app()->user->isGuest ? CHtml::link('Logout', array('/site/logout')) : ''; ?></li>
                </ul>
            </div>

        </div>
    </nav>
</header>

<div class="main" style="min-height: 500px">
    <div class="container">
        <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,)); ?><!-- breadcrumbs -->
        <?php endif?>
        <?php echo $content; ?>
    </div>
</div>
<footer class="footer">
    Copyright &copy; by My Company.<br/>
    All Rights Reserved.<br/>
</footer><!-- footer -->


</body>
</html>
