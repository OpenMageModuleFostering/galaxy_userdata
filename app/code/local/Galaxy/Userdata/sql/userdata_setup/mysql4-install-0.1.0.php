<?php

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('userdata')};
CREATE TABLE {$this->getTable('userdata')} (
  `userdata_id` int(11) unsigned NOT NULL auto_increment,
  `firstname` varchar(255) NOT NULL default '',
  `lastname` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `UID` varchar(255) NOT NULL default '',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`userdata_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup(); 