<?php

// Useful print of array
function print_arr($arr){
    echo "<pre>".print_r($arr, true)."</pre>";
}

// Get catalog of production
function get_cat(){
    global $connection;
    $query = "SELECT * FROM categories";
    $res = mysqli_query($connection, $query);

    $arr_cat = array();
    while($row = mysqli_fetch_assoc($res)){
        $arr_cat[$row['id']] = $row;
    }
    return $arr_cat;
}

// Building a tree of array
function map_tree($category){
    $tree = array();
    foreach($category as $id => &$node){
        if(!$node['parent']){
            $tree[$id] = &$node;
        } else{
            $category[$node['parent']]['childs'][$id] = &$node;
        }
    }
    return $tree;
}

//
function category_to_string($data){
    $string = '';
    foreach($data as $item){
        $string .= category_to_template($item);
    }
    return $string;
}

//
function category_to_template($category){
    ob_start();
    include 'category_template.php';
    return ob_get_clean();
}