<?php 
include_once 'DbConfig.php';


class misdb{
	private $host;
	private $user;
	private $pwd;
	private $database;
	private $conn;
	
	function __construct($_host = HostName, $_user = UserName, $_pwd = Password, $_db = DbName)
	{
		$this->host = $_host;
		$this->user = $_user;
		$this->pwd = $_pwd;
		$this->database = $_db;
	}
	
	function DbConnect()
	{
		$this->conn = mysql_connect($this->host, $this->user, $this->pwd);
		if (!$this->conn)
		{
		  die('Could not connect : ' . mysql_error());
		}
		$dbSel = mysql_select_db($this->database, $this->conn);
		if (!$dbSel)
		{
			die ("Can\'t select misdb : " . mysql_error());
		}
		mysql_query("set names utf8");
	}
	
	function DbClose()
	{
		mysql_close($this->conn);
	}
	
	function DbQuery($sql)
	{
		$res = mysql_query($sql);
		// if (!$res)
		// {
			// die ("Can\'t execute sql at misdb : " . mysql_error());
		// }else{
			// return $res;
		// }
		return $res;
	}
	
	function DbLimitQuery($sql,$offset,$rows)
	{
		$sql=$sql . ' limit ' . $offset . ',' . $rows;
		$res = mysql_query($sql);
		if (!$res)
		{
			die ("Can\'t execute limit sql at misdb : " . mysql_error());
		}else{
			return $res;
		}
	}
	
	function DbResult($res)
	{
		return mysql_fetch_array($res);
	}
	function DbFetchAssoc($res)
	{
		return mysql_fetch_assoc($res);
	}
	function DbSqlRes($sql)
	{
		$res = mysql_query($sql);
		return mysql_fetch_array($res);
	}	
	
	function DbFree($res)
	{
		return mysql_free_result($res);
	}
	
	function DbInsId()
	{
		return mysql_insert_id();
	}
	
	function DbRowNum($connid)
	{
		return mysql_num_rows($connid);
	}
	
	
}


//每页都访问服务器取数据的分页类，适合单页数据量比较大的分类需求。。
//如果所有页面的数据量比较小，不建议用此方法，延时比较大，建议直接一次发给用户的浏览器端，从而在浏览器端实现分页
class Pager
{
	public	$PageSize;            // 每页的数量 
	public	$CurrentPageID;       //当前的页数 
	public	$NextPageID;         //下一页 
	public	$PreviousPageID;      //上一页 
	public	$PageNums;           //总页数 
	public	$ItemNums;           //总记录数 
	public	$isFirstPage;          //是否第一页 
	public	$isLastPage;         //是否最后一页 
	public	$sql;                //sql查询语句
	
	
	function __construct($option) { 
		global $dbs; //全局对象，在调用Pager类的外部有个数据库连接类命名为dbs
		$this->_setOptions($option); 
		if ( !isset($this->ItemNums) ) {  //当ItemNums没被设置时，才设置sql查询结果集的总条数，		

			$res=$dbs->DbQuery($this->sql);
			$this->ItemNums =$dbs->DbRowNum($res);
			$dbs->DbFree($res);
		}
        
		if ( $this->ItemNums > 0 ) {  //  设置总页数 
			if ( $this->ItemNums < $this->PageSize ) { $this->PageNums = 1; } //记录数小于单页容量，则只有一页
			if ( $this->ItemNums % $this->PageSize ) { //记录数取模单页容量有余数的话，则总页数要加1
				$this->PageNums= (int)($this->ItemNums / $this->PageSize) + 1; 
			} else { 
				$this->PageNums = $this->ItemNums / $this->PageSize; 
			} 
		} else { 
			$this->PageNums = 0; 
		} 
        
		switch ( $this->CurrentPageID ) {  //设置是否是第一页或者是最后一页
			case $this->PageNums == 1:   //当前总页数只有一页
				$this->isFirstPage = true; 
				$this->isLastPage = true; 
				break; 
			case 1: 
				$this->isFirstPage = true; 
				$this->isLastPage = false; 
				break; 
			case $this->PageNums: 
				$this->isFirstPage = false; 
				$this->isLastPage = true; 
				break; 
			default: //中间页
				$this->isFirstPage = false; 
				$this->isLastPage = false; 
		} 
        
		if ( $this->PageNums > 1 ) { //如果总页数大于1
			if ( !$this->isLastPage ) { //当前页不是最后一页  
				$this->NextPageID = $this->CurrentPageID + 1;   
			} 
			if ( !$this->isFirstPage ) { //当前页不是最前一页  
				$this->PreviousPageID = $this->CurrentPageID - 1;   
			} 
		}
		return true; 
	}

