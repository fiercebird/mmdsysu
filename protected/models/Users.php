<?php

/**
 * This is the model class for table "Users".
 *
 * The followings are the available columns in table 'Users':
 * @property string $UserId
 * @property string $UserName
 * @property string $UserPwd
 * @property integer $Campus
 * @property string $Authority
 */
class Users extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Users the static model class
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
        return 'users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Campus', 'numerical', 'integerOnly' => true),
            array('UserName, UserPwd', 'length', 'max' => 50),
            array('Authority', 'length', 'max' => 10),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('UserId, UserName, UserPwd, Campus, Authority', 'safe', 'on' => 'search'),
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'UserId' => 'User',
            'UserName' => 'User Name',
            'UserPwd' => 'User Pwd',
            'Campus' => 'Campus',
            'Authority' => 'Authority',
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

        $criteria->compare('UserId', $this->UserId, true);
        $criteria->compare('UserName', $this->UserName, true);
        $criteria->compare('UserPwd', $this->UserPwd, true);
        $criteria->compare('Campus', $this->Campus);
        $criteria->compare('Authority', $this->Authority, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function encrypt($string)
    {
        return md5($string);
    }
    
    public function IsOne($index) //检测第index位是否为1
    {
        $num = Yii::app()->user->getState('auth');
        $val = 1;
        $val = $val << $index;
        return ($val & $num);
    }
    
}