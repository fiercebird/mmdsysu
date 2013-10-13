<?php

/**
 * This is the model class for table "monthSurvey".
 *
 * The followings are the available columns in table 'monthSurvey':
 * @property string $id
 * @property string $cid
 * @property string $zhaodu_samlpe
 * @property string $survey_sample
 * @property string $survey_year
 * @property string $survey_month
 * @property string $record_man
 * @property string $pg_zhaodu_vgd
 * @property string $pg_zhaodu_gd
 * @property string $pg_zhaodu_md
 * @property string $pg_zhaodu_bd
 * @property string $desksystem_vgd
 * @property string $desksystem_gd
 * @property string $desksystem_md
 * @property string $desksystem_bd
 * @property string $projector_vgd
 * @property string $projector_gd
 * @property string $projector_md
 * @property string $projector_bd
 * @property string $screen_vgd
 * @property string $screen_gd
 * @property string $screen_md
 * @property string $screen_bd
 * @property string $computer_vgd
 * @property string $computer_gd
 * @property string $computer_md
 * @property string $computer_bd
 * @property string $rom_vgd
 * @property string $rom_gd
 * @property string $rom_md
 * @property string $rom_bd
 * @property string $notebook_vgd
 * @property string $notebook_gd
 * @property string $notebook_md
 * @property string $notebook_bd
 * @property string $hasline_vgd
 * @property string $hasline_gd
 * @property string $hasline_md
 * @property string $hasline_bd
 * @property string $phone_vgd
 * @property string $phone_gd
 * @property string $phone_md
 * @property string $phone_bd
 * @property string $service_vgd
 * @property string $service_gd
 * @property string $service_md
 * @property string $service_bd
 * @property string $repair_y
 * @property string $repair_n
 * @property string $noline_vgd
 * @property string $noline_gd
 * @property string $noline_md
 * @property string $noline_bd
 * @property string $status	
 *
 * The followings are the available model relations:
 * @property Campus $c
 */
