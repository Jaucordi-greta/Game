<?php
/**
 * Created by PhpStorm.
 * User: jaucordi
 * Date: 03/04/17
 * Time: 20:14
 */

namespace Game;

use Game\Conf\Configuration;
use Game\Conf\MySQL\MySQLConfiguration;

class Game{

	protected $conf;
	protected $winner;
	protected $players = [];

	public function __construct(Configuration $conf = null){
		if (!is_null($conf)){
			$this->conf = $conf;
		}else{
			$this->conf = new Configuration($this);
		}
	}

	public function getMySQLConf(): MySQLConfiguration{
		return $this->getConf()->getMySQLConf();
	}

	public function getConf(): Configuration{
		return $this->conf;
	}
}