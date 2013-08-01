<?php

class DoanvienController extends Controller
{
    public function actions() {
        return array();
    }
    public function actionIndex()
    {
        $this->render('index');
    }
    
    public function actionCreate() {
        $doanvien = new DoanVien;
        $this->render('create', array(
            'doanvien' => $doanvien,
        ));
    }
    
    public function actionDeleteView() {
        $criteria = new CDbCriteria();
        $criteria->condition = 'deleted_at is not null';
        $doan_viens = DoanVien::model()->findAll($criteria);
        $this->render('deleteview', array(
            'doan_viens' => $doan_viens,
        ));
    } 

}
?>
