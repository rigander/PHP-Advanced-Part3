<?php
error_reporting(0);
require "../news/NewsDB.class.php";
class NewsService extends NewsDB{
	/* Метод возвращает новость по её идентификатору */
	function getNewsById($id){
		try{
			$sql = "SELECT id, title, 
					(SELECT name FROM category WHERE category.id=msgs.category) as category, description, source, datetime 
					FROM msgs
					WHERE id = $id";
			$result = $this->db->query($sql);
			//var_dump($result);
			if (!is_object($result)) 
				throw new Exception($this->db->lastErrorMsg());
			return $this->db2Arr($result);
		}catch(Exception $e){
			return $e->getMessage();
		}
	}
	function xmlRpcGetNewsById($method_name, $args, $extra) {
		if (!is_array($args) || count($args) <> 1)
			return array('faultCode'=>-3, 'faultString'=>'Неверное количество параметров!');
		$id = $args[0];
		$result = $this->getNewsById($id);
		if(!is_array($result))
			return array('faultCode'=>-2, 'faultString'=>"Ошибка: $result!");
		elseif(empty($result))	
			return array('faultCode'=>-1, 'faultString'=>"Новость с идентификатором $id отсутствует!");
		else
			return base64_encode(serialize($result));
		}
}
?>