<?php
private static function deleteData($request_data)
{
	$class id = (int)$request_data['class'];
	if ($class_id == 0) {
		return false;
	}
	unset(self::$test_class[$class_id]);
	return self::$test_class;
	}
}