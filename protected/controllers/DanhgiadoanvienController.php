<?php

class DanhgiadoanvienController extends Controller
{

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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new DanhGiaDoanVien;
        $doan_vien = DoanVien::model()->findByPk($_GET['doanvienid']);
        $tieu_chi = TieuChi::model()->findByPk($_GET['tieuchiid']);
        $can_bo_danh_gia_id = $this->current_user->doan_vien->id;
		if(isset($_POST['DanhGiaDoanVien']))
		{
			$model->attributes=$_POST['DanhGiaDoanVien'];
			if($model->save())
				$this->redirect(array('doanvien/danh_gia','id' => $doan_vien->id));
		}

		$this->render('create',array(
			'model'=>$model,
            'doan_vien' => $doan_vien,
            'tieu_chi' => $tieu_chi,
            'can_bo_danh_gia_id' => $can_bo_danh_gia_id,
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
        $doan_vien = $model->doan_vien;
        $tieu_chi = $model->tieu_chi;
        $can_bo_danh_gia_id = $model->can_bo_danh_gia->id;
		if(isset($_POST['DanhGiaDoanVien']))
		{
			$model->attributes=$_POST['DanhGiaDoanVien'];
			if($model->save())
				$this->redirect(array('doanvien/danh_gia','id'=>$doan_vien->id));
		}

		$this->render('update',array(
			'model'=>$model,
            'doan_vien' => $doan_vien,
            'tieu_chi' => $tieu_chi,
            'can_bo_danh_gia_id' => $can_bo_danh_gia_id,
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
		$dataProvider=new CActiveDataProvider('DanhGiaDoanVien');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DanhGiaDoanVien('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DanhGiaDoanVien']))
			$model->attributes=$_GET['DanhGiaDoanVien'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return DanhGiaDoanVien the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=DanhGiaDoanVien::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param DanhGiaDoanVien $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='danh-gia-doan-vien-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
