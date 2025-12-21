<?php

class Config {

    private static $env = null;

    private static function loadEnv(){

        if(self::$env !== null){
            return;
        }

        self::$env = [];

        $path = __DIR__ . '/../.env';

        if(!file_exists($path)){
            return;
        }

        $file = file($path);

        foreach($file as $line){

            $line = trim($line);

            if(!$line || $line[0] == '#') continue;

            if(strpos($line, '=') === false) continue;

            list($name, $value) = explode('=', $line, 2);

            $name  = trim($name);
            $value = trim($value);

            self::$env[$name] = $value;
        }
    }

    public static function env($key){

        self::loadEnv();

        return self::$env[$key] ?? null;
    }

    public static function base_url(){
        return self::env('BASE_URL');
    }
}
