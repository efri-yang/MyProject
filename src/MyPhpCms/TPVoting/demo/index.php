<?php

function parseName($name, $type = 0, $ucfirst = true) {
	if ($type) {
		$name = preg_replace_callback('/_([a-zA-Z])/', function ($match) {
			return strtoupper($match[1]);
		}, $name);
		return $ucfirst ? ucfirst($name) : lcfirst($name);
	} else {
		return strtolower(trim(preg_replace("/[A-Z]/", "_\\0", $name), "_"));
	}
}
echo parseName("test_m_age", 1);
?>