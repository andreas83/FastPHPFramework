<?php

/**
 * Auto loader
 * @param string $className
 * @return bool
 */
function autoload( $className )
{

    $class = "app/model/".$className . ".php";
    if ( file_exists($class) )
    {
        return require_once ($class);
    }

    $class= "app/controller/".$className.".php";

    if ( file_exists($class) )
    {
        return require_once ($class);
    }

    $class = "app/lib/" . ($className) . ".php";
    if ( file_exists($class) )
    {
        return require_once ($class);
    }
    
    $class = "app/lib/database/" . str_replace("_", "/", strtolower($className)) . ".php";
    
    if ( file_exists($class) )
    {
        return require_once ($class);
    }
    
    if($className=="PHPMailer")
    {
        return require_once ("app/lib/PHPMailer/class.phpmailer.php");
    }

    return false;
}

spl_autoload_register("autoload");