<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <!-- twitter bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/js/bootstrap.min.js" ></script>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>

<body>
<header class="navbar navbar-inverse navbar-fixed-top">
    <nav class="navbar-inner">

    </nav>
</header>


<div class="container">
    <div class="row">
        <div class="span12">
            <?php if(isset($this->breadcrumbs)):?>
                <?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,)); ?><!-- breadcrumbs -->
            <?php endif?>
            <?php echo $content; ?>
        </div>
    </div>
</div>

<div id="footer">
    Copyright &copy; by My Company.<br/>
    All Rights Reserved.<br/>
</div><!-- footer -->


</body>
</html>
