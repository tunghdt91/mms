<?php

class DoanvienController extends Controller
{
    public function actions() {
        return array();
    }
    public function loadModel($id) //Find Poll where id = $id
    {
        $model = DoanVien::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    
    public function actionDelete($id) {
        $doanvien = $this->loadModel($id);
        $doanvien->delete();
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }
    
    /*@author Nguyen Van Cuong
     */
    public function actionDeleteMoment($id)
    {
        $doanvien = $this->loadModel($id);
        $doanvien->deleted_at = date('Y-m-d H:i:s', time());
        $doanvien->save();
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }
    /*@author Nguyen Van Cuong
     */
    public function actionRestore($id)
    {
        $doanvien = $this->loadModel($id);
        $doanvien->deleted_at = NULL;
        $doanvien->save();
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }
    public function actionCreate() {
        $doanvien = new DoanVien;
        if(isset($_POST['DoanVien']) && isset($_POST['diachinoisinh']) && isset($_POST['diachinoisong'])) {
            $doanvien->attributes = $_POST['DoanVien'];
            $model_noisinh = new DiaChiDayDu();
            $model_noisinh->dia_chi = $_POST['diachinoisinh'];
            if(isset($_POST['DoanVien']['ho_khau_thuong_tru'])) {
                $model_noisinh->xa_id = $_POST['DoanVien']['ho_khau_thuong_tru'];
            }
            $model_noisinh->save();
            $doanvien->ho_khau_thuong_tru = $model_noisinh->id;
            
            $model_noisong = new DiaChiDayDu();
            $model_noisong->dia_chi = $_POST['diachinoisong'];
            if(isset($_POST['DoanVien']['ho_khau_tam_tru'])) {
                $model_noisong->xa_id = $_POST['DoanVien']['ho_khau_tam_tru'];
            }
            $model_noisong->save();
            $doanvien->ho_khau_tam_tru = $model_noisong->id;
            if ($doanvien->save()){
                Yii::app()->user->setFlash('success', 'Tạo mới thành công !');
                $this->redirect(array('doanvien/index'));
            }
        }
        
        $this->render('create', array(
            'doanvien' => $doanvien,
        )); 
    }
    
    public function actionUpdate($id) {
        $doanvien = $this->loadModel($id);
        if (isset($_POST['DoanVien'])) {
            $doanvien->attributes = $_POST['DoanVien'];
            if($doanvien->save()) {
                Yii::app()->user->setFlash('success', 'Thông tin đoàn viên đã được thay đổi !');
                $this->redirect(array('view', 'id' => $doanvien->id)); 
            } else {
                 Yii::app()->user->setFlash('error', 'Lỗi thay đổi !');
                 $this->redirect(array('view', 'id' => $doanvien->id));  
            }
        }
        $this->render('update', array(
            'doanvien' => $doanvien
        ));
    }
    
    public function actionView($id) {
        $doanvien = $this->loadModel($id);
        $this->render('view', array(
            'doanvien' => $doanvien,
        ));
    }
    
    /*
     * @author Nguyen Van Cuong
     */
    public function actionIndex($delete = null, $msdv = null, $ho_ten_dem = null, $ten = null,
        $bi_danh = null, $ngay_sinh_tu = null, $ngay_sinh_den = null, $do_tuoi_tu = null,
        $do_tuoi_den = null, $ngay_vao_doan_tu = null, $ngay_vao_doan_den = null,
        $gioi_tinh = null, $dan_toc = null, $ly_luan_chinh_tri = null, $tinh = null,
        $huyen = null, $xa = null, $email = null, $phone = null, $don_vi = null) 
    {
        // Load du lieu tu model cho form search
        $dantocs = DanToc::model()->findAll();
        $ly_luan_chinh_tris = LyLuanChinhTri::model()->findAll() ;
        $tinhs = Tinh::model()->findAll();
        $don_vis = DonVi::model()->findAll();
        // Search condition
        $criteria = new CDbCriteria();
        if ($msdv != null) {
            $criteria->addCondition("ma_doan_vien like '%{$msdv}%'");
        }
        if ($ho_ten_dem != null) {
            $criteria->addCondition("ho_ten_dem like '%{$ho_ten_dem}%'");
        }
        if ($ten != null) {
            $criteria->addCondition("ten like '%{$ten}%'");
        }
        if ($bi_danh != null) {
            $criteria->addCondition("bi_danh like '%{$bi_danh}%'");
        }
        if ($ngay_sinh_tu != null) {
            $criteria->addCondition("ngay_sinh>='{$ngay_sinh_tu}'");
        }
        if ($ngay_sinh_den != null) {
           $criteria->addCondition("ngay_sinh<='{$ngay_sinh_den}'");  
        }
        if ($do_tuoi_tu != null) {
            $year = date('Y', time());
            settype($year, 'integer');
            $year -= $do_tuoi_tu;
            $day_start = date("$year-m-d", time());
            $criteria->addCondition("ngay_sinh<='{$day_start}'"); 
        }
        if ($do_tuoi_den != null) {
            $year = date('Y', time());
            settype($year, 'integer');
            $year -= $do_tuoi_den;
            $day_end = date("$year-m-d", time());
            $criteria->addCondition("ngay_sinh>='{$day_end}'"); 
        }
        if ($ngay_vao_doan_tu != null) {
            $criteria->addCondition("ngay_vao_doan>='{$ngay_vao_doan_tu}'"); 
        }
        if ($ngay_vao_doan_den != null) {
            $criteria->addCondition("ngay_vao_doan<='{$ngay_vao_doan_tu}'");
        }
        if ($gioi_tinh != null && $gioi_tinh != 'none') {
            $criteria->addCondition('gioi_tinh='.$gioi_tinh);
        }
        if ($dan_toc != null && $dan_toc != 'none') {
            $criteria->addCondition('dan_toc_id='.$dan_toc);
        }
        if ($ly_luan_chinh_tri != null && $ly_luan_chinh_tri != 'none') {
            $criteria->addCondition('ly_luan_chinh_tri_id='.$ly_luan_chinh_tri);
        }
        if ($xa != null && $xa != 'none') {
            
        }
        if ($email != null) {
            $criteria->addCondition("email like '%{$email}%'");
        }
        if ($phone != null) {
            $criteria->addCondition("dien_thoai like '%{$phone}%'");
        }
        if ($don_vi != null && $don_vi != 'none') {
            $criteria->addCondition('don_vi_id='.$don_vi);
        }
        if ( $delete == null) {
            $title = 'Tìm kiếm nâng cao';
            $criteria->addcondition('deleted_at is null');
        } else {
            $title = ' Danh Sách Đoàn Viên Bị Xoá';
            $criteria->addcondition('deleted_at is not null');
        }
        // result
        $doan_viens = DoanVien::model()->findAll($criteria);
        $this->render('index', array(
            'doan_viens' => $doan_viens,
            'criteria' => $criteria,
            'title' => $title,
            'dantocs' => $dantocs,
            'ly_luan_chinh_tris' => $ly_luan_chinh_tris,
            'tinhs' => $tinhs,
            'don_vis' => $don_vis,
            'msdv' => $msdv,
            'ho_ten_dem' => $ho_ten_dem,
            'ten' => $ten,
            'bi_danh' => $bi_danh,
            'ngay_sinh_tu' => $ngay_sinh_tu,
            'ngay_sinh_den' => $ngay_sinh_den,
            'do_tuoi_tu' => $do_tuoi_tu,
            'do_tuoi_den' => $do_tuoi_den,
            'ngay_vao_doan_tu' => $ngay_vao_doan_tu,
            'ngay_vao_doan_den' => $ngay_vao_doan_den,
            'gioi_tinh' => $gioi_tinh,
            'dan_toc' => $dan_toc,
            'ly_luan_chinh_tri' => $ly_luan_chinh_tri,
            'tinh' => $tinh,
            'huyen' => $huyen,
            'xa' => $xa,
            'email' => $email,
            'phone' => $phone,
            'don_vi' => $don_vi,
        ));
    }
    
    public function actionDataHuyen()
    {
        if (!Yii::app()->request->isAjaxRequest) {
            $this->render('/site/error', array(
                'code' => 403,
                'message' => 'Forbidden',
            ));
            Yii::app()->end();
        }
        
        if (isset($_POST['id_tinh'])) {
            $results = array();
            $criteria = new CDbCriteria();
            $criteria->condition = "tinh_id = {$_POST['id_tinh']}";
            $huyens = Huyen::model()->findAll($criteria);
            foreach ($huyens as $huyen) {
                $results[$huyen->id] = $huyen->ten;
            }
            echo json_encode($results);
        }
    }
    
    public function actionDataXa()
    {
        if (!Yii::app()->request->isAjaxRequest) {
            $this->render('/site/error', array(
                'code' => 403,
                'message' => 'Forbidden',
            ));
            Yii::app()->end();
        }
        
        if (isset($_POST['id_huyen'])) {
            $results = array();
            $criteria = new CDbCriteria();
            $criteria->condition = "huyen_id = {$_POST['id_huyen']}";
            $xas = Xa::model()->findAll($criteria);
            foreach ($xas as $xa) {
                $results[$xa->id] = $xa->ten;
            }
            echo json_encode($results);
        }
    }

}
?>
