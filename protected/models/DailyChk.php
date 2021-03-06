<?php

/**
 * This is the model class for table "dailyChk".
 *
 * The followings are the available columns in table 'dailyChk':
 * @property string $did
 * @property string $cid
 * @property string $bid
 * @property string $classId
 * @property string $register
 * @property integer $week
 * @property string $chkTime
 * @property string $chkDate
 * @property string $state
 * @property string $details
 * @property string $discRom
 * @property string $usb
 * @property string $patch
 * @property string $voice
 * @property string $net
 * @property string $virus
 * @property string $noteBook
 * @property string $mid
 * @property string $maiHasLine
 * @property string $maiNoLine
 * @property string $proScreen
 * @property string $projector
 * @property string $amplifier
 * @property string $stage
 *
 * The followings are the available model relations:
 * @property Classroom $class
 * @property DailyError[] $dailyErrors
 */
class DailyChk extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DailyChk the static model class
	 */
	
	
	public $class_search;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dailyChk';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('classId, week, register, bid', 'required'),
			array('week', 'numerical', 'integerOnly'=>true),
			array('details', 'length', 'max'=>100),
			array('cid, bid, classId, register, week, chkTime, chkDate, state, details, discRom, usb, patch, voice, net, virus, noteBook, mid, maiHasLine, maiNoLine, proScreen, projector, amplifier, stage', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cid, bid, class_search, did, classId, register, week, chkTime, chkDate, state, details, discRom, usb, patch, voice, net, virus, noteBook, mid, maiHasLine, maiNoLine, proScreen, projector, amplifier, stage', 'safe', 'on'=>'search'),
		);
	}
	
	protected function beforeValidate() {
		if ($this->isNewRecord) {
			// set the create date, last updated date
			// and the user doing the creating
			$this->chkTime  = new CDbExpression('NOW()');
			$this->chkDate = new CDbExpression('CURDATE()');
		}
		return parent::beforeValidate();
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'class' => array(self::BELONGS_TO, 'Classroom', 'classId'),
			'dailyErrors' => array(self::HAS_MANY, 'DailyError', 'did'),
			'campus' => array(self::BELONGS_TO, 'Campus', 'cid'),
			'building' => array(self::BELONGS_TO, 'Building', 'bid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'did' => 'ID',
			'cid' => '校区',
			'bid' => '教学楼',
			'classId' => '记录课室',
			'register' => '检查人	',
			'week' => '记录周次',
			'chkTime' => '时间',
			'chkDate' => '日期',
			'state' => '状态',
			'details' => '问题描述',
			'discRom' => '光驱',
			'usb' => 'USB',
			'patch' => '补丁',
			'voice' => '声音',
			'net' => '网络',
			'virus' => '病毒库',
			'noteBook' => '笔记本',
			'mid' => '中控',
			'maiHasLine' => '有线麦',
			'maiNoLine' => '无线麦',
			'proScreen' => '投影幕',
			'projector' => '投影机',
			'amplifier' => '功放',
			'stage' => '讲台',
			'class_search' => '课室',
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
		
		$criteria->with = array('class', 'building', 'campus');
		$criteria->compare('class.className', $this->class_search, true);
		
		$criteria->compare('did',$this->did,true);
		$criteria->compare('classId',$this->classId,true);;
		$criteria->compare('campus.cid',$this->cid,true);
		$criteria->compare('building.bid',$this->bid,true);
		$criteria->compare('register',$this->register,true);
		$criteria->compare('week',$this->week);
		$criteria->compare('chkDate',$this->chkDate,true);
		$criteria->compare('state',$this->state,true);
		
		//导出excel的数据
		$d = new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>array(
						'pageSize'=> 999999,
				),
				'sort' => array('defaultOrder' => 'chkDate DESC'),
		));
		$_SESSION['daily-excel']= $d;
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
				'sort'=>array(
						'attributes'=>array(
								'class_search'=>array(
										'asc'=>'class.className',
										'desc'=>'class.className DESC',
								),
								'bid' => array(
										'asc'=>'building.bname',
										'desc'=>'building.bname DESC',
								),
								'cid' => array(
										'asc' => 'campus.cname',
										'desc'=>'campus.cname DESC',
								),
								'*',
						),
						),
				'pagination'=>array(
						'pageSize'=>15,
				),
				'sort' => array('defaultOrder' => 'chkDate DESC'),
		));
	}
	
	public static function getDevOptions()
	{
		return array(
				'正常' => '正常',
				'不正常' => '不正常',
		);
	}
	
	public static function getStateOptions()
	{
		return array(
				'' => '全部',
				'所有设备正常' => '所有设备正常',
				'已解决故障' => '已解决故障',
				'存在故障未解决' => '存在故障未解决',
				);
	}
	
	public static function getWeekOptions()
	{
		$arr = array('' => '全部');
		for($i = '1'; $i <= '20'; $i++)
		{
			$arr[$i] = $i;
		}
		ksort($arr);
		return $arr;
	}
	
}