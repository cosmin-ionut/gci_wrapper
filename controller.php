<?php

require 'autoloader\runLoader.php';

use pdo\mysql\database as DB;

$hello = new buildSql(DB::get_instance());

echo "<pre>". "Hello";
// $hello->insert('BOOK1',['NUME'=>'does it work','EMAIL'=>'idk'])->go();
//$hello->insert('accounts', ['username' => 'marcelica'])->go();
$hello->select('book1')->go();
// $hello->select('accounts')->go();
//$hello->insert('iteststuff', ['name' =>'aloha','surname' =>'bastards'])->go();
//$hello->select('iteststuff',['name','killer'])->where(['name'=>'aloha', 'surname' => 'bastards'])->go();
//$hello->update('iteststuff',['killer' => 'nope'])->where(['name' => 'test'])->go();
//$hello->delete('iteststuff')->where(['name' => 'aloha'])->go();
//$hello->update('book1',['email' => 'yup'])->where(['nume' => 'does it work'])->go();
// $hello->select('book1')->not(['nume'=>['does it work','MARCELICA','Aragorn']])->order(['nume', 'DESC'])->go();
//$hello->select('book1')->where(['nume'=>'marcelica'])->or(['email'=>'bossu@lotr.net', 'nume'=>['does it work','MARCELICA']])->order(['nume', 'DESC'])->go();
//$hello->select('book1')->where(['nume' => '%does%'])->go();
//$hello->update('accounts',['username' => 'cosmin'])->go();
// $hello->select('book1')->where(['nume' => '%joc%'])->go();

/*
Please note that this is a controller file, not the index. In a real project using an MVC design, this would be the controller file
Also note that the require line would probably best be used in the view file, not here. Since this repo has no VIEW file, well, here it is.
*/