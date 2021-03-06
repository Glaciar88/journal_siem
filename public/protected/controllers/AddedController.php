<?php

class AddedController extends Controller
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
			//array('allow',  // allow all users to perform 'index' and 'view' actions
			//	'actions'=>array(),
			//	'users'=>array('*'),
		//	),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','index','view','copy'),
				'roles'=>array('operator'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view'),
				'roles'=>array('viewer'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update','index','view','copy'),
				'roles'=>array('administrator'),
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
	public function actionCreate($id = NULL)
	{
		
		$model=new Added;
		if (isset($id)) {
            $model->attributes = $this->loadModel($id)->attributes;
            $model->id = NULL;
			$model->job_print = 0;
			$model->date_print = NULL;
			$model->user_id_print = NULL;
			$model->job_instal = 0;
			$model->date_instal = NULL;
			$model->user_id_instal = NULL;
			$model->job_aoi = 0;
			$model->date_aoi = NULL;
			$model->user_id_aoi = NULL;
        }
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Added']))
		{
			$model->attributes=$_POST['Added'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Added']))
		{
			$model->attributes=$_POST['Added'];
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$block_id = Yii::app()->request->getQuery('block_id');
		if ($block_id) $condition = 'block_id='.intval($block_id);
		else $condition = '';
		$dataProvider=new CActiveDataProvider('Added', array(
			//Настройки для сортировки
			'sort'=>array(
			'attributes'=>array(
				'date_add'=>array(
					'asc'=>'date_add ASC',
					'desc'=>'date_add DESC',
					'default'=>'desc',
				)
			),
			'defaultOrder'=>array('date_add'=>CSort::SORT_DESC)),
			//Критерий для запроса.
			'criteria'=>array('condition'=> $condition),
			//Настройки для постраничной навигации
			'pagination'=>array(
				//Количество записей на страницу
				'pageSize'=>10,
				'pageVar'=>'page',
            ),
		));
			$this->render('index',array(
				'dataProvider'=>$dataProvider,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Added('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Added']))
			$model->attributes=$_GET['Added'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Added the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Added::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'Запрашиваемая страница не существует.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Added $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='added-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