class MonthSurvey extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MonthSurvey the static model class
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
		return 'monthSurvey';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cid, zhaodu_sample, survey_sample, survey_year, survey_month, record_man', 'required'),
			array('survey_year', 'numerical'),
			array('zhaodu_sample, survey_sample', 'numerical',  'integerOnly'=>true, 'min'=>1, 'tooSmall'=>'样本量必须是大于1的整数'),
			//array('pg_zhaodu_vgd, pg_zhaodu_gd, pg_zhaodu_md, pg_zhaodu_bd, desksystem_vgd, desksystem_gd, desksystem_md, desksystem_bd, projector_vgd, projector_gd, projector_md, projector_bd, screen_vgd, screen_gd, screen_md, screen_bd, computer_vgd, computer_gd, computer_md, computer_bd, rom_vgd, rom_gd, rom_md, rom_bd, notebook_vgd, notebook_gd, notebook_md, notebook_bd, hasline_vgd, hasline_gd, hasline_md, hasline_bd, phone_vgd, phone_gd, phone_md, phone_bd, service_vgd, service_gd, service_md, service_bd, repair_y, repair_n, noline_vgd, noline_gd, noline_md, noline_bd', 'myrequired'),
			array('cid, survey_sample, survey_year, survey_month, pg_zhaodu_vgd, pg_zhaodu_gd, pg_zhaodu_md, pg_zhaodu_bd, desksystem_vgd, desksystem_gd, desksystem_md, desksystem_bd, projector_vgd, projector_gd, projector_md, projector_bd, screen_vgd, screen_gd, screen_md, screen_bd, computer_vgd, computer_gd, computer_md, computer_bd, rom_vgd, rom_gd, rom_md, rom_bd, notebook_vgd, notebook_gd, notebook_md, notebook_bd, hasline_vgd, hasline_gd, hasline_md, hasline_bd, phone_vgd, phone_gd, phone_md, phone_bd, service_vgd, service_gd, service_md, service_bd, repair_y, repair_n, noline_vgd, noline_gd, noline_md, noline_bd', 'length', 'max'=>10),
			array('record_man', 'length', 'max'=>20),
			array('status', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cid, survey_sample, survey_year, survey_month, record_man, pg_zhaodu_vgd, pg_zhaodu_gd, pg_zhaodu_md, pg_zhaodu_bd, desksystem_vgd, desksystem_gd, desksystem_md, desksystem_bd, projector_vgd, projector_gd, projector_md, projector_bd, screen_vgd, screen_gd, screen_md, screen_bd, computer_vgd, computer_gd, computer_md, computer_bd, rom_vgd, rom_gd, rom_md, rom_bd, notebook_vgd, notebook_gd, notebook_md, notebook_bd, hasline_vgd, hasline_gd, hasline_md, hasline_bd, phone_vgd, phone_gd, phone_md, phone_bd, service_vgd, service_gd, service_md, service_bd, repair_y, repair_n, noline_vgd, noline_gd, noline_md, noline_bd', 'safe', 'on'=>'search'),
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
			'zhaodu_sample' => '灯泡照度样本总量',
			'survey_year' => '记录年份',
			'survey_month' => '记录月份',
			'record_man' => '记录人',
			'pg_zhaodu_vgd' => 'Pg Zhaodu Vgd',
			'pg_zhaodu_gd' => '投影机照度',
			'pg_zhaodu_md' => 'Pg Zhaodu Md',
			'pg_zhaodu_bd' => 'Pg Zhaodu Bd',
			'desksystem_vgd' => 'Desksystem Vgd',
			'desksystem_gd' => '桌面控制系统',
			'desksystem_md' => 'Desksystem Md',
			'desksystem_bd' => 'Desksystem Bd',
			'projector_vgd' => 'Projector Vgd',
			'projector_gd' => '投影机',
			'projector_md' => 'Projector Md',
			'projector_bd' => 'Projector Bd',
			'screen_vgd' => 'Screen Vgd',
			'screen_gd' => '投影幕',
			'screen_md' => 'Screen Md',
			'screen_bd' => 'Screen Bd',
			'computer_vgd' => 'Computer Vgd',
			'computer_gd' => '台式电脑',
			'computer_md' => 'Computer Md',
			'computer_bd' => 'Computer Bd',
			'rom_vgd' => 'Rom Vgd',
			'rom_gd' => '读U盘、移动硬盘',
			'rom_md' => 'Rom Md',
			'rom_bd' => 'Rom Bd',
			'notebook_vgd' => 'Notebook Vgd',
			'notebook_gd' => '笔记本电脑切换方便性',
			'notebook_md' => 'Notebook Md',
			'notebook_bd' => 'Notebook Bd',
			'hasline_vgd' => 'Hasline Vgd',
			'hasline_gd' => '有线话筒',
			'hasline_md' => 'Hasline Md',
			'hasline_bd' => 'Hasline Bd',
			'phone_vgd' => 'Phone Vgd',
			'phone_gd' => '电话报障受理',
			'phone_md' => 'Phone Md',
			'phone_bd' => 'Phone Bd',
			'service_vgd' => 'Service Vgd',
			'service_gd' => '服务质量',
			'service_md' => 'Service Md',
			'service_bd' => 'Service Bd',
			'repair_y' => '排障速度',
			'repair_n' => 'Repair N',
			'noline_vgd' => 'Noline Vgd',
			'noline_gd' => '无线话筒',
			'noline_md' => 'Noline Md',
			'noline_bd' => 'Noline Bd',
			'status' => '总结描述'
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
		$criteria->compare('survey_month',$this->survey_month,true);
		$criteria->compare('record_man',$this->record_man,true);
		$criteria->compare('pg_zhaodu_vgd',$this->pg_zhaodu_vgd,true);
		$criteria->compare('pg_zhaodu_gd',$this->pg_zhaodu_gd,true);
		$criteria->compare('pg_zhaodu_md',$this->pg_zhaodu_md,true);
		$criteria->compare('pg_zhaodu_bd',$this->pg_zhaodu_bd,true);
		$criteria->compare('desksystem_vgd',$this->desksystem_vgd,true);
		$criteria->compare('desksystem_gd',$this->desksystem_gd,true);
		$criteria->compare('desksystem_md',$this->desksystem_md,true);
		$criteria->compare('desksystem_bd',$this->desksystem_bd,true);
		$criteria->compare('projector_vgd',$this->projector_vgd,true);
		$criteria->compare('projector_gd',$this->projector_gd,true);
		$criteria->compare('projector_md',$this->projector_md,true);
		$criteria->compare('projector_bd',$this->projector_bd,true);
		$criteria->compare('screen_vgd',$this->screen_vgd,true);
		$criteria->compare('screen_gd',$this->screen_gd,true);
		$criteria->compare('screen_md',$this->screen_md,true);
		$criteria->compare('screen_bd',$this->screen_bd,true);
		$criteria->compare('computer_vgd',$this->computer_vgd,true);
		$criteria->compare('computer_gd',$this->computer_gd,true);
		$criteria->compare('computer_md',$this->computer_md,true);
		$criteria->compare('computer_bd',$this->computer_bd,true);
		$criteria->compare('rom_vgd',$this->rom_vgd,true);
		$criteria->compare('rom_gd',$this->rom_gd,true);
		$criteria->compare('rom_md',$this->rom_md,true);
		$criteria->compare('rom_bd',$this->rom_bd,true);
		$criteria->compare('notebook_vgd',$this->notebook_vgd,true);
		$criteria->compare('notebook_gd',$this->notebook_gd,true);
		$criteria->compare('notebook_md',$this->notebook_md,true);
		$criteria->compare('notebook_bd',$this->notebook_bd,true);
		$criteria->compare('hasline_vgd',$this->hasline_vgd,true);
		$criteria->compare('hasline_gd',$this->hasline_gd,true);
		$criteria->compare('hasline_md',$this->hasline_md,true);
		$criteria->compare('hasline_bd',$this->hasline_bd,true);
		$criteria->compare('phone_vgd',$this->phone_vgd,true);
		$criteria->compare('phone_gd',$this->phone_gd,true);
		$criteria->compare('phone_md',$this->phone_md,true);
		$criteria->compare('phone_bd',$this->phone_bd,true);
		$criteria->compare('service_vgd',$this->service_vgd,true);
		$criteria->compare('service_gd',$this->service_gd,true);
		$criteria->compare('service_md',$this->service_md,true);
		$criteria->compare('service_bd',$this->service_bd,true);
		$criteria->compare('repair_y',$this->repair_y,true);
		$criteria->compare('repair_n',$this->repair_n,true);
		$criteria->compare('noline_vgd',$this->noline_vgd,true);
		$criteria->compare('noline_gd',$this->noline_gd,true);
		$criteria->compare('noline_md',$this->noline_md,true);
		$criteria->compare('noline_bd',$this->noline_bd,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
				'phone',
				'service',
				'noline',
				);
	}
	
	public static function getExcelItemArray() {
		return array(
				'投影机照度',
				'桌面控制系统',
				'投影机',
				'投影幕',
				'台式电脑(含上网、视音频)',
				'读U盘、移动硬盘',
				'笔记本电脑切换方便性',
				'有线话筒',
				'电话报障受理',
				'服务质量',
				'无线话筒',
				'排障速度是否满意',
		);
	}
	
	public static function getPercentage($model, $attr) {
		if (is_object($model))
			return floor((($model->$attr) / ($model->survey_sample)) * 100).'%'; 
	}
	
	public static function getZhaoduPercentage($model, $attr) {
		if (is_object($model))
			return floor((($model->$attr) / ($model->zhaodu_sample)) * 100).'%';
	}
	
	public static function getChartParams($model, $lbl) {
		$str = '';
		if (!is_object($model))
			return '0%';
		if ($lbl == 'repair_')
		{
			$parm1 = $lbl.'y';
			$parm2 = $lbl.'n';
			$str .= MonthSurvey::getPercentage($model, $parm1) . ',' . MonthSurvey::getPercentage($model, $parm2);
		}
		else {
			$parm1 = $lbl.'vgd';
			$parm2 = $lbl.'gd';
			$parm3 = $lbl.'md';
			$parm4 = $lbl.'bd';
			$str .= MonthSurvey::getPercentage($model, $parm1) . ',' . MonthSurvey::getPercentage($model, $parm2) .
			',' . MonthSurvey::getPercentage($model, $parm3) . ',' . MonthSurvey::getPercentage($model, $parm4);
		}
		return $str;
	}
	
	public static function getMonthOptions()
	{
		$arr = array();
		for($i = 1; $i <= 12; $i++)
		{
			$arr[$i] = $i;
		}
		return $arr;
	}
	
	public static function fill($row, $col, $sheet, $model, $type, $select = 0) {
		if (is_object($sheet) && is_object($model) && method_exists($sheet, 'setCellValueByColumnAndRow')) {
			if($select == 0) {
				$sheet->setCellValueByColumnAndRow($col++, $row, MonthSurvey::getPercentage($model, $type.'_vgd'));
				$sheet->setCellValueByColumnAndRow($col++, $row, MonthSurvey::getPercentage($model, $type.'_gd'));
				$sheet->setCellValueByColumnAndRow($col++, $row, MonthSurvey::getPercentage($model, $type.'_md'));
				$sheet->setCellValueByColumnAndRow($col, $row, MonthSurvey::getPercentage($model, $type.'_bd'));
				return $sheet;
			} else if ($select == 1) {
				$sheet->setCellValueByColumnAndRow($col++, $row, MonthSurvey::getZhaoduPercentage($model, $type.'_vgd'));
				$sheet->setCellValueByColumnAndRow($col++, $row, MonthSurvey::getZhaoduPercentage($model, $type.'_gd'));
				$sheet->setCellValueByColumnAndRow($col++, $row, MonthSurvey::getZhaoduPercentage($model, $type.'_md'));
				$sheet->setCellValueByColumnAndRow($col, $row, MonthSurvey::getZhaoduPercentage($model, $type.'_bd'));
				return $sheet;
			}
		}
		return false;
	}
	
	public static function getYearOptions() {
		$arr = array();
		$cur = date("Y");
		for($i = $cur - 10; $i <= $cur + 10; $i++)
			$arr[$i] = $i;
		return $arr;
	}
}