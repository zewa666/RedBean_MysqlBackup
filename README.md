RedBean_MysqlBackup
=======================

This is a plugin for the [RedBeanPHP ORM](http://www.redbeanphp.com/), which
will create Backup files for a MySql DB Server. This module explicitly only supports MySql
and will throw an Exception if used with another DSN.

The backup file is created by using RedBeans connected DSN information along-side
queries against the database to get the schema and values.

!IMPORTANT!
This module will only export tables and nothing else.
If you need something more sophisticated I'd recommend using the [mysqldump script](http://dev.mysql.com/doc/refman/5.1/en/mysqldump.html)
provided by MySql itself.
The idea of this script is to quickly get a backups of the structure+data solely.
So to make it clear:

This plugin will not export:
- Triggers
- Views
- Stored Procedures
- UDF's
- etc.

really only Tables :)

!PRODUCTION USE NOTICE!
I'm not going to garantuee for anything, so please don't rely 100% on this code before
testing it on your own Database. At least for me it works :)

Preqrequisites:
=======================
- PHP >= 5.3
- Mysql >= whatever version
- RedBean >= 3.5 (there is a dependency on the Dynamic Plugin R::ext() method)

Usage:
=======================

Usage is quite simply since the use of R::ext() in RedBean 3.5.

```php
   // create backup-file with auto name into folder backup
  R::performMysqlBackup("backup");

  // create custom named backup-file into folder backup
  R::performMysqlBackup("backup", "MyFullBackup.sql");
```

Example:
=======================

Take a look at the included example.php. The RedBean verion in this repo is the all-in-one build 3.5
