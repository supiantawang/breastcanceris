<?php

if (!function_exists('my_custom_function')) {
    function my_custom_function($arg)
    {
        // Your custom function logic here
        return "Hello, " . $arg . "!";
    }
}


function getData($required, $table, $column, $cond_id)
{
    $db = \Config\Database::connect();

    $builder = $db->table($table);
    if ($column != "")
        $builder->where($column, $cond_id);

    $query = $builder->get();

    if ($query->getNumRows() > 0) {
        $row = $query->getRow();

        return $row->$required;
    } else {
        return "no data";
    }
}

function getDataResult($table, $cond, $like, $order)
{

    $db = \Config\Database::connect();

    $builder = $db->table($table);

    foreach ($cond as $cnd) {
        if (count($cnd) > 1)
            $builder->where($cnd[0], $cnd[1]);
        else
            $builder->where($cnd[0]);
    }

    if ($like)
        $builder->like($like[0], $like[1]);

    $result = $builder->orderBy($order[0], $order[1]);

    $query = $builder->get();

    $row = $query->getResult();

    return $row;
}
function getDataCount($table, $cond = [''], $like = [''], $or = array())
{
    $db = \Config\Database::connect();

    $builder = $db->table($table);
    if ($cond) {
        $i = 0;
        foreach ($cond as $cnd) {
            if (count($cond) > 1)
                $builder->where($cnd[0], $cnd[1]);
            else
                $builder->where($cnd[0]);

            //echo count($or);
            if (count($or) > 0) {
                if (count($or[$i]))
                    $builder->orWhere($or[$i][0], $or[$i][1]);
            }
            $i++;
        }
    }

    if ($like) {
        foreach ($like as $l) {
            $builder->like($l[0], $l[1]);
        }
    }
    $builder->countAllResults();
    $query = $builder->get();

    //print_r($result);exit;
    return $query;
}
function getUri()
{
}
