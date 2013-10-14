<?php

// require RedBean
require_once('rb.php');

// require the plugin
require_once('RedBeanMysqlBackup.php');


R::setup('mysql:host=localhost;dbname=redbeandemo',
         'root','');


// create some demo tables and entries
for($i = 0; $i < 10; $i++) {
  $user = R::dispense("user");
  $user->name = "User " . $i;
  $user->comment = ($i % 2) ? "Some comments" : "";
  $user->created = date("Y-m-d");
  R::store($user);

  $hobby = R::dispense("hobby");
  $hobby->title = "Hobby " . $i;
  R::store($hobby);

  $user->sharedHobby[] = $hobby;

  R::store($user);
}

/* INFO
 * before creating backups to a given folder ensure
 * this folder is created manually and permissions are granted to create
 * files via php
 */

// create backup with auto name into folder backup
R::performMysqlBackup("backup");

// create custom named backup
R::performMysqlBackup("backup", "MyFullBackup.sql");
