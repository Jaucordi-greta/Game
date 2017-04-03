<?php
/**
 * Created by PhpStorm.
 * User: jaucordi
 * Date: 03/04/17
 * Time: 21:05
 */

namespace Game\Conf\MySQL;

use Game\Conf\DefaultConfiguration;
use Game\Game;
use PDO;
use PDOException;

class DefaultMySQLConfiguration{

	protected $root;
	protected $parent;
	protected $host     = 'localhost';
	protected $port     = 3306;
	protected $username = 'jaucordi';
	protected $password = '20Antoiness20';
	protected $database = 'jaucordi';

	public function __construct(Game $root, DefaultConfiguration $parent){
		$this->root   = $root;
		$this->parent = $parent;
	}

	public function getHost(){
		return $this->host;
	}

	public function setHost(string $host = null): DefaultMySQLConfiguration{
		if (is_null($host)){
			$host = 'localhost';
		}
		$this->host = $host;

		return $this;
	}

	public function getPort(){
		return $this->port;
	}

	public function setPort(int $port = null): DefaultMySQLConfiguration{
		if (is_null($port)){
			$port = 3306;
		}
		$this->port = $port;

		return $this;
	}

	public function getUsername(){
		return $this->username;
	}

	public function setUsername(string $name = null): DefaultMySQLConfiguration{
		if (is_null($name)){
			$name = 'root';
		}
		$this->username = $name;

		return $this;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword(string $pass = null): DefaultMySQLConfiguration{
		if (is_null($pass)){
			$pass = 'root';
		}
		$this->password = $pass;

		return $this;
	}

	public function getDatabase(){
		return $this->database;
	}

	public function setDatabase(string $db = null, bool $create = false): DefaultMySQLConfiguration{
		if (is_null($db)){
			$db = '';
		}
		$this->database = $db;

		if ($create){
			$this->createDatabase();
		}

		return $this;
	}

	private function createDatabase(){
		try{
			$pdo = new PDO("mysql:dbname={$this->database};host={$this->host}", $this->username, $this->password);
		}catch (PDOException $e){
			switch ($e->getCode()){
				case 1049:
					try{
						$pdo = new PDO("mysql:dbname={$this->database};host={$this->host}",
						               $this->root->getConf()->getSuperUser()->username,
						               $this->root->getConf()->getSuperUser()->password);
					}catch (PDOException $e){
						echo $e->getMessage();
						var_dump($e->getTrace());
					}
					break;
				default:
					echo $e->getMessage();
					var_dump($e->getTrace());
					break;
			}
		}
	}

	public function root(){
		return $this->root;
	}

	public function parent(){
		return $this->parent;
	}
}