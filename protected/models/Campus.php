<?php

/**
 * This is the model class for table "campus".
 *
 * The followings are the available columns in table 'campus':
 * @property string $cid
 * @property string $cname
 *
 * The followings are the available model relations:
 * @property Building[] $buildings
 * @property User[] $users
 */
class Campus extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Campus the static model class
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
		return 'campus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cname', 'required'),
			array('cname', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cid, cname', 'safe', 'on'=>'search'),
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
			'buildings' => array(self::HAS_MANY, 'Building', 'cid'),
			'users' => array(self::HAS_MANY, 'User', 'cid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cid' => 'ID',
			'cname' => '校区',
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

		$criteria->compare('cid',$this->cid,true);
		$criteria->compare('cname',$this->cname,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getCampusList()
        {
            $data = CHtml::listData($this->findAll(), 'cid', 'cname');
            $data['0'] = "请选择校区";
            ksort($data);
            return $data;
        }
		
		public function getCampusCheckBoxList()
        {
            $data = CHtml::listData($this->findAll(), 'cid', 'cname');
            ksort($data);
            return $data;
        }
        
        public function getCampusOptions()
        {
        	$data = $this->getCampusList();
        	unset($data['0']);
        	$data[''] = '全部';
        	ksort($data);
        	return $data;  
        }
}