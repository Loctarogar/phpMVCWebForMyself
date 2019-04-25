<?php

require 'rb-mysql.php';
$db = require '../config/config_db.php';
R::setup($db['dsn'], $db['user'],$db['pass'], $options);
var_dump(R::testConnection());

//Create
/**
$cat = R::dispense('category');
$cat->title = "Category 2";
$id = R::store($cat);
var_dump($id);
*/

//Read one
/**
$cat = R::load('category', 2);
print_r($cat);
 */

//Read all without conditions
/**
$cats = R::findAll('category');
foreach ($cats as $k => $v){
    echo $v['title'].'<br>';
}
*/

//Read all with condition 'where id > 2'
/**
$cats = R::findAll('category', 'id > ?', [1]);
foreach ($cats as $k => $v){
    echo $v['title'].'<br>';
}
*/
//Find one
$cat = R::findOne('category', 'id = 3');
echo $cat['title'];

//Update
/**
$cat = R::load('category', 2);
echo $cat->title.'<br>';
$cat->title = 'Category changed';
R::store($cat);
echo $cat->title;
 */

//Delete
/**
$cat = R::load('category', 2);
R::trash($cat);
*/