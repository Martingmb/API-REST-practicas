<?php
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


?>