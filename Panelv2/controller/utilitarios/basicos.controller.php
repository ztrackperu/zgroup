<?php
class BasicosController{
  public static function array_utf8_encode($dat){
		if (is_string($dat))
			return utf8_encode($dat);
		if (!is_array($dat))
			return $dat;
		$ret = array();
		foreach ($dat as $i => $d)
			$ret[$i] = self::array_utf8_encode($d);
		return $ret;
	}
	public static function array_extract_sub_array($array, $key, $value){
		$result = [];
		foreach($array as $a){
			if(isset($a[$key]) && $a[$key] == $value){
				$result[] = $a;
			}
		}
		return $result;
	}  
}
?>