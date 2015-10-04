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

// Rework tree array to string
function category_to_string($data){
    $string = '';
    foreach($data as $item){
        $string .= category_to_template($item);
    }
    return $string;
}

// Build like template
function category_to_template($category){
    ob_start();
    include 'category_template.php';
    return ob_get_clean();
}

// Breadcrumbs
function breadcrumbs($array, $id){
    if(!$id) return false;

    $count = count($array);
    $breadcrumbs_array = array();
    for($i=0; $i < $count; $i++){
        if($array[$id]){
            $breadcrumbs_array[$array[$id]['id']] = $array[$id]['title'];
            $id = $array[$id]['parent'];
        } else break;
    }
    return array_reverse($breadcrumbs_array, true);
}