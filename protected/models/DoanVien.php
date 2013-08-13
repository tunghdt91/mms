<?php

/**
 * This is the model class for table "doan_vien".
 *
 * The followings are the available columns in table 'doan_vien':
 * @property integer $id
 * @property string $ma_doan_vien
 * @property string $ten
 * @property string $ho_ten_dem
 * @property string $bi_danh
 * @property integer $gioi_tinh
 * @property string $ngay_sinh
 * @property integer $que_quan
 * @property integer $ho_khau_thuong_tru
 * @property integer $ho_khau_tam_tru
 * @property string $email
 * @property string $dien_thoai
 * @property integer $dan_toc_id
 * @property integer $ton_giao_id
 * @property string $thanh_phan_gia_dinh_xuat_than
 * @property integer $nghe_nghiep_id
 * @property string $mo_ta_cong_viec
 * @property integer $trinh_do_van_hoa
 * @property string $bang_cap_1
 * @property string $bang_cap_2
 * @property integer $ky_nang_ngoai_ngu_id
 * @property integer $ky_nang_tin_hoc_id
 * @property integer $tinh_trang_suc_khoe
 * @property string $ngay_vao_doan
 * @property integer $danh_hieu_id
 * @property integer $ly_luan_chinh_tri_id
 * @property integer $ban_id
 * @property integer $chuc_vu_doan_id
 * @property integer $trang_thai
 * @property integer $don_vi_id
 * @property string $created_at
 * @property string $update_at
 * @property string $deleted_at
 * @property string $CMTND
 * @property string $ngay_cap
 * @property integer $noi_cap
 *
 * The followings are the available model relations:
 * @property DanhGiaDoanVien[] $danhGiaDoanViens
 * @property DanhGiaDoanVien[] $danhGiaDoanViens1
 * @property DiaChiDayDu $queQuan
 * @property Ban $ban
 * @property ChucVuDoan $chucVuDoan
 * @property DonVi $donVi
 * @property DanhHieu $danhHieu
 * @property DiaChiDayDu $hoKhauThuongTru
 * @property DiaChiDayDu $hoKhauTamTru
 * @property DanToc $danToc
 * @property TonGiao $tonGiao
 * @property NgheNghiep $ngheNghiep
 * @property KyNangNgoaiNgu $kyNangNgoaiNgu
 * @property KyNangTinHoc $kyNangTinHoc
 * @property LyLuanChinhTri $lyLuanChinhTri
 * @property DoanVienDiChuyen[] $doanVienDiChuyens
 * @property User[] $users
 * @property Tinh $tinh
 */
class DoanVien extends ActiveRecord
{

    const GIOI_TINH_NAM = 1;
    const GIOI_TINH_NU = 0;
    
    const MAX_TRINH_DO_VAN_HOA = 12;
    const MIN_TRINH_DO_VAN_HOA = 0;
    
    const TINH_TRANG_SUC_KHOE_TOT = 1;
    const TINH_TRANG_SUC_KHOE_KHONG_TOT = 0;
    
    const TRANG_THAI_DOAN_VIEN = 0;
    const TRANG_THAI_DU_BI = 1;
    const TRANG_THAI_TRUONG_THANH = 2;
    
    public static $GIOI_TINH = array(
        'Nam' => self::GIOI_TINH_NAM,  
        'Nữ' => self::GIOI_TINH_NU,
    );
    
    public static $TINH_TRANG_SUC_KHOE = array(
        'Tốt' => self::TINH_TRANG_SUC_KHOE_TOT,
        'Không tốt' => self::TINH_TRANG_SUC_KHOE_KHONG_TOT,
    );
    
    public static $TRANG_THAI = array(
        'Đoàn viên' => self::TRANG_THAI_DOAN_VIEN,
        'Dự bị' => self::TRANG_THAI_DU_BI,
        'Trưởng thành' => self::TRANG_THAI_TRUONG_THANH,
    );
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return DoanVien the static model class
     */

    public static $TRINH_DO_VAN_HOA = array(
        '1' => 1,
        '2' => 2,
        '3' => 3,
        '4' => 4,
        '5' => 5,
        '6' => 6,
        '7' => 7,
        '8' => 8,
        '9' => 9,
        '10' => 10,
        '11' => 11,
        '12' => 12,
    );
    
