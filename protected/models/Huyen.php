<?php

/**
 * This is the model class for table "huyen".
 *
 * The followings are the available columns in table 'huyen':
 * @property integer $id
 * @property integer $tinh_id
 * @property string $ten
 * @property string $created_at
 * @property string $update_at
 *
 * The followings are the available model relations:
 * @property DonVi[] $donVis
 * @property Tinh $tinh
 * @property Xa[] $xas
 */
class Huyen extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Huyen the static model class
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
        return 'huyen';
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
            array('id, tinh_id', 'numerical', 'integerOnly' => true),
            array('ten', 'length', 'max' => 255),
            array('created_at, update_at', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, tinh_id, ten, created_at, update_at', 'safe', 'on' => 'search'),
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
            'don_vi_s' => array(self::HAS_MANY, 'DonVi', 'huyen_id'),
            'tinh' => array(self::BELONGS_TO, 'Tinh', 'tinh_id'),
            'xa_s' => array(self::HAS_MANY, 'Xa', 'huyen_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'tinh_id' => 'Tỉnh',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('tinh_id', $this->tinh_id);
        $criteria->compare('ten', $this->ten, true);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('update_at', $this->update_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}