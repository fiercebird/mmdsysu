<?php
/* @var $this MonthSurveyController */
/* @var $data MonthSurvey */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cid')); ?>:</b>
	<?php echo CHtml::encode($data->cid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('survey_sample')); ?>:</b>
	<?php echo CHtml::encode($data->survey_sample); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('survey_year')); ?>:</b>
	<?php echo CHtml::encode($data->survey_year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('survey_month')); ?>:</b>
	<?php echo CHtml::encode($data->survey_month); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('record_man')); ?>:</b>
	<?php echo CHtml::encode($data->record_man); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pg_zhaodu_vgd')); ?>:</b>
	<?php echo CHtml::encode($data->pg_zhaodu_vgd); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pg_zhaodu_gd')); ?>:</b>
	<?php echo CHtml::encode($data->pg_zhaodu_gd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pg_zhaodu_md')); ?>:</b>
	<?php echo CHtml::encode($data->pg_zhaodu_md); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pg_zhaodu_bd')); ?>:</b>
	<?php echo CHtml::encode($data->pg_zhaodu_bd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desksystem_vgd')); ?>:</b>
	<?php echo CHtml::encode($data->desksystem_vgd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desksystem_gd')); ?>:</b>
	<?php echo CHtml::encode($data->desksystem_gd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desksystem_md')); ?>:</b>
	<?php echo CHtml::encode($data->desksystem_md); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desksystem_bd')); ?>:</b>
	<?php echo CHtml::encode($data->desksystem_bd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projector_vgd')); ?>:</b>
	<?php echo CHtml::encode($data->projector_vgd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projector_gd')); ?>:</b>
	<?php echo CHtml::encode($data->projector_gd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projector_md')); ?>:</b>
	<?php echo CHtml::encode($data->projector_md); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projector_bd')); ?>:</b>
	<?php echo CHtml::encode($data->projector_bd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('screen_vgd')); ?>:</b>
	<?php echo CHtml::encode($data->screen_vgd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('screen_gd')); ?>:</b>
	<?php echo CHtml::encode($data->screen_gd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('screen_md')); ?>:</b>
	<?php echo CHtml::encode($data->screen_md); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('screen_bd')); ?>:</b>
	<?php echo CHtml::encode($data->screen_bd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('computer_vgd')); ?>:</b>
	<?php echo CHtml::encode($data->computer_vgd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('computer_gd')); ?>:</b>
	<?php echo CHtml::encode($data->computer_gd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('computer_md')); ?>:</b>
	<?php echo CHtml::encode($data->computer_md); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('computer_bd')); ?>:</b>
	<?php echo CHtml::encode($data->computer_bd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rom_vgd')); ?>:</b>
	<?php echo CHtml::encode($data->rom_vgd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rom_gd')); ?>:</b>
	<?php echo CHtml::encode($data->rom_gd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rom_md')); ?>:</b>
	<?php echo CHtml::encode($data->rom_md); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rom_bd')); ?>:</b>
	<?php echo CHtml::encode($data->rom_bd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notebook_vgd')); ?>:</b>
	<?php echo CHtml::encode($data->notebook_vgd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notebook_gd')); ?>:</b>
	<?php echo CHtml::encode($data->notebook_gd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notebook_md')); ?>:</b>
	<?php echo CHtml::encode($data->notebook_md); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notebook_bd')); ?>:</b>
	<?php echo CHtml::encode($data->notebook_bd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hasline_vgd')); ?>:</b>
	<?php echo CHtml::encode($data->hasline_vgd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hasline_gd')); ?>:</b>
	<?php echo CHtml::encode($data->hasline_gd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hasline_md')); ?>:</b>
	<?php echo CHtml::encode($data->hasline_md); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hasline_bd')); ?>:</b>
	<?php echo CHtml::encode($data->hasline_bd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_vgd')); ?>:</b>
	<?php echo CHtml::encode($data->phone_vgd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_gd')); ?>:</b>
	<?php echo CHtml::encode($data->phone_gd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_md')); ?>:</b>
	<?php echo CHtml::encode($data->phone_md); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_bd')); ?>:</b>
	<?php echo CHtml::encode($data->phone_bd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_vgd')); ?>:</b>
	<?php echo CHtml::encode($data->service_vgd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_gd')); ?>:</b>
	<?php echo CHtml::encode($data->service_gd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_md')); ?>:</b>
	<?php echo CHtml::encode($data->service_md); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_bd')); ?>:</b>
	<?php echo CHtml::encode($data->service_bd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('repair_y')); ?>:</b>
	<?php echo CHtml::encode($data->repair_y); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('repair_n')); ?>:</b>
	<?php echo CHtml::encode($data->repair_n); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('noline_vgd')); ?>:</b>
	<?php echo CHtml::encode($data->noline_vgd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('noline_gd')); ?>:</b>
	<?php echo CHtml::encode($data->noline_gd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('noline_md')); ?>:</b>
	<?php echo CHtml::encode($data->noline_md); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('noline_bd')); ?>:</b>
	<?php echo CHtml::encode($data->noline_bd); ?>
	<br />

	*/ ?>

</div>