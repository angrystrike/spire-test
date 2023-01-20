<?php

function escape($string)
{
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

function encodeURIComponent($string)
{
    $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
    return strtr(rawurlencode($string), $revert);
}

function autoload($class_name)
{
    // echo(is_file('core/' . $class_name . '.php'));
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

function array_walk_keys($array, $parentKey = null, &$flattened_array = null)
{
    if(!is_array($array))
        return $array;
    
    foreach( $array as $key => $val ) {
        $flattenedKeysArray[] = $key;
        
        if(is_array($val))
            array_walk_keys($val, $key, $flattenedKeysArray);
    }

    return $flattenedKeysArray;
}


