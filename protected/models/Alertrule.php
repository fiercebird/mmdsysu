<?php

/**
 * This is the model class for table "alertrule".
 *
 * The followings are the available columns in table 'alertrule':
 * @property string $arid
 * @property string $usedYear
 * @property string $repairTimes
 * @property string $lampzhaodu
 * @property string $lampHour
 */
class Alertrule extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Alertrule the static model class
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
		return 'alertrule';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usedYear, repairTimes, lampzhaodu, lampHour', 'required'),
			array('usedYear, repairTimes', 'length', 'max'=>5),
			array('lampzhaodu, lampHour', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('arid, usedYear, repairTimes, lampzhaodu, lampHour', 'safe', 'on'=>'search'),
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
			'arid' => 'Arid',
			'usedYear' => 'Used Year',
			'repairTimes' => 'Repair Times',
			'lampzhaodu' => 'Lampzhaodu',
			'lampHour' => 'Lamp Hour',
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

		$criteria->compare('arid',$this->arid,true);
		$criteria->compare('usedYear',$this->usedYear,true);
		$criteria->compare('repairTimes',$this->repairTimes,true);
		$criteria->compare('lampzhaodu',$this->lampzhaodu,true);
		$criteria->compare('lampHour',$this->lampHour,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}