<?php

	include('Door.php');
    include('tests/constructor_test.php');
    include('tests/open_test.php');
    include('tests/close_test.php');
    include('tests/lock_test.php');
    include('tests/unlock_test.php');

	$tests_log_file = fopen("tests_log_" . time(), "w") or die("Unable to open file");

    $tests = array(
		'Constructor' => 'constructor_test_valid',
        'Open' => 'open_test_valid',
        'Close' => 'close_test_valid',
        'Lock' => 'lock_test_valid',
        'Unlock' => 'unlock_test_valid',
	);

	foreach($tests as $test_name => $test)
	{
        fwrite($tests_log_file, "--------------------------------------------\n");
        if (call_user_func($test, $tests_log_file) === true)
        {
            fwrite($tests_log_file, "--------------------------------------------\n");
			fwrite($tests_log_file, "OK: {$test_name} tests were successfully done !\n");
		} 
        else
        {
            fwrite($tests_log_file, "--------------------------------------------\n");
			fwrite($tests_log_file, "KO: {$test_name} tests failed...\n");
		}
		fwrite($tests_log_file, "============================================\n\n");
	}

	fclose($tests_log_file);

?>