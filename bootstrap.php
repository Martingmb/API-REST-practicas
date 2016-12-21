<?php
require_once dirname(__FILE__) . '/vendor/autoload.php';

use Slim\Slim;
use API\Application;
use API\Middleware\TokenOverBasicAuth;
use Flynsarmy\SlimMonolog\Log\MonologWriter;

// App modo inicializacion 
if (empty($_ENV['SLIM_MODE'])) {
    $_ENV['SLIM_MODE'] = (getenv('SLIM_MODE'))
    ? getenv('SLIM_MODE') : 'development';
}

// Configuracion de inicializacion y carga del app
$config = array();

// Se encuentra el archivo que este nombrado <EnvName>.php 
//      y se guarda en $configFile
$configFile = dirname(__FILE__).'/share/config/'
    .$_ENV['SLIM_MODE'].'.php';

//Se puede acceder el archivo <EnvName>.php
if (is_readable($configFile)) {
//  Si se encuentra se carga $configFile
    require_once $configFile;
} else {
//  Si no se encuentra se carga default.php
    require_once dirname(__FILE__).'/share/config/default.php';
}

// Creacion de una nueva instancia de App
//      Se guarda la configuracion de Slim
//      en $config['app'], el cual es utilizado
//      para el constructor de nuestra App
$app = new API/Application($config['app']);

//Escribe el log de nuestra REST-API-practica
$log = $app->getLog();

//inicializacion de la base de datos 
try 
{
  if(!empty($config['db']))
  {
    \ORM::configure($config['db']['dsn']);
    if (!empty($confug['db']['username']) && !empty($config['db']['paswword']))
    {
      \ORM::configure('username',$config['db']['username']);
      \ORM::configure('password',$config['db']['password']);
    }
  } 
} catch (Exception $e) {
    $log->error($e->getMessage());
}
// Cache Middleware (inner)
$app->add(new API\Middleware\Cache('/api/v1'));
// Parses JSON body
$app->add(new \Slim\Middleware\ContentTypes());
// Manage Rate Limit
$app->add(new API\Middleware\RateLimit('/api/v1'));
// JSON Middleware
$app->add(new API\Middleware\JSON('/api/v1'));
// Auth Middleware (outer)
$app->add(new API\Middleware\TokenOverBasicAuth(array('root' => '/api/v1')));

?>