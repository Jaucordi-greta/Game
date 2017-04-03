<?php
/**
 * Created by PhpStorm.
 * User: jaucordi
 * Date: 03/04/17
 * Time: 20:08
 */

require_once '../vendor/autoload.php';

use Game\Game;

$game = new Game();
$game->getMySQLConf()->setUsername('jaucordi')->setPassword('antoines')->setDatabase('Game', true);