	/** 
    *  返回结果集的数据库连接 
    *  在结果集比较大的时候可以直接使用这个方法获得数据库连接，然后在类之外遍历，这样开销较小 
    *  如果结果集不是很大，可以直接使用 getPageData的方式获取二维数组格式的结果 
    * getPageData 方法也是调用本方法来获取结果的 
    ***/

	// public function getDataLink() { 
		// if ( $this->ItemNums ) { //如果总记录数不为0
			// global $db; 
			// $PageID = $this->CurrentPageID;     
			// $from = ($PageID - 1)*$this->PageSize; 
			// $count = $this->PageSize; //  使用 Pear DB::limitQuery 方法保证数据库兼容性 
			// $link = $db->limitQuery($this->sql, $from, $count);                
			// return $link; 
		// } else { 
			// return false; 
		// } 
	// } 
	
    // public function getPageData() { 
		// if ( $this->ItemNums ) { //如果总记录数不为0
			// if ( $res = $this->getDataLink() ) {        
				// if ( $res->numRows() ) { 
					// while ( $row = $res->fetchRow() ) { 
					   // $result[] = $row; 
					// } 
				// } else { 
					// $result = array(); 
				// } 
				// return $result; 
			// } else { 
			   // return false; 
			// } 
		// } else { 
		   // return false; 
		// } 
	// }
	
				
	
	public function getDataLink() { //返回指定范围内的记录集的资源ID，要求在外部已经连接好数据库了
		if ( $this->ItemNums ) { //如果总记录数不为0
			global $dbs; 
			$PageID = $this->CurrentPageID;     
			$from = ($PageID - 1)*$this->PageSize; 
			$count = $this->PageSize; //  使用 Pear DB::limitQuery 方法保证数据库兼容性 
			$link = $dbs->DbLimitQuery($this->sql, $from, $count);  			
			return $link; 
		} else { 
			return false; 
		} 
	} 
	/*** 
	*  以二维数组的格式返回结果集 
		$dbs=new misdb();
			$dbs->DbConnect();
			$res=$dbs->DbQuery($this->sql);
			$this->ItemNums =$dbs->DbRowNum($res);
			$dbs->DbFree($res);
			$dbs->DbClose();
			
		$res=$dbs->DbQuery($this->sql);
			$this->ItemNums =$dbs->DbRowNum($res);
			$dbs->DbFree($res);
	***/ 
    
	public function getPageData() { 
		global $dbs; 
		if ( $this->ItemNums ) { //如果总记录数不为0
			$PageID = $this->CurrentPageID;     
			$from = ($PageID - 1)*$this->PageSize; 
			$count = $this->PageSize; //  使用 Pear DB::limitQuery 方法保证数据库兼容性 
			$res = $dbs->DbLimitQuery($this->sql, $from, $count);  	
			if ( $dbs->DbRowNum($res) ) { //如果结果集记录数不为0 
				while ( $row =$dbs->DbResult($res) ) { //循环把结果集复制到result中
				   $result[] = $row; 
				} 
			} else { 
				$result = array(); 
			} 
			$dbs->DbFree($res);
			return $result; 
		} else { 
		   return false; 
		} 
	} 
		
	private function _setOptions($option) { 
		$allow_options = array( 
			'PageSize', 
			'CurrentPageID', 
			'sql', 
			'ItemNums' 
		); 
		foreach ( $option as $key => $value ) { 
			if ( in_array($key,  $allow_options) && ($value != null) ) { 
			   $this->$key = $value; 
			} 
		} 
		return true; 
	} 
}
	
?>