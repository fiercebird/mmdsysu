<?php

/**
 * This is the model class for table "weekSurvey".
 *
 * The followings are the available columns in table 'weekSurvey':
 * @property string $id
 * @property string $cid
 * @property string $survey_sample
 * @property string $survey_year
 * @property string $survey_week
 * @property string $record_man
 * @property string $projector_gd
 * @property string $projector_bd
 * @property string $projector_fix
 * @property string $screen_gd
 * @property string $screen_bd
 * @property string $screen_fix
 * @property string $desksystem_gd
 * @property string $desksystem_bd
 * @property string $desksystem_fix
 * @property string $computer_gd
 * @property string $computer_bd
 * @property string $computer_fix
 * @property string $rom_gd
 * @property string $rom_bd
 * @property string $rom_fix
 * @property string $notebook_gd
 * @property string $notebook_bd
 * @property string $notebook_fix
 * @property string $hasline_gd
 * @property string $hasline_bd
 * @property string $hasline_fix
 * @property string $noline_gd
 * @property string $noline_bd
 * @property string $noline_fix
 * @property string $class_status
 * @property string $daily_status
 *
 * The followings are the available model relations:
 * @property Campus $c
 */
class WeekSurvey extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WeekSurvey the static model class
	 */
	public $isMsg1 = 0;
	public $isMsg2 = 0;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'weekSurvey';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cid, survey_sample, survey_year, survey_week, record_man', 'required'),
			array('survey_sample', 'numerical',  'integerOnly'=>true, 'min'=>1, 'tooSmall'=>'样本量必须是大于1的整数',),
			array('survey_week', 'numerical',  'integerOnly'=>true, 'min'=>1, 'tooSmall'=>'记录周期必须是大于1的整数',),
			array('cid, survey_sample, survey_year, survey_week, projector_gd, projector_bd, projector_fix, screen_gd, screen_bd, screen_fix, desksystem_gd,desksystem_bd, desksystem_fix, computer_gd, computer_bd, computer_fix, rom_gd, rom_bd, rom_fix, notebook_gd, notebook_bd, notebook_fix, hasline_gd,hasline_bd, hasline_fix, noline_gd, noline_bd, noline_fix', 'length', 'max'=>10),
			//array('projector_gd, projector_bd, projector_fix, screen_gd, screen_bd, screen_fix, desksystem_gd, desksystem_bd, desksystem_fix, computer_gd, computer_bd, computer_fix, rom_gd, rom_bd, rom_fix, notebook_gd, notebook_bd, notebook_fix, hasline_gd,hasline_bd, hasline_fix, noline_gd, noline_bd, noline_fix', 'myrequired'), 
			array('record_man', 'length', 'max'=>20),
			array('class_status, daily_status', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cid, survey_sample, survey_year, survey_week, record_man, projector_gd, projector_bd, screen_gd, screen_bd, desksystem_gd,desksystem_bd, computer_gd, computer_bd, rom_gd, rom_bd, notebook_gd, notebook_bd, hasline_gd,hasline_bd, noline_gd, noline_bd', 'safe', 'on'=>'search'),
		);
	}
	
	public function myrequired($attribute, $params)
	{
		if (empty($this->$attribute))
		{
			if ($this->isMsg1 === 0) {
				$this->addError('valid', '请输入全部数据项');
				$this->isMsg1 = 1;
			}
		}
		else if(!is_numeric($this->$attribute) || intval($this->$attribute) < 0)
		{
			if ($this->isMsg2 === 0) {
				$this->addError('valid', '数据项必须是正整数');
				$this->isMsg2 = 1;
			}
		}
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'c' => array(self::BELONGS_TO, 'Campus', 'cid'),
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
			'survey_sample' => '调查课室样本总量',
			'survey_year' => '记录年份',
			'survey_week' => '记录周期',
			'record_man' => '记录人',
			'projector_gd' => '投影机',
			'projector_bd' => 'Projector Bd',
			'screen_gd' => '投影幕',
			'screen_bd' => 'Screen Bd',
			'desksystem_gd' => '桌面控制系统',
			'desksystem_bd' => 'Desksystem Bd',
			'computer_gd' => '台式电脑',
			'computer_bd' => 'Computer Bd',
			'rom_gd' => '读U盘、移动硬盘',
			'rom_bd' => 'Rom Bd',
			'notebook_gd' => '笔记本电脑切换方便性',
			'notebook_bd' => 'Notebook Bd',
			'hasline_gd' => '有线话筒',
			'hasline_bd' => 'Hasline Bd',
			'noline_gd' => '无线话筒',
			'noline_bd' => 'Noline Bd',
			'class_status' => '上课过程中遇到的问题及其处理情况，以及其它尚未解决的遗留问题',
			'daily_status' => '日常运维中发现的主要问题，以及解决情况（含尚待解决的问题）',
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
		$criteria->compare('cid',$this->cid,true);
		$criteria->compare('survey_sample',$this->survey_sample,true);
		$criteria->compare('survey_year',$this->survey_year,true);
		$criteria->compare('survey_week',$this->survey_week,true);
		$criteria->compare('record_man',$this->record_man,true);
		$criteria->compare('projector_gd',$this->projector_gd,true);
		$criteria->compare('projector_bd',$this->projector_bd,true);
		$criteria->compare('screen_gd',$this->screen_gd,true);
		$criteria->compare('screen_bd',$this->screen_bd,true);
		$criteria->compare('desksystem_gd',$this->desksystem_gd,true);
		$criteria->compare('desksystem_bd',$this->desksystem_bd,true);
		$criteria->compare('computer_gd',$this->computer_gd,true);
		$criteria->compare('computer_bd',$this->computer_bd,true);
		$criteria->compare('rom_gd',$this->rom_gd,true);
		$criteria->compare('rom_bd',$this->rom_bd,true);
		$criteria->compare('notebook_gd',$this->notebook_gd,true);
		$criteria->compare('notebook_bd',$this->notebook_bd,true);
		$criteria->compare('hasline_gd',$this->hasline_gd,true);
		$criteria->compare('hasline_bd',$this->hasline_bd,true);
		$criteria->compare('noline_gd',$this->noline_gd,true);
		$criteria->compare('noline_bd',$this->noline_bd,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getExcelItemArray() {
		return array(
				'桌面控制系统',
				'投影机',
				'投影幕',
				'台式电脑',
				'读U盘、移动硬盘',
				'笔记本电脑切换方便性',
				'有线话筒',
				'无线话筒',
		);
	}
	
	public static function getExcelTypeArray() {
		return array(
				'desksystem',
				'projector',
				'screen',
				'computer',
				'rom',
				'notebook',
				'hasline',
				'noline',
		);
	}
	
	public static function getPercentage($model, $attr) {
		if (is_object($model))
			return floor((($model->$attr) / ($model->survey_sample)) * 100).'%';
	}
	
	public static function getChartParams($model, $lbl) {
		$str = '';
		if (!is_object($model))
			return '0%';
		$parm1 = $lbl.'gd';
		$parm2 = $lbl.'bd';
		$parm3 = $lbl.'fix';
		$str .= WeekSurvey::getPercentage($model, $parm1) . ',' . WeekSurvey::getPercentage($model, $parm2) .
		',' . WeekSurvey::getPercentage($model, $parm3);
		return $str;
	}
	
	public static function fill($row, $col, $sheet, $model, $type) {
		if (is_object($sheet) && is_object($model) && method_exists($sheet, 'setCellValueByColumnAndRow')) {
				$sheet->setCellValueByColumnAndRow($col++, $row, WeekSurvey::getPercentage($model, $type.'_gd'));
				$sheet->setCellValueByColumnAndRow($col++, $row, WeekSurvey::getPercentage($model, $type.'_bd'));
				$sheet->setCellValueByColumnAndRow($col, $row, WeekSurvey::getPercentage($model, $type.'_fix'));
				return $sheet;
		}
		return false;
	}
	
}