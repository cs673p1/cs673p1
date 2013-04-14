<?php

class HouseController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','view'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create'),
                'roles'=>array('authenticated'),
            ),
            array('allow', // allow authenticated users to update/view
                'actions'=>array('update', 'delete'),
                'roles'=>array('authenticated')
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model=new House;
        //save house id and user id to seller table
        $seller = new Sellers;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if(isset($_POST['House']))
        {
            $model->attributes=$_POST['House'];

            if($model->save()){
                $seller->house_id = $model->id;
                $seller->user_id = Yii::app()->user->id;
                if($seller->save())
                    $this->redirect(array('view','id'=>$model->id));
            }
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {

        $model=$this->loadModel($id);

        $seller = $model->seller;
        $params = array('Seller'=>$seller);

        if (!Yii::app()->user->checkAccess('updateHouse', $params) && !Yii::app()->user->checkAccess('admin')){
            throw new CHttpException(403, 'You are not authorized to perform this action');
        }

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if(isset($_POST['House']))
        {
            $model->attributes=$_POST['House'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        if(Yii::app()->request->isPostRequest)
        {
            $model=$this->loadModel($id);
            $seller = $model->seller;
            $params = array('Seller'=>$seller);

            if (!Yii::app()->user->checkAccess('updateHouse', $params) && !Yii::app()->user->checkAccess('admin')){
                throw new CHttpException(403, 'You are not authorized to perform this action');
            }

            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            //if(!isset($_GET['ajax']))
            $this->redirect(array('house/index'));
        }
        else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $houses = House::model()->findAll();

        $this->render('index',array(
            'houses'=>$houses,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new House('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['House']))
            $model->attributes=$_GET['House'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    /**
     * Return the data model based on input argument
     * @param string address_1
     * @param string address_2
     * @param string city
     * @param string state
     * @param string zip code
     *
     */

    public function actionSearch(){
        //TODO add search logical at here
        $model = null;
        return $model;
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model=House::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='house-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
