<?php

/**
 * This is the model class for table "weeklyError".
 *
 * The followings are the available columns in table 'weeklyError':
 * @property string $id
 * @property string $cid
 * @property string $bid
 * @property string $classId
 * @property string $handler
 * @property string $wid
 * @property string $device
 * @property string $state
 *
 * The followings are the available model relations:
 * @property WeeklyChk $w
 * @property Campus $c
 * @property Building $b
 * @property Classroom $class
 */
class WeeklyError extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WeeklyError the static model class
	 */
	public $search_week;
	public $search_register;
	public $search_date;
	public $search_classroom;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'weeklyError';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cid, bid, classId, handler, device, state', 'required'),
			array('cid, bid, classId', 'length', 'max'=>10),
			array('handler, device', 'length', 'max'=>50),
			array('state', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cid, bid, search_week, week, register, chkDate, chkTime, details, search_register, search_date, search_classroom, classId, handler, device, state', 'safe', 'on'=>'search'),
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
			'campus' => array(self::BELONGS_TO, 'Campus', 'cid'),
			'building' => array(self::BELONGS_TO, 'Building', 'bid'),
			'class' => array(self::BELONGS_TO, 'Classroom', 'classId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cid' => '校区',
			'bid' => '教学楼',
			'search_week' => '周次',
			'search_register' => '登记人',
			'search_classroom' => '课室',
			'search_date' => '日期',
			'classId' => '课室',
			'handler' => '处理人',
			'device' => '故障设备',
			'state' => '检查状态',
			'week' => '周次',
			'register' => '登记人',
			'details' => '问题说明',
			'chkDate' => '日期',
			'chkTime' => '时间',
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
		
		$criteria->together = true;
		$criteria->with = array('class', 'building', 'campus');
		$criteria->compare('id',$this->id,true);
		$criteria->compare('class.className', $this->search_classroom, true);
		$criteria->compare('campus.cid',$this->cid,true);
		$criteria->compare('building.bid',$this->bid,true);
		$criteria->compare('register',$this->register,true);
		$criteria->compare('week',$this->week);
		$criteria->compare('chkDate',$this->chkDate,true);
		$criteria->compare('handler',$this->handler,true);
		$criteria->compare('device',$this->device,true);
		$criteria->compare('t.state',$this->state,true);
		
		$d = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
				'pagination'=>array(
						'pageSize'=> 999999,
				),
				'sort' => array('defaultOrder' => 'chkDate DESC'),
		));
		
		$_SESSION['weeklyError-excel']= $d;
		$data = new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>array(
						'pageSize'=>15,
				),
				'sort' => array('defaultOrder' => 'chkDate DESC'),
		));
		return $data; 
	}
}