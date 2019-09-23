<?php

/*
$CONFIG['MYSQL_HOST']			     = "localhost";
$CONFIG['MYSQL_USER']			     = "beyondcoin";
$CONFIG['MYSQL_PASS']			     = "pass";
$CONFIG['MYSQL_BEYONDCOIN_DB']	     = "beyondcoin";
$CONFIG['MYSQL_BEYONDCOIN_TABLE']    = "nodes";
$CONFIG['MYSQL_PDNS_DB']		     = "powerdns";
$CONFIG['MYSQL_PDNS_RECORDS_TABLE']	 = "records";
$CONFIG['PDNS_DOMAIN_ID']		     = "2";
*/

$CONFIG['SQLITE_FILE']			 = "litecoin.sqlite";
$CONFIG['BIND_HEADER_FILE']		 = "./db.dnsseed.litecoin.bit.header";
$CONFIG['BIND_RECORD_FILE']		 = "./db.dnsseed.litecoin.bit";

$CONFIG['DOMAIN_NAME']			 = "dnsseed.litecoin.bit";
$CONFIG['RECORD_TTL']			 = "60";

// The minimum version to be added to the DNS database
$CONFIG['MIN_VERSION']			 = 70002;
// List of subversions to be added to the DNS database
$CONFIG['SUBVERSIONS']			 = "('/Satoshi:0.8.5.1/', '/Satoshi:0.8.5.2/', '/Satoshi:0.8.5.3/', '/Satoshi:0.8.6.1/')";
// Timeout to connect to nodes
$CONFIG['CONNECT_TIMEOUT']		 = 2;
// Rate at which nodes which do not accept incoming connections are rechecked (seconds)
$CONFIG['UNACCEP_CHECK_RATE']		 = 36 * 60 * 60;
// Minimum age of nodes before they will be rechecked if they go down
// 0 will check even if the node has never been up, any other value requires the node to have been up at some point
$CONFIG['MIN_UP_TIME_TO_CHECK']          = 7 * 24 * 60 * 60;
// Time since last seen nodes which do not accept incoming connections are removed (seconds)
$CONFIG['PURGE_AGE']			 = 48 * 60 * 60;
// Rate at which nodes which do accept incoming connections are rechecked (seconds)
$CONFIG['ACCEP_CHECK_RATE']		 = 4 * 60 * 60;
// Sleep time between launching each new attempt to connect to a node (microseconds)
$CONFIG['SLEEP_BETWEEN_CONNECT']	 = 500 * 1000;
// Maximum age of nodes given to us put in database (age in seconds)
$CONFIG['MIN_LAST_SEEN']		 = 24 * 60 * 60;

?>