    public $image;
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'doan_vien';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('gioi_tinh, que_quan, ho_khau_thuong_tru, ho_khau_tam_tru, dan_toc_id, ton_giao_id, nghe_nghiep_id, trinh_do_van_hoa, ky_nang_ngoai_ngu_id, ky_nang_tin_hoc_id, tinh_trang_suc_khoe, danh_hieu_id, ly_luan_chinh_tri_id, ban_id, chuc_vu_doan_id, trang_thai, don_vi_id, noi_cap', 'numerical', 'integerOnly' => true),
            array('ma_doan_vien, ten, ho_ten_dem, bi_danh, email, dien_thoai, thanh_phan_gia_dinh_xuat_than, bang_cap_1, bang_cap_2, CMTND', 'length', 'max' => 255),
            array('ngay_sinh, mo_ta_cong_viec, ngay_vao_doan, created_at, update_at', 'safe'),
            array('ten', 'required', 'message' => 'Tên không được bỏ trống.'),
            array('ho_ten_dem', 'required', 'message' => 'Họ tên đệm không được bỏ trống.'),
            array('don_vi_id', 'required', 'message' => 'Đơn vị trực thuộc không được bỏ trống.'),
            array('email', 'email', 'message' => 'Email không dúng định dạng.'),
            array('ngay_sinh', 'required', 'message' => 'Ngày sinh không được bỏ trống.'),
            array('ho_khau_thuong_tru', 'required', 'message' => 'Cần phải nhập hộ khẩu thường trú .'),
            array('ho_khau_tam_tru', 'required', 'message' => 'Cần phải nhập hộ khẩu tạm trú.'),
            array('ma_doan_vien, email', 'unique'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, ma_doan_vien, ten, ho_ten_dem, bi_danh, gioi_tinh, ngay_sinh, que_quan, ho_khau_thuong_tru, ho_khau_tam_tru, email, dien_thoai, dan_toc_id, ton_giao_id, thanh_phan_gia_dinh_xuat_than, nghe_nghiep_id, mo_ta_cong_viec, trinh_do_van_hoa, bang_cap_1, bang_cap_2, ky_nang_ngoai_ngu_id, ky_nang_tin_hoc_id, tinh_trang_suc_khoe, ngay_vao_doan, CMTND, ngay_cap, noi_cap, danh_hieu_id, ly_luan_chinh_tri_id, ban_id, chuc_vu_doan_id, trang_thai, don_vi_id, created_at, update_at, deleted_at', 'safe', 'on' => 'search'),
            array('image', 'file', 'types' => 'jpg, gif, png', 'allowEmpty' => true),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'danh_gia_doan_vien_s' => array(self::HAS_MANY, 'DanhGiaDoanVien', 'doan_vien_id'),
            'da_danh_gia_doan_vien_s' => array(self::HAS_MANY, 'DanhGiaDoanVien', 'can_bo_danh_gia_id'),
            'que_quan' => array(self::BELONGS_TO, 'DiaChiDayDu', 'que_quan'),
            'ban' => array(self::BELONGS_TO, 'Ban', 'ban_id'),
            'chuc_vu_doan' => array(self::BELONGS_TO, 'ChucVuDoan', 'chuc_vu_doan_id'),
            'don_vi' => array(self::BELONGS_TO, 'DonVi', 'don_vi_id'),
            'danh_hieu' => array(self::BELONGS_TO, 'DanhHieu', 'danh_hieu_id'),
            'ho_khau_thuong_tru' => array(self::BELONGS_TO, 'DiaChiDayDu', 'ho_khau_thuong_tru'),
            'ho_khau_tam_tru' => array(self::BELONGS_TO, 'DiaChiDayDu', 'ho_khau_tam_tru'),
            'dan_toc' => array(self::BELONGS_TO, 'DanToc', 'dan_toc_id'),
            'ton_giao' => array(self::BELONGS_TO, 'TonGiao', 'ton_giao_id'),
            'nghe_nghiep' => array(self::BELONGS_TO, 'NgheNghiep', 'nghe_nghiep_id'),
            'ky_nang_ngoai_ngu' => array(self::BELONGS_TO, 'KyNangNgoaiNgu', 'ky_nang_ngoai_ngu_id'),
            'ky_nang_tin_hoc' => array(self::BELONGS_TO, 'KyNangTinHoc', 'ky_nang_tin_hoc_id'),
            'ly_luan_chinh_tri' => array(self::BELONGS_TO, 'LyLuanChinhTri', 'ly_luan_chinh_tri_id'),
            'doan_vien_di_chuyen_s' => array(self::HAS_MANY, 'DoanVienDiChuyen', 'doan_vien_id'),
            'user' => array(self::HAS_ONE, 'User', 'doan_vien_id'),
            'noi_cap_CMTND' => array(self::BELONGS_TO, 'Tinh', 'noi_cap'),
        );
    }
    
    /*
     * @author QuanNT
     */
    public function behaviors()
    {
        return array(
            'ImageBehavior' => array(
                'class' => 'application.components.ImageBehavior',
                'attr' => 'ma_doan_vien',
            ),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'ma_doan_vien' => 'Mã Đoàn Viên',
            'ten' => 'Tên',
            'ho_ten_dem' => 'Họ Tên Đệm',
            'bi_danh' => 'Bí Danh',
            'gioi_tinh' => 'Giới Tính',
            'ngay_sinh' => 'Ngày Sinh',
            'que_quan' => 'Quê Quán',
            'ho_khau_thuong_tru' => 'Hộ Khẩu Thường Trú',
            'ho_khau_tam_tru' => 'Hộ Khẩu Tạm Trú',
            'email' => 'Email',
            'dien_thoai' => 'Điện Thoại',
            'dan_toc_id' => 'Dân Tộc',
            'ton_giao_id' => 'Tôn Giáo',
            'thanh_phan_gia_dinh_xuat_than' => 'Thành Phần Gia Đình Xuất Thân',
            'nghe_nghiep_id' => 'Nghề Nghiệp',
            'mo_ta_cong_viec' => 'Mô Tả Công Việc',
            'trinh_do_van_hoa' => 'Trình Độ Văn Hóa',
            'bang_cap_1' => 'Bằng Cấp 1',
            'bang_cap_2' => 'Bằng Cấp 2',
            'ky_nang_ngoai_ngu_id' => 'Kỹ Năng Ngoại Ngữ',
            'ky_nang_tin_hoc_id' => 'Kỹ Năng Tin Học',
            'tinh_trang_suc_khoe' => 'Tình Trạng Sức Khỏe',
            'ngay_vao_doan' => 'Ngày Vào Đoàn',
            'CMTND' => 'CMTND',
            'ngay_cap' => 'Ngày cấp',
            'noi_cap' => 'Nơi cấp',
            'danh_hieu_id' => 'Danh Hiệu',
            'ly_luan_chinh_tri_id' => 'Lý Luận Chính Trị',
            'ban_id' => 'Ban',
            'chuc_vu_doan_id' => 'Chức Vụ Đoàn',
            'trang_thai' => 'Trạng Thái',
            'don_vi_id' => 'Đơn Vị',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
            'deleted_at' => 'Deleted At',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('ma_doan_vien', $this->ma_doan_vien, true);
        $criteria->compare('ten', $this->ten, true);
        $criteria->compare('ho_ten_dem', $this->ho_ten_dem, true);
        $criteria->compare('bi_danh', $this->bi_danh, true);
        $criteria->compare('gioi_tinh', $this->gioi_tinh);
        $criteria->compare('ngay_sinh', $this->ngay_sinh, true);
        $criteria->compare('que_quan', $this->que_quan);
        $criteria->compare('ho_khau_thuong_tru', $this->ho_khau_thuong_tru);
        $criteria->compare('ho_khau_tam_tru', $this->ho_khau_tam_tru);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('dien_thoai', $this->dien_thoai, true);
        $criteria->compare('dan_toc_id', $this->dan_toc_id);
        $criteria->compare('ton_giao_id', $this->ton_giao_id);
        $criteria->compare('thanh_phan_gia_dinh_xuat_than', $this->thanh_phan_gia_dinh_xuat_than, true);
        $criteria->compare('nghe_nghiep_id', $this->nghe_nghiep_id);
        $criteria->compare('mo_ta_cong_viec', $this->mo_ta_cong_viec, true);
        $criteria->compare('trinh_do_van_hoa', $this->trinh_do_van_hoa);
        $criteria->compare('bang_cap_1', $this->bang_cap_1, true);
        $criteria->compare('bang_cap_2', $this->bang_cap_2, true);
        $criteria->compare('ky_nang_ngoai_ngu_id', $this->ky_nang_ngoai_ngu_id);
        $criteria->compare('ky_nang_tin_hoc_id', $this->ky_nang_tin_hoc_id);
        $criteria->compare('tinh_trang_suc_khoe', $this->tinh_trang_suc_khoe);
        $criteria->compare('ngay_vao_doan', $this->ngay_vao_doan, true);
        $criteria->compare('CMTND', $this->CMTND, true);
        $criteria->compare('ngay_cap', $this->ngay_cap, true);
        $criteria->compare('noi_cap', $this->noi_cap);
        $criteria->compare('danh_hieu_id', $this->danh_hieu_id);
        $criteria->compare('ly_luan_chinh_tri_id', $this->ly_luan_chinh_tri_id);
        $criteria->compare('ban_id', $this->ban_id);
        $criteria->compare('chuc_vu_doan_id', $this->chuc_vu_doan_id);
        $criteria->compare('trang_thai', $this->trang_thai);
        $criteria->compare('don_vi_id', $this->don_vi_id);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('update_at', $this->update_at, true);
        $criteria->compare('deleted_at', $this->deleted_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}