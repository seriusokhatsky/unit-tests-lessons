<?php

namespace App\Libraries;

class Calculator {

	public function add($a, $b) {
		if(!is_numeric($a) || !is_numeric($b)) {
			throw new \InvalidArgumentException;
		}
		return $a + $b;
	}

} 

?>