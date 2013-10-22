<?php

/**
 * This is the model class for table "proScreen".
 *
 * The followings are the available columns in table 'proScreen':
 * @property string $pid
 * @property string $classId
 * @property string $deviceNum
 * @property string $brand
 * @property string $type
 * @property string $size
 * @property string $price
 * @property string $supplyCompany
 * @property string $buyTime
 * @property string $isUsing
 * @property string $isAuto
 * @property string $what
 * @property string $guarentee
 *
 * The followings are the available model relations:
 * @property Classroom $class
 * @property PsRepair[] $psRepairs
 */
class ProScreen extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProScreen the static model class
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
		return 'proScreen';
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
			array('classId, isUsing, isAuto', 'length', 'max'=>10),
			array('deviceNum, brand, type, size, price, supplyCompany, buyTime, what, guarentee', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pid, classId, deviceNum, brand, type, size, price, supplyCompany, buyTime, isUsing, isAuto, what, guarentee', 'safe', 'on'=>'search'),
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
			'psRepairs' => array(self::HAS_MANY, 'PsRepair', 'pid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pid' => 'ID',
			'classId' => '课室',
			'deviceNum' => '设备号',
			'brand' => '品牌',
			'type' => '型号',
			'size' => '尺寸',
			'price' => '价格',
			'supplyCompany' => '供应商',
			'buyTime' => '购买时间',
			'isUsing' => '在用/报废',
			'isAuto' => '手动/电动',
			'what' => '白塑/玻珠',
			'guarentee' => '保修情况',
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
                
                
		$criteria->compare('pid',$this->pid,true);
		$criteria->compare('class.classId',$this->classId,true);
		$criteria->compare('deviceNum',$this->deviceNum,true);
		$criteria->compare('brand',$this->brand,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('size',$this->size,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('supplyCompany',$this->supplyCompany,true);
		$criteria->compare('buyTime',$this->buyTime,true);
		$criteria->compare('isUsing',$this->isUsing,true);
		$criteria->compare('isAuto',$this->isAuto,true);
		$criteria->compare('what',$this->what,true);
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