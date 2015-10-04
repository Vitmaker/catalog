<?php
include 'config.php';
include 'function.php';

$categories = get_cat();
$categories_tree = map_tree($categories);
$categories_menu = category_to_string($categories_tree);

if(isset($_GET['category'])){
    $id = (int)$_GET['category'];

    $breadcrumbs_array = breadcrumbs($categories, $id);
    if($breadcrumbs_array){
        foreach($breadcrumbs_array as $key => $title){
            $breadcrumbs .= "<a href='?category={$key}'>{$title}</a> / ";
        }
        $breadcrumbs = rtrim($breadcrumbs, " / ");
        $breadcrumbs = preg_replace("#(.+)?<a.+>(.+)</a>$#", "$1$2", $breadcrumbs);
    } else{
        $breadcrumbs = "CATALOG";
    }
}