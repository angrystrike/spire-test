<?php

function escape($string)
{
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

function autoload($class_name)
{
    if (is_file('core/' . $class_name . '.php'))
    {
        require_once 'core/' . $class_name . '.php';
    }
    else if
    (is_file('models/' . $class_name . '.php'))
    {
        require_once 'models/' . $class_name . '.php';
    }
}

function cleaner($string)
{
    return ucfirst(preg_replace('/_/', ' ', $string));
}

function appName()
{
    echo Config::get('app/name');
}


