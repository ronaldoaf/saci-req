<?php
namespace Saci;

class ArrayJSON extends ArrayObject	
{
	function __toString()
	{
		return(json_encode($this->getArrayCopy() )  );
	}		
}


class DB
{

	static $pdo;
	
	static function connect($db,$user,$pass)
	{
		self::$pdo=new PDO($db,$user,$pass);
	
	}
	static function query($sql)
	{
		foreach( self::$pdo->query($sql)  as $row) $out[]=$row;
		
		return( New ArrayJSON($out) );
	}
	
	
}


?>
