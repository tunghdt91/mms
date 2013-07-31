<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $ten_hien_thi
 * @property string $email
 * @property integer $doan_vien_id
 * @property integer $kich_hoat
 * @property string $ten_can_bo
 * @property integer $admin
 * @property string $created_at
 * @property string $update_at
 *
 * The followings are the available model relations:
 * @property DoanVien $doanVien
 */
class User extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
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
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('doan_vien_id, kich_hoat, admin', 'numerical', 'integerOnly' => true),
            array('username, password, ten_hien_thi, email, ten_can_bo', 'length', 'max' => 255),
            array('created_at, update_at', 'safe'),
            array('username', 'unique', 'message' => 'Tài khoản này đã tồn tại.'),
            array('email', 'unique', 'message' => 'Địa chỉ email này đã tồn tại.'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, username, password, ten_hien_thi, email, doan_vien_id, kich_hoat, ten_can_bo, admin, created_at, update_at', 'safe', 'on' => 'search'),
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'ten_hien_thi' => 'Ten Hien Thi',
            'email' => 'Email',
            'doan_vien_id' => 'Doan Vien',
            'kich_hoat' => 'Kich Hoat',
            'ten_can_bo' => 'Ten Can Bo',
            'admin' => 'Admin',
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
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('ten_hien_thi', $this->ten_hien_thi, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('doan_vien_id', $this->doan_vien_id);
        $criteria->compare('kich_hoat', $this->kich_hoat);
        $criteria->compare('ten_can_bo', $this->ten_can_bo, true);
        $criteria->compare('admin', $this->admin);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('update_at', $this->update_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * @author Nguyễn Đức Hiếu
     * Mã hóa mật khẩu
     */
    public function encryptPassword($password)
    {
        return md5($password);
    }

    /**
     * @author Nguyễn Đức Hiếu
     * So sánh mật khẩu đăng nhập với mậu khẩu trong database
     */
    public function isValiPassword($password)
    {
        return $this->encryptPassword($password) === $this->password;
    }

}