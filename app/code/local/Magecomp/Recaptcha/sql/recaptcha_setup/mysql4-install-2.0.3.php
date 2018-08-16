<?php
$installer = $this;
$installer->startSetup();
$installer->run("
-- DROP TABLE IF EXISTS {$this->getTable('recaptcha')};
	CREATE TABLE {$this->getTable('recaptcha')} (
		`contact_id` int(11) unsigned NOT NULL auto_increment,
		`cname` varchar(255) NOT NULL default '',
		`cemail` varchar(255) NOT NULL default '',
		`cmobno` varchar(255) NOT NULL default '',
		`ccomment` varchar(255) NOT NULL default '',
		PRIMARY KEY (`contact_id`)
	  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	");
$installer->endSetup(); 