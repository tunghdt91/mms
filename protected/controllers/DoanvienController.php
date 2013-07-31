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

}
?>
