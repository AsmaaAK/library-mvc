<?php
spl_autoload_register(function($class){
    $prefix = 'App\\';
    if(strncmp($class, $prefix, strlen($prefix)) !== 0){
        return;
    }
    $relativeClass = str_replace('\\','/', substr($class, strlen($prefix)));
  
    $file = __DIR__ . '/app/' . $relativeClass . '.php'; 
    if(file_exists($file)){
        require $file;
    }
});
