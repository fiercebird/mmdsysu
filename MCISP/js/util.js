
	function GetCampus(CampusID)
	{
		var res='';
		switch (parseInt(CampusID))
		{
			case 0:
				res='全部校区';
				break;
			case 10:
				res='东校区';
				break;
			case 20:
				res='南校区';
				break;
			case 30:
				res='北校区';
				break;
			case 40:
				res='珠海校区';
				break;
		}
		return res;
	};
	
	function BitIsOne(num,index) //检测第index位是否为1
	{
		var val = 1;
		val = val<<index;
		return (val & num); 
	}
	
	function SetOne(num,index) //设置第index位是否为1
	{
		var val = 1;
		val = val<<index;
		num= val | num;
		return num;
	}
	
	function GetAuthStr(Aut)
	{
		res='<span style=\'float:left;\'>&nbsp;超级管理员:';
		if(BitIsOne(Aut,0))
			res+='是&nbsp;';
		else
			res+='否&nbsp;';
		res+='用户管理:';
		if(BitIsOne(Aut,1))
			res+='是&nbsp;';
		else
			res+='否&nbsp;';
		res+='助理管理:';
		if(BitIsOne(Aut,2))
			res+='是&nbsp;';
		else
			res+='否&nbsp;';
		res+='设备管理:';
		if(BitIsOne(Aut,3))
			res+='是&nbsp;';
		else
			res+='否&nbsp;';
		res+='文章管理:';
		if(BitIsOne(Aut,4))
			res+='是&nbsp;';
		else
			res+='否&nbsp;';
		res+='失物招领:';
		if(BitIsOne(Aut,5))
			res+='是&nbsp;';
		else
			res+='否&nbsp;</span>';		
		return res;
	}
	
	function GetCheckboxFromAut(Aut)
	{
		
		var res='<span style=\'float:left;margin:5px 0px 3px 0px;\'>[前台权限] ';
	
		if( BitIsOne(Aut,1))
			res+='<input type="checkbox" name="AutUpd" value="1" checked=true/>用户管理&nbsp;';
		else
			res+='<input type="checkbox" name="AutUpd" value="1"/>用户管理&nbsp;';
		if( BitIsOne(Aut,2))
			res+='<input type="checkbox" name="AutUpd" value="2" checked=true/>助理管理&nbsp;';
		else
			res+='<input type="checkbox" name="AutUpd" value="2"/>助理管理&nbsp;';
		if( BitIsOne(Aut,3))
			res+='<input type="checkbox" name="AutUpd" value="3" checked=true/>设备管理&nbsp;';	
		else
			res+='<input type="checkbox" name="AutUpd" value="3"/>设备管理&nbsp;';
		if( BitIsOne(Aut,4))
			res+='<input type="checkbox" name="AutUpd" value="4" checked=true/>文章管理&nbsp;';
		else
			res+='<input type="checkbox" name="AutUpd" value="4" >文章管理&nbsp;';
		if( BitIsOne(Aut,5))
			res+='<input type="checkbox" name="AutUpd" value="5" checked=true/>失物管理&nbsp;';	
		else
			res+='<input type="checkbox" name="AutUpd" value="5" />失物管理&nbsp;';
		res+='</span><br /><span style=\'float:left;margin:3px 0px 5px 0px;\'>[设备权限] ';
		if( BitIsOne(Aut,16))
			res+='<input type="checkbox" name="AutUpd" value="16" checked=true/>检查登记&nbsp;';
		else
			res+='<input type="checkbox" name="AutUpd" value="16"/>检查登记&nbsp;';
		if( BitIsOne(Aut,17))
			res+='<input type="checkbox" name="AutUpd" value="17" checked=true/>查询统计&nbsp;';
		else
			res+='<input type="checkbox" name="AutUpd" value="17"/>查询统计&nbsp;';
		if( BitIsOne(Aut,18))
			res+='<input type="checkbox" name="AutUpd" value="18" checked=true/>数据操作&nbsp;';	
		else
			res+='<input type="checkbox" name="AutUpd" value="18"/>数据操作&nbsp;';
		if( BitIsOne(Aut,19))
			res+='<input type="checkbox" name="AutUpd" value="19" checked=true/>服务调查&nbsp;';
		else
			res+='<input type="checkbox" name="AutUpd" value="19" >服务调查&nbsp;';	
		if( BitIsOne(Aut,0))
			res+='<input type="checkbox" name="AutUpd" value="0" checked=true/>超级管理员&nbsp;</span>';
		else
			res+='<input type="checkbox" name="AutUpd" value="0" />超级管理员&nbsp;</span>';
		return res;
		
	}

