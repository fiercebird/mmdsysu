<?php

/**
 * This is the model class for table "lampZhaodu".
 *
 * The followings are the available columns in table 'lampZhaodu':
 * @property string $id
 * @property string $lid
 * @property string $zhaodu
 * @property string $time
 *
 * The followings are the available model relations:
 * @property Lamp $l
 */
class LampZhaodu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LampZhaodu the static model class
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
		return 'lampZhaodu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lid, zhaodu, time', 'required'),
			array('lid', 'length', 'max'=>10),
			array('zhaodu', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, lid, zhaodu, time', 'safe', 'on'=>'search'),
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
			'l' => array(self::BELONGS_TO, 'Lamp', 'lid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'lid' => 'LID',
			'zhaodu' => '照度',
			'time' => '照度更新时间',
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

		$criteria->compare('id',$this->id,true);
                if(isset($_GET['lid']))
                    $criteria->compare('lid',$_GET['lid'],true);
		$criteria->compare('zhaodu',$this->zhaodu,true);
		$criteria->compare('time',$this->time,true);
                
                //把查询条件保存在session中
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
		));
	}
}