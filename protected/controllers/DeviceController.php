<?php

class DeviceController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
	public $xiaoqu = array(   //新增
	    '1' => '东校区',
		'2' => '南校区',
		'3' => '北校区',
		'4' => '珠海校区',
	);
    public $dev = array(
        '0' => '请选择设备',
        'computer' => '电脑',
        'projector' => '投影机',
        'amplifier' => '功放',
        'soundControl' => '调音台',
        'mixer' => '混音器',
        'maiHasLine' => '有线麦',
        'maiNoLine' => '无线麦',
        'midControl' => '中控',
        'proScreen' => '投影幕',
        'voiceBox' => '音箱',
        'lamp' => '灯泡',
		'all' => '全部',
    );
	public $ddev = array(
        'computer' => '电脑',
        'projector' => '投影机',
        'amplifier' => '功放',
        'soundControl' => '调音台',
        'mixer' => '混音器',
        'maiHasLine' => '有线麦',
        'maiNoLine' => '无线麦',
        'midControl' => '中控',
        'proScreen' => '投影幕',
        'voiceBox' => '音箱',
        'lamp' => '灯泡',
    );
    public $c = array(
        'computer' => array(
            array(
                'name' => 'class.b.c.cname',
                'value' => '$data->class->b->c->cname'
            ),
            array(
                'name' => 'class.b.bname',
                'value' => '$data->class->b->bname'
            ),
            array(
                'name' => 'class.className',
                'value' => '$data->class->className'
            ),
            'deviceNum',
            'type',
            'buyTime',
        ),
        'projector' => array(
            array(
                'name' => 'class.b.c.cname',
                'value' => '$data->class->b->c->cname'
            ),
            array(
                'name' => 'class.b.bname',
                'value' => '$data->class->b->bname'
            ),
            array(
                'name' => 'class.className',
                'value' => '$data->class->className'
            ),
            'deviceNum',
            'type',
            'buyTime',
        ),
        'amplifier' => array(
            array(
                'name' => 'class.b.c.cname',
                'value' => '$data->class->b->c->cname'
            ),
            array(
                'name' => 'class.b.bname',
                'value' => '$data->class->b->bname'
            ),
            array(
                'name' => 'class.className',
                'value' => '$data->class->className'
            ),
            'deviceNum',
            'type',
            'buyTime',
        ),
        'soundControl' => array(
            array(
                'name' => 'class.b.c.cname',
                'value' => '$data->class->b->c->cname'
            ),
            array(
                'name' => 'class.b.bname',
                'value' => '$data->class->b->bname'
            ),
            array(
                'name' => 'class.className',
                'value' => '$data->class->className'
            ),
            'deviceNum',
            'type',
            'buyTime',
        ),
        'mixer' => array(
            array(
                'name' => 'class.b.c.cname',
                'value' => '$data->class->b->c->cname'
            ),
            array(
                'name' => 'class.b.bname',
                'value' => '$data->class->b->bname'
            ),
            array(
                'name' => 'class.className',
                'value' => '$data->class->className'
            ),
            'deviceNum',
            'type',
            'buyTime',
        ),
        'maiHasLine' => array(
            array(
                'name' => 'class.b.c.cname',
                'value' => '$data->class->b->c->cname'
            ),
            array(
                'name' => 'class.b.bname',
                'value' => '$data->class->b->bname'
            ),
            array(
                'name' => 'class.className',
                'value' => '$data->class->className'
            ),
            'deviceNum',
            'type',
            'buyTime',
        ),
        'maiNoLine' => array(
            array(
                'name' => 'class.b.c.cname',
                'value' => '$data->class->b->c->cname'
            ),
            array(
                'name' => 'class.b.bname',
                'value' => '$data->class->b->bname'
            ),
            array(
                'name' => 'class.className',
                'value' => '$data->class->className'
            ),
            'deviceNum',
            'type',
            'buyTime',
        ),
        'midControl' => array(
            array(
                'name' => 'class.b.c.cname',
                'value' => '$data->class->b->c->cname'
            ),
            array(
                'name' => 'class.b.bname',
                'value' => '$data->class->b->bname'
            ),
            array(
                'name' => 'class.className',
                'value' => '$data->class->className'
            ),
            'deviceNum',
            'type',
            'buyTime',
        ),
        'proScreen' => array(
            array(
                'name' => 'class.b.c.cname',
                'value' => '$data->class->b->c->cname'
            ),
            array(
                'name' => 'class.b.bname',
                'value' => '$data->class->b->bname'
            ),
            array(
                'name' => 'class.className',
                'value' => '$data->class->className'
            ),
            'deviceNum',
            'type',
            'buyTime',
        ),
        'voiceBox' => array(
            array(
                'name' => 'class.b.c.cname',
                'value' => '$data->class->b->c->cname'
            ),
            array(
                'name' => 'class.b.bname',
                'value' => '$data->class->b->bname'
            ),
            array(
                'name' => 'class.className',
                'value' => '$data->class->className'
            ),
            'deviceNum',
            'type',
            'buyTime',
        ),
        'lamp' => array(
            array(
                'name' => 'class.b.c.cname',
                'value' => '$data->class->b->c->cname'
            ),
            array(
                'name' => 'class.b.bname',
                'value' => '$data->class->b->bname'
            ),
            array(
                'name' => 'class.className',
                'value' => '$data->class->className'
            ),
            'zhaodu',    //只有这里不一样
            'usedTime',
        ),
    );

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('deleteMany', 'ajaxDeleteMany', 'alert', 'repair','addRepair'),
                'expression' => 'Users::model()->IsOne(18)',
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    //获取设备表格的下拉菜单
    public function getDeviceDropList() {
        return $this->dev;
    }
	
	//获取设备表格的复选框
    public function getDeviceCheckBoxList() {
        return $this->ddev;
    }

    //获取table对应的model
    private function getDeviceModel($table) {
        switch ($table) {
            case 'computer':
                return Computer::model();
            case 'projector':
                return Projector::model();
            case 'amplifier':
                return Amplifier::model();
            case 'soundControl':
                return SoundControl::model();
            case 'mixer':
                return Mixer::model();
            case 'maiHasLine':
                return MaiHasLine::model();
            case 'maiNoLine':
                return MaiNoLine::model();
            case 'midControl':
                return MidControl::model();
            case 'proScreen':
                return ProScreen::model();
            case 'voiceBox':
                return VoiceBox::model();
            case 'lamp':
                return Lamp::model();
            default:
                return null;
        }
    }
    
    //获取table对应repair的model
    private function getDeviceRepairModel($table) {
        switch ($table) {
            case 'computer':
                return ComRepair::model();
            case 'projector':
                return ProRepair::model();
            case 'amplifier':
                return AmpRepair::model();
            case 'soundControl':
                return SouRepair::model();
            case 'mixer':
                return MixRepair::model();
            case 'maiHasLine':
                return MhlRepair::model();
            case 'maiNoLine':
                return MnlRepair::model();
            case 'midControl':
                return MidRepair::model();
            case 'proScreen':
                return ProRepair::model();
            case 'voiceBox':
                return VbRepair::model();
            case 'lamp':
                return LampRepair::model();
            default:
                return null;
        }
    }

    private function getReason($num) {
        switch ($num) {
            case '1':
                return '购买超过年限';
            case '2':
                return '维修超过次数';
            case '3':
                return '照度低于指定值';
            case '4':
                return '灯泡使用时间超过指定值';
            default :
                return '';
        }
    }

    public function getRepairTimes($table) {
        $model = $this->getDeviceModel($table);
    }

    public function actionIndex() {
        $this->render('index');
    }

    //渲染批量删除的表单
    public function actionDeleteMany() {
        $this->render('deleteMany');
    }

    //实际上进行批量删除的ajax操作
    public function actionAjaxDeleteMany() {
        //先检查三项数据有没有提交
        if (!isset($_POST['deviceName']) || !isset($_POST['campusName']) || !isset($_POST['buildingName']))
            echo '请完整选择上面的下拉菜单。';
        else {
            $dev = $_POST['deviceName'];
			if($dev=='all')
			{
			   $arr = array('computer', 'projector','amplifier','soundControl', 'mixer', 'maiHasLine','maiNoLine','midControl','proScreen','voiceBox','lamp');
			   $num=0;
			   $result=0;
			   while($num<=10)
			   {
			     $model = $this->getDeviceModel($arr[$num]);
                 if ($model != null) {
                 try {
                      $db = Yii::app()->db;
                      $sql = "delete $arr[$num] from $arr[$num] left join classroom on $arr[$num].classId=classroom.classId where classroom.bid=:bid";
                      $result1 = $db->createCommand($sql)->execute(array(
                        ':bid' => $_POST['buildingName'],
                    ));
					$result=$result+$result1;
                    if($num==10)  echo "成功清空记录" . $result . "条！";
                    } catch (Exception $exc) {
                        echo '后台出错！请联系技术人员。';
                    }
                }
				$num++;
			   }
			}
			else
			{
                 $model = $this->getDeviceModel($dev);
                 if ($model != null) {
                 try {
                      $db = Yii::app()->db;
                      $sql = "delete $dev from $dev left join classroom on $dev.classId=classroom.classId where classroom.bid=:bid";
                      $result = $db->createCommand($sql)->execute(array(
                        ':bid' => $_POST['buildingName'],
                    ));
                      echo "成功清空记录" . $result . "条！";
                    } catch (Exception $exc) {
                        echo '后台出错！请联系技术人员。';
                    }
                }
			}
        }
    }

    //渲染待换设备提醒的表单
    public function actionAlert() {   //问题出在拼条件的括号
	    if(isset($_POST['campusName'])&&isset($_POST['deviceName'])&&isset($_POST['reason'])) //都至少选了一个
		{
		   $_SESSION['campusName']=$_POST['campusName'];   //保存到会话里
		   $_SESSION['deviceName']=$_POST['deviceName'];
		   $_SESSION['reason']=$_POST['reason'];
		}
		$dataProvider = null;
		$tips='';    //没勾选前提醒为空 
		$column=array();
		//提醒规则
		$rule = Alertrule::model()->findbyPk(1);    //按主键查找（primary key）
		if(isset($_SESSION['campusName'])&&isset($_SESSION['deviceName'])&&isset($_SESSION['reason'])) //都至少选了一个
		{
		   $tips.='当前筛选条件: ';
		   
           //多校区,$_SESSION里保存的是cid
           $cnt1=-1;  //确定勾选了几个校区
           for($i=0;$i<=3;$i++)  //最多四个校区
           {
		      if(!isset($_SESSION['campusName'][$i])) //其实前面已经保证至少选了一个
			  {
			     $cnt1=$i-1;
				 break;
			  }
		   }		
		   if($cnt1==-1) $cnt1=3;    //处理全部校区
           for($i=0;$i<=$cnt1;$i++)
           {
			  if($i==$cnt1) $tips .= $this->xiaoqu[$_SESSION['campusName'][$i]] . ' / '; 
			  else $tips .= $this->xiaoqu[$_SESSION['campusName'][$i]] . ' , '; 
		   }	

           //单设备,$_SESSION里面保存的是设备英文名		   
		   $tips .= $this->dev[$_SESSION['deviceName'][0]] . ' / ';  
		   
		   //多原因,$_SESSION里面保存的是原因id		
		   $cnt2=-1;  //确定勾选了几个原因
           for($i=0;$i<=3;$i++)  //最多四个原因
           {
		      if(!isset($_SESSION['reason'][$i])) //其实前面已经保证至少选了一个
			  {
			     $cnt2=$i-1;
				 break;
			  }
		   }		
		   if($cnt2==-1) $cnt2=3;    //处理全部原因
           for($i=0;$i<=$cnt2;$i++)
           {
			  if($i==$cnt2)  $tips .= $this->getReason($_SESSION['reason'][$i]);
			  else  $tips .= $this->getReason($_SESSION['reason'][$i]).' , ';
		   }	
		   
		    //要显示的列
		    $column=$this->c[$_SESSION['deviceName'][0]]; 
			
            $criteria = new CDbCriteria;      //封装了数据库查询函数
            $criteria->with = array('class' => array('with' => array('b' => array('with' => 'c'))));  //调用relations
			//拼条件
			   //校区
            $criteria->condition = "(c.cid=" . $_SESSION['campusName'][0];
		    for($i=1;$i<=$cnt1;$i++)  
                $criteria->condition .= "|| c.cid=" . $_SESSION['campusName'][$i]; 
		    $criteria->condition .= ")";        //或的优先级低，要加括号
            
			if($_SESSION['deviceName'][0]=='lamp')  //设备选的是灯泡
			{
			    $cnt3=0;   //合法原因个数
			    for($i=0;$i<=$cnt2;$i++)  if($_SESSION['reason'][$i]==3||$_SESSION['reason'][$i]==4) $cnt3++;
				if($cnt3==2) $criteria->condition .= "and (zhaodu<" . $rule->lampzhaodu . " || usedTime>" . $rule->lampHour.')';
				else
				{
			       for($i=0;$i<=$cnt2;$i++)  //遍历原因
				   {
				      if($_SESSION['reason'][$i]==1||$_SESSION['reason'][$i]==2) continue;    //前面两个原因不合法直接跳过
				      else if($_SESSION['reason'][$i]==3)  $criteria->condition .= "and (zhaodu<" . $rule->lampzhaodu .')';
					  else $criteria->condition .= "and (usedTime>" . $rule->lampHour .')';
				   }
				}
			}
			
			else   //设备不是选灯泡
			{
			    $cnt4=0;   //合法原因个数
			    for($i=0;$i<=$cnt2;$i++)  if($_SESSION['reason'][$i]==3||$_SESSION['reason'][$i]==4) $cnt4++;
				if($cnt4==2)
				{
				    //年限
				    $year = date('Y') - $rule->usedYear;
                    $criteria->condition .= "and (SUBSTRING(buyTime,1,4)<'$year' ||";
					
					//维修次数
                    switch ($_SESSION['deviceName'][0]) 
					{    
                        case 'computer':
                            $criteria->condition .= " comid in (select cr.comid from comrepair as cr group by cr.comid having count(cr.comid)>=$rule->repairTimes))";
                            break;
                        case 'projector':
                            $criteria->condition .= " pid in (select cr.pid from prorepair as cr group by cr.pid having count(cr.pid)>=$rule->repairTimes))";
                            break;
                        case 'amplifier':
                            $criteria->condition .= "aid in (select cr.aid from amprepair as cr group by cr.aid having count(cr.aid)>=$rule->repairTimes))";
                            break;
                        case 'soundControl':
                            $criteria->condition .= "sid in (select cr.sid from sourepair as cr group by cr.sid having count(cr.sid)>=$rule->repairTimes))";
                            break;
                        case 'mixer':
                            $criteria->condition .= " mid in (select cr.mid from mixrepair as cr group by cr.mid having count(cr.mid)>=$rule->repairTimes))";
                            break;
                        case 'maiHasLine':
                            $criteria->condition .= " mid in (select cr.mid from mhlrepair as cr group by cr.mid having count(cr.mid)>=$rule->repairTimes))";
                            break;
                        case 'maiNoLine':
                            $criteria->condition .= " mid in (select cr.mid from mnlrepair as cr group by cr.mid having count(cr.mid)>=$rule->repairTimes))";
                            break;
                        case 'midControl':
                            $criteria->condition .= " mid in (select cr.mid from midrepair as cr group by cr.mid having count(cr.mid)>=$rule->repairTimes))";
                            break;
                        case 'proScreen':
                            $criteria->condition .= " pid in (select cr.pid from psrepair as cr group by cr.pid having count(cr.pid)>=$rule->repairTimes))";
                            break;
                        case 'voiceBox':
                            $criteria->condition .= " vid in (select cr.vid from vbrepair as cr group by cr.vid having count(cr.vid)>=$rule->repairTimes))";
                            break;
                    }
					
			    }
				else
				{
				   for($i=0;$i<=$cnt2;$i++)  //遍历原因
				   {
				      if($_SESSION['reason'][$i]==3||$_SESSION['reason'][$i]==4) continue;    //后面两个原因不合法直接跳过
				      else if($_SESSION['reason'][$i]==1)
					  {
					     //年限
				         $year = date('Y') - $rule->usedYear;
                         $criteria->condition .= "and (SUBSTRING(buyTime,1,4)<'$year')";
					  }
					  else 
					  {
					     switch ($_SESSION['deviceName'][0]) 
					     {    
                            case 'computer':
                               $criteria->condition .= "and( comid in (select cr.comid from comrepair as cr group by cr.comid having count(cr.comid)>=$rule->repairTimes))";
                               break;
                            case 'projector':
                               $criteria->condition .= "and ( pid in (select cr.pid from prorepair as cr group by cr.pid having count(cr.pid)>=$rule->repairTimes))";
                               break;
                            case 'amplifier':
                               $criteria->condition .= "and (aid in (select cr.aid from amprepair as cr group by cr.aid having count(cr.aid)>=$rule->repairTimes))";
                               break;
                            case 'soundControl':
                               $criteria->condition .= "and (sid in (select cr.sid from sourepair as cr group by cr.sid having count(cr.sid)>=$rule->repairTimes))";
                               break;
                            case 'mixer':
                               $criteria->condition .= "and (mid in (select cr.mid from mixrepair as cr group by cr.mid having count(cr.mid)>=$rule->repairTimes))";
                               break;
                            case 'maiHasLine':
                               $criteria->condition .= "and ( mid in (select cr.mid from mhlrepair as cr group by cr.mid having count(cr.mid)>=$rule->repairTimes))";
                               break;
                            case 'maiNoLine':
                               $criteria->condition .= "and ( mid in (select cr.mid from mnlrepair as cr group by cr.mid having count(cr.mid)>=$rule->repairTimes))";
                               break;
                            case 'midControl':
                               $criteria->condition .= "and ( mid in (select cr.mid from midrepair as cr group by cr.mid having count(cr.mid)>=$rule->repairTimes))";
                               break;
                            case 'proScreen':
                               $criteria->condition .= "and ( pid in (select cr.pid from psrepair as cr group by cr.pid having count(cr.pid)>=$rule->repairTimes))";
                               break;
                            case 'voiceBox':
                               $criteria->condition .= "and ( vid in (select cr.vid from vbrepair as cr group by cr.vid having count(cr.vid)>=$rule->repairTimes))";
                               break;
                          }     
					  }
				   }
				}
			}
			
	        $model=$this->getDeviceModel($_SESSION['deviceName'][0]);    
            $dataProvider = new CActiveDataProvider($model, array(
                'model' => $model,
                'criteria' => $criteria,
                'pagination' => array(
                    'pageSize' => 20,
                ),
            ));
		}
		$this->render('alert', array(
            'dataProvider' => $dataProvider,
            'tips' => $tips,
            'displayColumn' => $column,
            'alertrule' => $rule
        ));
    }
	
    public function actionRepair()
    {
        $dataProvider = null;
        $tips = '';
        if (isset($_POST['campusName']) && isset($_POST['deviceName'])) 
        {
            //筛选结果提示
            $tips .= '当前筛选条件：';
            $tips .= Campus::model()->findbyPk($_POST['campusName'])->cname . ' / ';
            $tips .= $this->dev[$_POST['deviceName']] . ' / ';
            $tips .= '维修记录';
            
            //过滤条件
            $criteria = new CDbCriteria;
            $criteria->with = array('cc'=>array('with'=>array('class' => array('with' => array('b' => array('with' => 'c'))))));
            $criteria->condition = "c.cid=" . $_POST['campusName'];
            
            $model = $this->getDeviceRepairModel($_POST['deviceName']);

            $dataProvider = new CActiveDataProvider($model, array(
                'model' => $model,
                'criteria' => $criteria,
                'pagination' => array(
                    'pageSize' => 20,
                ),
            ));
        }
        
        $this->render('repair',array(
            'dataProvider' => $dataProvider,
            'tips' => $tips,
        )); 
    }
    //设备维修登记接口
    public function actionAddRepair($classId, $device, $details, $man, $cost)
    {
        $model = null;
        switch ($device) {
            case 'computer':
                $model = new ComRepair;
                $model->comid = Computer::model()->findByAttributes(array('classId'=>$classId))->comid;
                break;
            case 'projector':
                $model = new ProRepair;
                $model->pid = Projector::model()->findByAttributes(array('classId'=>$classId))->pid;
                break;
            case 'amplifier':
                $model = new AmpRepair;
                $model->aid = Amplifier::model()->findByAttributes(array('classId'=>$classId))->aid;
                break;
            case 'soundControl':
                $model = new SouRepair;
                $model->sid = SoundControl::model()->findByAttributes(array('classId'=>$classId))->sid;
                break;
            case 'mixer':
                $model = new MixRepair;
                $model->mid = Mixer::model()->findByAttributes(array('classId'=>$classId))->mid;
                break;
            case 'maiHasLine':
                $model = new MhlRepair;
                $model->mid = MaiHasLine::model()->findByAttributes(array('classId'=>$classId))->mid;
                break;
            case 'maiNoLine':
                $model = new MnlRepair;
                $model->mid = MaiNoLine::model()->findByAttributes(array('classId'=>$classId))->mid;
                break;
            case 'midControl':
                $model = new MidRepair;
                $model->mid = MidControl::model()->findByAttributes(array('classId'=>$classId))->mid;
                break;
            case 'proScreen':
                $model = new PsRepair;
                $model->pid = ProScreen::model()->findByAttributes(array('classId'=>$classId))->pid;
                break;
            case 'voiceBox':
                $model = new VbRepair;
                $model->vid = VoiceBox::model()->findByAttributes(array('classId'=>$classId))->vid;
                break;
            case 'lamp':
                $model = new LampRepair;
                $model->lid = Lamp::model()->findByAttributes(array('classId'=>$classId))->lid;
                break;
            default:
                echo '设备信息出错！请联系技术人员！';
                Yii::app()->end();
        }
        $model->details = $details;
        $model->man = $man;
        $model->cost = $cost;
        $model->time = date('Y-m-d H:i:s');
        if($model->save())
        {
            echo '登记成功！';
            Yii::app()->end();
        }
        else
        {
            echo '登记维修信息出错！请联系技术人员！';
            Yii::app()->end();
        }
    }
}
