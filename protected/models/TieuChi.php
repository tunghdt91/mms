<?php

/**
 * This is the model class for table "tieu_chi".
 *
 * The followings are the available columns in table 'tieu_chi':
 * @property integer $id
 * @property string $ten
 * @property string $mo_ta
 * @property string $created_at
 * @property string $update_at
 *
 * The followings are the available model relations:
 * @property DanhGiaDoanVien[] $danhGiaDoanViens
 */
class TieuChi extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TieuChi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tieu_chi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'numerical', 'integerOnly'=>true),
			array('ten, mo_ta, created_at, update_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ten, mo_ta, created_at, update_at', 'safe', 'on'=>'search'),
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
			'danh_gia_doan_vien_s' => array(self::HAS_MANY, 'DanhGiaDoanVien', 'tieu_chi_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'ten' => 'Tên',
			'mo_ta' => 'Mô Tả',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('ten',$this->ten,true);
		$criteria->compare('mo_ta',$this->mo_ta,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('update_at',$this->update_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}