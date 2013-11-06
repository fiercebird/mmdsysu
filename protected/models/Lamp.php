<?php

/**
 * This is the model class for table "lamp".
 *
 * The followings are the available columns in table 'lamp':
 * @property string $lid
 * @property string $classId
 * @property string $updateTime
 * @property string $displayerType
 * @property string $type
 * @property string $price
 * @property string $liuming
 * @property string $isUsing
 * @property string $onZhaodu
 * @property string $offZhaodu
 * @property string $zhaodu
 * @property string $usedTime
 * @property string $supplyCompany
 * @property string $guarentee
 *
 * The followings are the available model relations:
 * @property Classroom $class
 * @property LampRepair[] $lampRepairs
 * @property LampZhaodu[] $lampZhaodus
 */
class Lamp extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Lamp the static model class
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
		return 'lamp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('classId', 'required'),
			array('classId, isUsing', 'length', 'max'=>10),
			array('updateTime, displayerType, type, price, liuming, onZhaodu, offZhaodu, zhaodu, usedTime, supplyCompany, guarentee', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('lid, classId, updateTime, displayerType, type, price, liuming, isUsing, onZhaodu, zhaodu, offZhaodu, usedTime, supplyCompany, guarentee', 'safe', 'on'=>'search'),
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
			'class' => array(self::BELONGS_TO, 'Classroom', 'classId'),
			'lampRepairs' => array(self::HAS_MANY, 'LampRepair', 'lid'),
			'lampZhaodus' => array(self::HAS_MANY, 'LampZhaodu', 'lid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'lid' => 'ID',
			'classId' => '课室',
			'updateTime' => '更换时间',
			'displayerType' => '投影机类型',
			'type' => '型号',
			'price' => '价格',
			'liuming' => '流明',
			'isUsing' => '在用/报废',
			'onZhaodu' => '开机照度',
			'offZhaodu' => '未开机照度',
                        'zhaodu' => '照度',
			'usedTime' => '使用小时数',
			'supplyCompany' => '供应商',
                        'guarentee' => '保修情况'
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
                //自然连接：课室+教学楼+校区
                $criteria->with = array('class'=>array('with'=>array('b'=>array('with'=>'c'))));
                
                //检索时如果提交了校区ID且不为0,则过滤校区
                if (isset($_GET['Campus']['cname']) && $_GET['Campus']['cname'] != 0)
                    $criteria->compare('c.cid',  $_GET['Campus']['cname'], true);
                //如果提交了教学楼ID且不为0，则过滤教学楼
                if (isset($_GET['Building']['bid']) && $_GET['Building']['bid'] != 0)
                    $criteria->compare('class.bid',  $_GET['Building']['bid'], true);

		$criteria->compare('lid',$this->lid,true);
		$criteria->compare('class.classId',$this->classId,true);
		$criteria->compare('updateTime',$this->updateTime,true);
		$criteria->compare('displayerType',$this->displayerType,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('liuming',$this->liuming,true);
		$criteria->compare('isUsing',$this->isUsing,true);
		$criteria->compare('onZhaodu',$this->onZhaodu,true);
		$criteria->compare('offZhaodu',$this->offZhaodu,true);
                $criteria->compare('zhaodu',$this->zhaodu,true);
		$criteria->compare('usedTime',$this->usedTime,true);
		$criteria->compare('supplyCompany',$this->supplyCompany,true);
                $criteria->compare('guarentee',$this->guarentee,true);
                
                //把查询条件保存在session中，导出excel用
                $page_key = get_class($this).'_page';
                if(isset($_GET['back']) && !Yii::app()->request->isAjaxRequest) {
                    $_GET[$page_key] = $_SESSION['cp'];
                    $criteria = $_SESSION['cc'];
                }           
                
                $_SESSION['cc'] = $criteria;     
                if(isset($_GET[$page_key]))
                    $_SESSION['cp'] = $_GET[$page_key];
                else 
                    $_SESSION['cp'] = null;
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>array(
                            'attributes'=>array(
                                'class.b.c.cname'=>array(
                                    'asc'=>'cname',
                                    'desc'=>'cname desc',
                                ),
                                'class.b.bname'=>array(
                                    'asc'=>'bname',
                                    'desc'=>'bname desc'
                                ),
                                'class.className'=>array(
                                    'asc'=>'className',
                                    'desc'=>'className desc'
                                ),
                                '*'
                            )
                        ),
                        'pagination'=>array(
                            'pageSize'=>20,
                        ),
		));
	}
}