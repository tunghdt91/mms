<?php

/**
 * This is the model class for table "danh_gia_doan_vien".
 *
 * The followings are the available columns in table 'danh_gia_doan_vien':
 * @property integer $id
 * @property integer $doan_vien_id
 * @property integer $tieu_chi_id
 * @property integer $diem
 * @property integer $xep_loai
 * @property string $danh_gia_cua_doan_vien
 * @property string $danh_gia_cua_chi_doan
 * @property string $ghi_chu
 * @property integer $can_bo_danh_gia_id
 * @property string $created_at
 * @property string $update_at
 *
 * The followings are the available model relations:
 * @property DoanVien $doanVien
 * @property TieuChi $tieuChi
 * @property DoanVien $canBoDanhGia
 */
class DanhGiaDoanVien extends ActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return DanhGiaDoanVien the static model class
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
        return 'danh_gia_doan_vien';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id', 'required'),
            array('id, doan_vien_id, tieu_chi_id, diem, xep_loai, can_bo_danh_gia_id', 'numerical', 'integerOnly' => true),
            array('danh_gia_cua_doan_vien, danh_gia_cua_chi_doan, ghi_chu, created_at, update_at', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, doan_vien_id, tieu_chi_id, diem, xep_loai, danh_gia_cua_doan_vien, danh_gia_cua_chi_doan, ghi_chu, can_bo_danh_gia_id, created_at, update_at', 'safe', 'on' => 'search'),
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
            'doan_vien' => array(self::BELONGS_TO, 'DoanVien', 'doan_vien_id'),
            'tieu_chi' => array(self::BELONGS_TO, 'TieuChi', 'tieu_chi_id'),
            'can_bo_danh_gia' => array(self::BELONGS_TO, 'DoanVien', 'can_bo_danh_gia_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'doan_vien_id' => 'Đoàn Viên',
            'tieu_chi_id' => 'Tiêu Chí',
            'diem' => 'Điểm',
            'xep_loai' => 'Xếp Loại',
            'danh_gia_cua_doan_vien' => 'Đánh Giá Của Đoàn Viên',
            'danh_gia_cua_chi_doan' => 'Đánh Giá Của Chi Đoàn',
            'ghi_chu' => 'Ghi Chú',
            'can_bo_danh_gia_id' => 'Cán Bộ Đánh Giá',
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
        $criteria->compare('doan_vien_id', $this->doan_vien_id);
        $criteria->compare('tieu_chi_id', $this->tieu_chi_id);
        $criteria->compare('diem', $this->diem);
        $criteria->compare('xep_loai', $this->xep_loai);
        $criteria->compare('danh_gia_cua_doan_vien', $this->danh_gia_cua_doan_vien, true);
        $criteria->compare('danh_gia_cua_chi_doan', $this->danh_gia_cua_chi_doan, true);
        $criteria->compare('ghi_chu', $this->ghi_chu, true);
        $criteria->compare('can_bo_danh_gia_id', $this->can_bo_danh_gia_id);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('update_at', $this->update_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}