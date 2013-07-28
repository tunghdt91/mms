<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $name_display
 * @property string $email
 * @property integer $profile_union_member_id
 * @property string $activation
 * @property integer $staff_name
 * @property string $admin
 *
 * The followings are the available model relations:
 * @property ProfileUnionMember $profileUnionMember
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
            array('profile_union_member_id, staff_name', 'numerical', 'integerOnly' => true),
            array('username, password, name_display, email', 'length', 'max' => 45),
            array('activation, admin', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, username, password, name_display, email, profile_union_member_id, activation, staff_name, admin', 'safe', 'on' => 'search'),
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
            'profileUnionMember' => array(self::BELONGS_TO, 'ProfileUnionMember', 'profile_union_member_id'),
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
            'name_display' => 'Name Display',
            'email' => 'Email',
            'profile_union_member_id' => 'Profile Union Member',
            'activation' => 'Activation',
            'staff_name' => 'Staff Name',
            'admin' => 'Admin',
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
        $criteria->compare('name_display', $this->name_display, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('profile_union_member_id', $this->profile_union_member_id);
        $criteria->compare('activation', $this->activation, true);
        $criteria->compare('staff_name', $this->staff_name);
        $criteria->compare('admin', $this->admin, true);

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
//        $salt = sha1(md5($this->password));
//        return md5(crypt($password, $salt));
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