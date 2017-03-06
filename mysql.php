/**
 * @author HappyUncle <15822775539@163.com>
 * @link http://weibo.com/kathelinhappy
 * @since 0.1 2017年3月6日15:16:52
 * @copyright GPL 
 */
<?php 

function mysql_con(){

	static $conn = null;

	if($conn == null){

		$config = require('./config.php');

		$conn = mysql_connect($config['host'] , $config['user'] , $config['pwd']);

		if( !$conn ){
			echo 'mysql数据库连接失败'; exit; 
		}

		mysql_query('use ' . $config['db'] , $conn);
		mysql_query('set names ' . $config['charset'] , $conn);
	}

	return $conn;
}


function insertData($nickname , $content){

	$str = " insert into chat_log(nickname , content , sendtime) values('" . $nickname . "','" . $content  . "'," . time() . ")";

	if( mysql_query($str , mysql_con()) ){
		echo '数据发送成功'; return;
	}else{
		mysql_error();
		echo '数据发送失败'; return;
	}
}

function getData(){
	
	$str = 'select nickname , content , sendtime from chat_log order by sendtime desc limit 0 , 10';
	$rows = mysql_query($str , mysql_con());

	if( $rows ){
		$data = array();
		while($row = mysql_fetch_assoc($rows)) {
			$data[] = $row;
		}

		$str = "";
		foreach ($data as $key => $value) {
			$str = $str."<ul><li><span style=\"font-weight:bold;color:red;\">".$value['nickname']."</span></li>&nbsp;&nbsp;<li>".date("Y-m-d  H:i:s",$value['sendtime'])."</li>&nbsp;&nbsp;<li>".$value['content']."</li></ul>";
		}
		echo $str;
		return $str;
	}else{
		mysql_error();
		return '数据查询失败'; 
	}
}

