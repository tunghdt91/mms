<?php

/**
 * This is the model class for table "chuc_vu_doan".
 *
 * The followings are the available columns in table 'chuc_vu_doan':
 * @property integer $id
 * @property string $ten
 * @property integer $loai_don_vi
 * @property string $mo_ta
 * @property integer $quan_ly_don_vi_doan
 * @property integer $quan_ly_doan_vien
 * @property integer $quan_ly_can_bo
 * @property integer $danh_gia_xep_loai_doan_vien
 * @property integer $danh_gia_xep_loai_can_bo
 * @property integer $thay_doi_chuc_vu
 * @property string $created_at
 * @property string $update_at
 *
 * The followings are the available model relations:
 * @property DoanVien[] $doanViens
 */
class ChucVuDoan extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ChucVuDoan the static model class
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
        return 'chuc_vu_doan';
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
            array('id, loai_don_vi, quan_ly_don_vi_doan, quan_ly_doan_vien, quan_ly_can_bo, danh_gia_xep_loai_doan_vien, danh_gia_xep_loai_can_bo, thay_doi_chuc_vu', 'numerical', 'integerOnly' => true),
            array('ten', 'length', 'max' => 255),
            array('mo_ta, created_at, update_at', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, ten, loai_don_vi, mo_ta, quan_ly_don_vi_doan, quan_ly_doan_vien, quan_ly_can_bo, danh_gia_xep_loai_doan_vien, danh_gia_xep_loai_can_bo, thay_doi_chuc_vu, created_at, update_at', 'safe', 'on' => 'search'),
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
            'doan_vien_s' => array(self::HAS_MANY, 'DoanVien', 'chuc_vu_doan_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'ten' => 'Ten',
            'loai_don_vi' => 'Loại Đơn Vị',
            'mo_ta' => 'Mô Tả',
            'quan_ly_don_vi_doan' => 'Quản Lý Đơn Vị Đoàn',
            'quan_ly_doan_vien' => 'Quản Lý Đoàn Viên',
            'quan_ly_can_bo' => 'Quản Lý Cán Bộ',
            'danh_gia_xep_loai_doan_vien' => 'Đánh Giá Xếp Loại Đoàn Viên',
            'danh_gia_xep_loai_can_bo' => 'Đánh Giá Xếp Loại Cán Bộ',
            'thay_doi_chuc_vu' => 'Thay Đổi Chức Vụ',
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
        $criteria->compare('ten', $this->ten, true);
        $criteria->compare('loai_don_vi', $this->loai_don_vi);
        $criteria->compare('mo_ta', $this->mo_ta, true);
        $criteria->compare('quan_ly_don_vi_doan', $this->quan_ly_don_vi_doan);
        $criteria->compare('quan_ly_doan_vien', $this->quan_ly_doan_vien);
        $criteria->compare('quan_ly_can_bo', $this->quan_ly_can_bo);
        $criteria->compare('danh_gia_xep_loai_doan_vien', $this->danh_gia_xep_loai_doan_vien);
        $criteria->compare('danh_gia_xep_loai_can_bo', $this->danh_gia_xep_loai_can_bo);
        $criteria->compare('thay_doi_chuc_vu', $this->thay_doi_chuc_vu);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('update_at', $this->update_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}