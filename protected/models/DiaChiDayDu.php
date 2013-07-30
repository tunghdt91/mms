<?php

/**
 * This is the model class for table "dia_chi_day_du".
 *
 * The followings are the available columns in table 'dia_chi_day_du':
 * @property integer $id
 * @property integer $xa_id
 * @property string $dia_chi
 * @property string $created_at
 * @property string $update_at
 *
 * The followings are the available model relations:
 * @property Xa $xa
 * @property DoanVien[] $doanViens
 * @property DoanVien[] $doanViens1
 * @property DoanVien[] $doanViens2
 */
class DiaChiDayDu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DiaChiDayDu the static model class
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
		return 'dia_chi_day_du';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('xa_id', 'numerical', 'integerOnly'=>true),
			array('dia_chi, created_at, update_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, xa_id, dia_chi, created_at, update_at', 'safe', 'on'=>'search'),
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
			'xa' => array(self::BELONGS_TO, 'Xa', 'xa_id'),
			'doan_vien_sinh_ra_s' => array(self::HAS_MANY, 'DoanVien', 'que_quan'),
			'doan_vien_thuong_tru_s' => array(self::HAS_MANY, 'DoanVien', 'ho_khau_thuong_tru'),
			'doan_vien_tam_tru_s' => array(self::HAS_MANY, 'DoanVien', 'ho_khau_tam_tru'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'xa_id' => 'Xa',
			'dia_chi' => 'Dia Chi',
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
		$criteria->compare('xa_id',$this->xa_id);
		$criteria->compare('dia_chi',$this->dia_chi,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('update_at',$this->update_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}