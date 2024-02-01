<?php
function empties (...$fields)
{
    $result = true;
    foreach($fields as $field)
    {
        if(!empty($field))
        {
            return $result = false;
        }
    }
    return $result;
}

function getURLParameter($parameter)
{
    return (!empty($_GET[$parameter])) ? $_GET[$parameter] : '';
}