<?php

/**
 * This is the model class for table "tinh".
 *
 * The followings are the available columns in table 'tinh':
 * @property integer $id
 * @property string $ten
 * @property string $created_at
 * @property string $update_at
 *
 * The followings are the available model relations:
 * @property DonVi[] $donVis
 * @property Huyen[] $huyens
 * @property CapCMTND[] $capCMTNDs
 */
class Tinh extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tinh the static model class
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
		return 'tinh';
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
			array('ten', 'length', 'max'=>255),
			array('created_at, update_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ten, created_at, update_at', 'safe', 'on'=>'search'),
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
			'don_vi_s' => array(self::HAS_MANY, 'DonVi', 'tinh_id'),
			'huyen_s' => array(self::HAS_MANY, 'Huyen', 'tinh_id'),
            'cap_CMTND_s' => array(self::HAS_MANY, 'DoanVien', 'noi_cap'),
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
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('update_at',$this->update_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}