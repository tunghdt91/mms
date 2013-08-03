<?php

class DoanvienController extends Controller
{
    public function actions() {
        return array();
    }
    
    public function actionCreate() {
        $doanvien = new DoanVien;
        $this->render('create', array(
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
        $huyens = Huyen::model()->findAll();
        $xas = Xa::model()->findAll();
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
            
        }
        if ($ngay_sinh_den != null) {
            
        }
        if ($do_tuoi_tu != null) {
            
        }
        if ($do_tuoi_den != null) {
            
        }
        if ($ngay_vao_doan_tu != null) {
            
        }
        if ($ngay_vao_doan_den != null) {
            
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
            'title' => $title,
            'dantocs' => $dantocs,
            'ly_luan_chinh_tris' => $ly_luan_chinh_tris,
            'tinhs' => $tinhs,
            'huyens' => $huyens,
            'xas' => $xas,
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

}
?>
