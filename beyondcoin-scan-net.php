#!/usr/bin/php
<?php

require("config.php");
require("global.php");

function sratio($n, $d) {
	return sprintf('%d/%d (%.2f%%)', $n, $d, 100*$n/$d);
}

try {
	connect_to_db();

	$time = floor(60 / ($CONFIG['SLEEP_BETWEEN_CONNECT'] / 1000000));

	if (!isset($argv[1]) || $argv[1] == "unchecked") {
		$result = query_unchecked();
		if (!empty($result)) {
			$result = init_results($result);
			$length = get_count_of_results($result);
			$i = 0;
			if ($i % $time == 0 && $length != 0)
				echo "Round 1/3: ".sratio($i, $length)."\n";
			$row = get_assoc_result_row($result);
			while (!empty($row)) {
				scan_node($row['ipv4'], $row['port']);
				usleep($CONFIG['SLEEP_BETWEEN_CONNECT']);
				$i++;
				if ($i % $time == 0)
					echo "Round 1/3: ".sratio($i, $length)."\n";
				$row = get_assoc_result_row($result);
			}
		}
	}

	if (!isset($argv[1]) || $argv[1] == "unaccepting") {
		$result = query_unaccepting();
		if (!empty($result)) {
			$result = init_results($result);
			$length = get_count_of_results($result);
			$i = 0;
			if ($i % $time == 0 && $length != 0)
				echo "Round 2/3: ".sratio($i, $length)."\n";
			$row = get_assoc_result_row($result);
			while (!empty($row)) {
				scan_node($row['ipv4'], $row['port']);
				usleep($CONFIG['SLEEP_BETWEEN_CONNECT']);
				$i++;
				if ($i % $time == 0)
					echo "Round 2/3: ".sratio($i, $length)."\n";
				$row = get_assoc_result_row($result);
			}
		}
		prune_nodes();
	}

	if (!isset($argv[1]) || $argv[1] == "accepting") {
		$result = query_accepting();
		if (!empty($result)) {
			$result = init_results($result);
			$length = get_count_of_results($result);
			$i = 0;
			if ($i % $time == 0 && $length != 0)
				echo "Round 3/3: ".sratio($i, $length)."\n";
			$row = get_assoc_result_row($result);
			while (!empty($row)) {
				scan_node($row['ipv4'], $row['port']);
				usleep($CONFIG['SLEEP_BETWEEN_CONNECT']);
				$i++;
				if ($i % $time == 0)
					echo "Round 3/3: ".sratio($i, $length)."\n";
				$row = get_assoc_result_row($result);
			}
		}
	}
} catch (Exception $e) {
	exit;
}
?>
