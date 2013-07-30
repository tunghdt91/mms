<?php

/**
 * This is the model class for table "doan_vien_di_chuyen".
 *
 * The followings are the available columns in table 'doan_vien_di_chuyen':
 * @property integer $id
 * @property integer $doan_vien_id
 * @property integer $don_vi_di_id
 * @property integer $don_vi_den_id
 * @property string $nguyen_nhan
 * @property string $ngay_di_chuyen
 * @property string $ghi_chu
 * @property string $created_at
 * @property string $update_at
 *
 * The followings are the available model relations:
 * @property DoanVien $doanVien
 * @property DonVi $donViDi
 * @property DonVi $donViDen
 */
class DoanVienDiChuyen extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return DoanVienDiChuyen the static model class
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
        return 'doan_vien_di_chuyen';
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
            array('id, doan_vien_id, don_vi_di_id, don_vi_den_id', 'numerical', 'integerOnly' => true),
            array('nguyen_nhan, ngay_di_chuyen, ghi_chu, created_at, update_at', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, doan_vien_id, don_vi_di_id, don_vi_den_id, nguyen_nhan, ngay_di_chuyen, ghi_chu, created_at, update_at', 'safe', 'on' => 'search'),
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
            'don_vi_di' => array(self::BELONGS_TO, 'DonVi', 'don_vi_di_id'),
            'don_vi_den' => array(self::BELONGS_TO, 'DonVi', 'don_vi_den_id'),
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
            'don_vi_di_id' => 'Đơn Vị Đi',
            'don_vi_den_id' => 'Đơn Vị Đến',
            'nguyen_nhan' => 'Nguyên Nhân',
            'ngay_di_chuyen' => 'Ngày Di Chuyển',
            'ghi_chu' => 'Ghi Chú',
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
        $criteria->compare('don_vi_di_id', $this->don_vi_di_id);
        $criteria->compare('don_vi_den_id', $this->don_vi_den_id);
        $criteria->compare('nguyen_nhan', $this->nguyen_nhan, true);
        $criteria->compare('ngay_di_chuyen', $this->ngay_di_chuyen, true);
        $criteria->compare('ghi_chu', $this->ghi_chu, true);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('update_at', $this->update_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}