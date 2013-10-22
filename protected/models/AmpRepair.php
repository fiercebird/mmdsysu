<?php

/**
 * This is the model class for table "ampRepair".
 *
 * The followings are the available columns in table 'ampRepair':
 * @property string $id
 * @property string $aid
 * @property string $details
 * @property string $man
 * @property string $cost
 * @property string $time
 *
 * The followings are the available model relations:
 * @property Amplifier $a
 */
class AmpRepair extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AmpRepair the static model class
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
		return 'ampRepair';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('aid, details, man, time', 'required'),
			array('aid', 'length', 'max'=>10),
			array('details', 'length', 'max'=>100),
			array('man, cost, time', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, aid, details, man, cost, time', 'safe', 'on'=>'search'),
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
			'cc' => array(self::BELONGS_TO, 'Amplifier', 'aid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'aid' => 'Aid',
			'details' => 'Details',
			'man' => 'Man',
			'cost' => 'Cost',
			'time' => 'Time',
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
		$criteria->compare('aid',$this->aid,true);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('man',$this->man,true);
		$criteria->compare('cost',$this->cost,true);
		$criteria->compare('time',$this->time,true);
                                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        //获取维修次数
        public function getRepair($aid)
        {
            $repair = $this->countByAttributes(array('aid'=>$aid));
            if($repair == 0)
                return '无';
            else
                return "<a href='#' class='aRepair'>" . $repair . "次</a>";
        }
}