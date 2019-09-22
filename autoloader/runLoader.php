<?php

require 'loadClasses.php';

spl_autoload_register('contractsLoader::dbContractLoader');

spl_autoload_register('databaseLoader::ociPdoLoader');
spl_autoload_register('databaseLoader::mysqlPdoLoader');

spl_autoload_register('SQLBuilderLoader::buildLoader');
spl_autoload_register('SQLBuilderLoader::crudLoader');
spl_autoload_register('SQLBuilderLoader::executorLoader');
