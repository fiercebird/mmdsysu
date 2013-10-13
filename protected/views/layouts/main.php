<?php /* @var $this Controller */ ?>
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery-1.9.1.min.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/com.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/prototype.lite.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/moo.fx.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/moo.fx.pack.js");

function IsOne($index) //检测第index位是否为1
{
    $num = Yii::app()->user->getState('auth');
    $val = 1;
    $val = $val << $index;
    return ($val & $num);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
    <head>
        <title>中山大学多媒体后台管理平台</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
        <link rel="Bookmark" href="images/favicon.ico" />
        <meta name="language" content="zh_cn" />
        <link href="css/com.css" type="text/css" rel="stylesheet"></link>
    </head>
    <body>
        <div>
            <!-- 头部 -->
            <div style="position:fixed;top:0;height:98px;width:100%;overflow:hidden">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td height="70" background="images/main_05.gif">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td height="24">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="270" height="24" background="images/main_03.gif">&nbsp;</td>
                                                <td width="505" background="images/main_04.gif">&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td width="21"><img src="images/main_07.gif" width="21" height="24"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="38">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="270" height="38" background="images/main_09.gif">&nbsp;</td>
                                                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="77%" height="25" valign="bottom">
                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td width="50" style="height: 19px"><div align="center" style="cursor:hand;" onclick="document.getElementById('mainFrame').src='index.html';"><img src="images/main_12.gif" width="49" height="19" border=0></div></td>
                                                                        <td width="50" style="height: 19px"><div align="center" style="cursor:hand;" onclick="window.history.go(-1);"><img src="images/main_14.gif" width="48" height="19"></div></td>
                                                                        <td width="50" style="height: 19px"><div align="center" style="cursor:hand;" onclick="window.history.go(1);"><img src="images/main_16.gif" width="48" height="19"></div></td>
                                                                        <td width="50" style="height: 19px"><div align="center" style="cursor:hand;" onclick="window.frames[0].location.reload();"><img src="images/main_18.gif" width="48" height="19"></div></td>
                                                                        <td width="50" style="height: 19px"><div align="center" style="cursor:hand;" onclick="if (confirm('你确定要退出系统吗？')) {
                                                                                    top.location.href = '?r=site/logout';
                                                                                }"><img src="images/main_20.gif" width="48" height="19"></div></td>
                                                                        <td width="26" style="height: 19px"><div align="center"><img src="images/main_21.gif" width="26" height="19"></div></td>
                                                                        <td width="100" style="height: 19px"><div align="center" style="cursor:hand;"><a href="#" onclick="alert('暂时不支持用户修改资料。');
                                                                                return false;" target="I2"><img src="images/main_22.gif" width="98" height="19"></a></div></td>
                                                                        <td>&nbsp;</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td width="360" valign="bottom"  nowrap="nowrap"><div align="right"><span class="STYLE1"><span class="STYLE2">■</span>现在是：<span id="Clock"></span></span></div></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="21"><img src="images/main_11.gif" width="21" height="38"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="8" style=" line-height:8px;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="270" background="images/main_29.gif" style=" line-height:8px;">&nbsp;</td>
                                                <td width="505" background="images/main_30.gif" style=" line-height:8px;">&nbsp;</td>
                                                <td style=" line-height:8px;">&nbsp;</td>
                                                <td width="21" style=" line-height:8px;"><img src="images/main_31.gif" width="21" height="8"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="28" background="images/main_36.gif">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="177" height="28" style="overflow:hidden;background:url('images/main_32.gif') no-repeat;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="20%"  height="22">&nbsp;</td>
                                                <td width="59%" valign="bottom"><div align="center" class="STYLE1">当前用户：<?php echo Yii::app()->user->getState('name'); ?></div></td>
                                                <td width="21%">&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>

                                            </tr>
                                        </table>
                                    </td>
                                    <td width="21"><img src="images/main_37.gif" width="21" height="28"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- 中间 -->
            <div style="width:100%;position:fixed;left:0;top:98px;" id="midDiv">
                <div style="float:left;width:165px;height:100%;border-right:3px #016aa9 solid;background-color:#EEF2FB;overflow-y:auto;" id="frmTitle">
                    <table width="100%" height="280" border="0" cellpadding="0" cellspacing="0" bgcolor="#EEF2FB">
                        <tr>
                            <td width="182" valign="top">
                                <div>
                                    <img alt="" src="images/main_40.gif" /></div>
                                <div id="container">
                                    <?php
                                    if (IsOne(17))
                                    {
                                        $html = <<<_HTML_
                                        <h1 class="type h1_dev" id="sgc" onclick="w('gc')"><a href="javascript:void(0)">设备信息查询与统计</a></h1>
                                        <div id="gc" style="display:none">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td><img src="images/menu_topline.gif" width="182" height="5" /></td>
                                                </tr>
                                            </table>
                                            <ul class="MM">
                                                <li><a href="?r=classroom/admin" target="I2">课室基本信息 </a></li>
                                                <li><a href="?r=computer/admin" target="I2">电脑 </a></li>
                                                <li><a href="?r=projector/admin" target="I2">投影机</a></li>
                                                <li><a href="?r=lamp/admin" target="I2">投影机灯泡</a></li>
                                                <li><a href="?r=amplifier/admin" target="I2">功放</a></li>
                                                <li><a href="?r=mixer/admin" target="I2">混音器</a></li>
                                                <li><a href="?r=soundControl/admin" target="I2">调音台</a></li>
                                                <li><a href="?r=maiHasLine/admin" target="I2">有线麦</a></li>
                                                <li><a href="?r=maiNoLine/admin" target="I2">无线麦</a></li>
                                                <li><a href="?r=midControl/admin" target="I2">中控</a></li>
                                                <li><a href="?r=proScreen/admin" target="I2">投影幕</a></li>
                                                <li><a href="?r=voiceBox/admin" target="I2">音箱</a></li>
												<li><a href="?r=digitalcpu/admin" target="I2">数字处理器</a></li>
                                            </ul>
                                        </div>      
_HTML_;
                                        echo $html;
                                    }
                                    ?>
                                    <?php
                                    if (IsOne(16))
                                    {
                                        $html = <<<_HTML_
                                        <h1 class="type h1_dev" id="sjk" onclick="w('jk')"><a href="javascript:void(0)">设备检查登记平台</a></h1>
                                        <div id="jk" style="display:none">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td><img src="images/menu_topline.gif" width="182" height="5" /></td>
                                                </tr>
                                            </table>
                                            <ul class="MM">
                                                <li><a href="?r=dailyChk/create" target="I2">日检登记</a></li>
                                                <li><a href="?r=dailyError/admin" target="I2">日检—故障记录</a></li>
                                                <li><a href="?r=dailyChk/admin" target="I2">日检—所有记录</a></li>
                                                <li><a href="?r=weeklyChk/create" target="I2">周检登记</a></li>
                                                <li><a href="?r=weeklyError/admin" target="I2">周检—故障记录</a></li>
                                                <li><a href="?r=weeklyChk/admin" target="I2">周检—所有记录</a></li>
                                            </ul>
                                        </div> 
_HTML_;
                                        echo $html;
                                    }
                                    ?>

                                    <?php
                                    if (IsOne(18))
                                    {
                                        $html = <<<_HTML_
                                            <h1 class="type h1_dev" id="sjka" onclick="w('jka')"><a href="javascript:void(0)">设备数据操作管理</a></h1>
                                            <div id="jka" style="display:none">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td><img src="images/menu_topline.gif" width="182" height="5" /></td>
                                                    </tr>
                                                </table>
                                                <ul class="MM">
                                                    <li><a href="?r=device/deleteMany" target="I2">设备批量删除</a></li>
                                                    <li><a href="?r=device/alert" target="I2">待换设备提醒</a></li>
                                                    <li><a href="?r=device/repair" target="I2">设备维修登记</a></li>
                                                </ul>
                                            </div>  
_HTML_;
                                        echo $html;
                                    }
                                    ?>

                                    <?php
                                    if (IsOne(19))
                                    {
                                        $html = <<<_HTML_
                                            <h1 class="type h1_dev" id="sjkb" onclick="w('jkb')"><a href="javascript:void(0)">设备与服务调查统计</a></h1>
                                            <div id="jkb" style="display:none">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td><img src="images/menu_topline.gif" width="182" height="5" /></td>
                                                    </tr>
                                                </table>
                                                <ul class="MM">
                                                    <li><a href="?r=monthSurvey/create" target="I2">月—录入数据</a></li>
                                                    <li><a href="?r=monthSurvey/view" target="I2">月—统计结果</a></li>
                                                    <li><a href="?r=weekSurvey/create" target="I2">周—录入数据</a></li>
                                                    <li><a href="?r=weekSurvey/view" target="I2">周—统计结果</a></li>
                                                </ul>
                                            </div> 
_HTML_;
                                        echo $html;
                                    }
                                    ?>
									
									 <?php
                                    if (IsOne(20))
                                    {
                                        $html = <<<_HTML_
                                            <h1 class="type h1_dev" id="sjkw" onclick="w('jkw')"><a href="?r=schooltime/create" target="I2">设置开学时间</a></h1>                                        
_HTML_;
                                        echo $html;
                                    }
                                    ?>

                                    <?php
                                    if (IsOne(1))
                                    {
                                        $html = <<<_HTML_
                                        <h1 class="type h1_dev" id="sjkc" onclick="w('jkc')"><a href="javascript:void(0)">用户管理</a></h1>
                                        <div id="jkc" style="display:none">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td><img src="images/menu_topline.gif" width="182" height="5" /></td>
                                                </tr>
                                            </table>
                                            <ul class="MM">
                                                <li><a href="/MCISP/bsman/UserManage/userManageIndex.php" target="I2">用户管理</a></li>
                                            </ul>
                                        </div> 
_HTML_;
                                        echo $html;
                                    }
                                    ?>
                                
                                <?php
                                    if (IsOne(2))
                                    {
                                        $html = <<<_HTML_
                                        <h1 class="type h1_info" id="sjkd" onclick="w('jkd')"><a href="javascript:void(0)">助理管理</a></h1>
                                        <div id="jkd" style="display:none">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td><img src="images/menu_topline.gif" width="182" height="5" /></td>
                                                </tr>
                                            </table>
                                            <ul class="MM">
                                                <li><a href="/MCISP/bsman/AssistantManage/assistindex.php" target="I2">新增助理</a></li>
                                                <li><a href="/MCISP/bsman/AssistantManage/assistindex.php" target="I2">查看助理</a></li>
                                                <li><a href="/MCISP/bsman/AssistantManage/assistindex.php" target="I2">工资导入</a></li>
                                            </ul>
                                        </div> 
_HTML_;
                                        echo $html;
                                    }
                                    ?>
                                    
                                    <?php
                                    if (IsOne(3))
                                    {
                                        $html = <<<_HTML_
                                        <h1 class="type h1_info" id="sjke" onclick="w('jke')"><a href="javascript:void(0)">首页管理</a></h1>
                                        <div id="jke" style="display:none">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td><img src="images/menu_topline.gif" width="182" height="5" /></td>
                                                </tr>
                                            </table>
                                            <ul class="MM">
                                                <li><a href="/MCISP/bsman/contactWay.php" target="I2">联系人管理</a></li>
                                            </ul>
                                        </div> 
_HTML_;
                                        echo $html;
                                    }
                                    ?>
                                    
                                    <?php
                                    if (IsOne(4))
                                    {
                                        $html = <<<_HTML_
                                        <h1 class="type h1_info" id="sjkf" onclick="w('jkf')"><a href="javascript:void(0)">文章管理</a></h1>
                                        <div id="jkf" style="display:none">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td><img src="images/menu_topline.gif" width="182" height="5" /></td>
                                                </tr>
                                            </table>
                                            <ul class="MM">
                                                <li><a href="/MCISP/bsman/Article/categoryManage.php" target="I2">类别管理</a></li>
                                                <li><a href="/MCISP/bsman/Article/articleManage.php" target="I2">文章管理</a></li>
                                                <li><a href="/MCISP/bsman/Article/articleAdd.php" target="I2">新增文章</a></li>
                                            </ul>
                                        </div> 
_HTML_;
                                        echo $html;
                                    }
                                    ?>
                                    
                                    <?php
                                    if (IsOne(5))
                                    {
                                        $html = <<<_HTML_
                                        <h1 class="type h1_info" id="sjkg" onclick="w('jkg')"><a href="javascript:void(0)">失物管理</a></h1>
                                        <div id="jkg" style="display:none">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td><img src="images/menu_topline.gif" width="182" height="5" /></td>
                                                </tr>
                                            </table>
                                            <ul class="MM">
                                                <li><a href="/MCISP/bsman/LostManage/lostIndex.php" target="I2">失物管理</a></li>
                                            </ul>
                                        </div> 
_HTML_;
                                        echo $html;
                                    }
                                    ?>
                                
								<script language="javascript" type="text/javascript">
                                 function w(vd)
                                 {
                                   var ob=document.getElementById(vd);
                                   if(ob.style.display=="block" || ob.style.display=="")
                                   {
                                   ob.style.display="none";
                                    var ob2=document.getElementById('s'+vd);
                                   }
                                 else
                                    {
                                    ob.style.display="block";
                                    var ob2=document.getElementById('s'+vd);
                                   }
                                }
                                 function k(vd)
                                {
                                 var ob=document.getElementById(vd);  
                                  if(ob.style.display=="block")
                                  {
                                 ob.style.display="none";
									var ob2=document.getElementById('s'+vd);
								}
									else
								{
									ob.style.display="block";
									var ob2=document.getElementById('s'+vd);
								}
							}
							</script>
								
                            </td>
                        </tr>
                    </table>
                </div>
                <div style="float:left;overflow:auto;" id="mainContent">
                    <iframe name="I2" id="mainFrame" height="100%" width="100%" border="0" frameborder="0" src="index.html">
                        浏览器不支持嵌入式框架，或被配置为不显示嵌入式框架。</iframe>
                </div>
            </div>
            <!-- 底部 -->
            <div style="position:fixed;bottom:-3px;height:8px;width:100%" id="botDiv">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="6" background="images/main_59.gif" style="line-height:6px;"><img src="images/main_59.gif" width="6" height="6" ></td>
                        <td background="images/main_61.gif" style="line-height:6px;">&nbsp;</td>
                        <td width="6" background="images/main_61.gif" style="line-height:6px;"><img src="images/main_62.gif" width="6" height="6" ></td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>
