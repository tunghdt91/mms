<?php

/**
 * This is the model class for table "don_vi".
 *
 * The followings are the available columns in table 'don_vi':
 * @property integer $id
 * @property string $ma_don_vi
 * @property string $ten
 * @property integer $tinh_id
 * @property integer $huyen_id
 * @property integer $xa_id
 * @property string $dia_chi
 * @property string $dien_thoai_ban
 * @property string $dien_thoai
 * @property string $fax
 * @property string $lanh_dao
 * @property string $email
 * @property string $website
 * @property integer $loai_don_vi
 * @property integer $don_vi_truc_thuoc_id
 * @property integer $tinh_trang
 * @property string $ngay_thanh_lap
 * @property string $created_at
 * @property string $update_at
 *
 * The followings are the available model relations:
 * @property DoanVien[] $doanViens
 * @property DoanVienDiChuyen[] $doanVienDiChuyens
 * @property DoanVienDiChuyen[] $doanVienDiChuyens1
 * @property Tinh $tinh
 * @property Huyen $huyen
 * @property Xa $xa
 * @property DonVi $donViTrucThuoc
 * @property DonVi[] $donVis
 */
class DonVi extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return DonVi the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'don_vi';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tinh_id, huyen_id, xa_id, loai_don_vi, don_vi_truc_thuoc_id, tinh_trang', 'numerical', 'integerOnly' => true),
            array('ma_don_vi, ten, dia_chi, dien_thoai_ban, dien_thoai, fax, lanh_dao, email, website', 'length', 'max' => 255),
            array('ngay_thanh_lap, created_at, update_at', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, ma_don_vi, ten, tinh_id, huyen_id, xa_id, dia_chi, dien_thoai_ban, dien_thoai, fax, lanh_dao, email, website, loai_don_vi, don_vi_truc_thuoc_id, tinh_trang, ngay_thanh_lap, created_at, update_at', 'safe', 'on' => 'search'),
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
            'doanViens' => array(self::HAS_MANY, 'DoanVien', 'don_vi_id'),
            'doanVienDiChuyens' => array(self::HAS_MANY, 'DoanVienDiChuyen', 'don_vi_di_id'),
            'doanVienDiChuyens1' => array(self::HAS_MANY, 'DoanVienDiChuyen', 'don_vi_den_id'),
            'tinh' => array(self::BELONGS_TO, 'Tinh', 'tinh_id'),
            'huyen' => array(self::BELONGS_TO, 'Huyen', 'huyen_id'),
            'xa' => array(self::BELONGS_TO, 'Xa', 'xa_id'),
            'donViTrucThuoc' => array(self::BELONGS_TO, 'DonVi', 'don_vi_truc_thuoc_id'),
            'donVis' => array(self::HAS_MANY, 'DonVi', 'don_vi_truc_thuoc_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'ma_don_vi' => 'Mã Đơn Vị',
            'ten' => 'Tên',
            'tinh_id' => 'Tỉnh',
            'huyen_id' => 'Huyện',
            'xa_id' => 'Xã',
            'dia_chi' => 'Địa Chỉ',
            'dien_thoai_ban' => 'Điện Thoại Bàn',
            'dien_thoai' => 'Điện Thoại',
            'fax' => 'Fax',
            'lanh_dao' => 'Lãnh Đạo',
            'email' => 'Email',
            'website' => 'Website',
            'loai_don_vi' => 'Loại Đơn Vị',
            'don_vi_truc_thuoc_id' => 'Đơn Vị Trực Thuộc',
            'tinh_trang' => 'Tình Trạng',
            'ngay_thanh_lap' => 'Ngày Thành Lập',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
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
        $criteria->compare('ma_don_vi', $this->ma_don_vi, true);
        $criteria->compare('ten', $this->ten, true);
        $criteria->compare('tinh_id', $this->tinh_id);
        $criteria->compare('huyen_id', $this->huyen_id);
        $criteria->compare('xa_id', $this->xa_id);
        $criteria->compare('dia_chi', $this->dia_chi, true);
        $criteria->compare('dien_thoai_ban', $this->dien_thoai_ban, true);
        $criteria->compare('dien_thoai', $this->dien_thoai, true);
        $criteria->compare('fax', $this->fax, true);
        $criteria->compare('lanh_dao', $this->lanh_dao, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('website', $this->website, true);
        $criteria->compare('loai_don_vi', $this->loai_don_vi);
        $criteria->compare('don_vi_truc_thuoc_id', $this->don_vi_truc_thuoc_id);
        $criteria->compare('tinh_trang', $this->tinh_trang);
        $criteria->compare('ngay_thanh_lap', $this->ngay_thanh_lap, true);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('update_at', $this->update_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}