<?php
/**
 * Created by PhpStorm.
 * User: jaucordi
 * Date: 03/04/17
 * Time: 20:33
 */

namespace Game\Conf;

use Game\Conf\MySQL\MySQLConfiguration;
use Game\Game;

class DefaultConfiguration{

	protected $root;
	protected $MySQL;
	protected $superuser
		= ['username' => 'root',
		   'password' => 'root'];

	public function __construct(Game $root){
		$this->root  = $root;
		$this->MySQL = new MySQLConfiguration($this->root, $this);
	}

	public function setMySQLConf(MySQLConfiguration $conf = null): Configuration{
		if (is_null($conf)){
			$conf = new MySQLConfiguration($this->root, $this);
		}

		$this->MySQL = $conf;

		return $this;
	}

	public function getMySQLConf(): MySQLConfiguration{
		return $this->MySQL;
	}

	public function getSuperUser(){
		return (Object)$this->superuser;
	}
}