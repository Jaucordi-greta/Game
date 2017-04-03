<?php
/**
 * Created by PhpStorm.
 * User: jaucordi
 * Date: 03/04/17
 * Time: 22:46
 */

namespace Game\Tools;

use function property_exists;
use function strtolower;

class Chainable{

	public function __get($key){
		if (!(strlen($key) > 3 && substr($key, 0, 3) === 'set')){
			return false;
		}

		if (property_exists($this, substr($key, 3))){
			return $this->$key;
		}else if (property_exists($this, strtolower(substr($key, 3)))){
			$key = strtolower($key);

			return $this->$key;
		}else{
			return false;
		}
	}
}