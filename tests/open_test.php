<?php

	function open_test_valid(mixed $tests_log_file): bool
	{
		$valid = true;
		
		try {
			$door = new Door(DoorState::Open);
			$door->open();
			$state = $door->get_state();
			if ($state == DoorState::Open) {
				fwrite($tests_log_file, "✅ Calling open() on Open state.\n");
			}
			else {
				fwrite($tests_log_file, "❌ Calling open() on Open state. Expected value: Open. Returned value: {$state->name}\n");
				$valid = false;
			}
			unset($door);
		}
		catch (Exception $e) {
			fwrite($tests_log_file, "❌ Calling open() on Open state threw\n{$e->getMessage()}\n");
			$valid = false;
		}

		try {
			$door = new Door(DoorState::Closed);
			$door->open();
			$state = $door->get_state();
			if ($state == DoorState::Open) {
				fwrite($tests_log_file, "✅ Calling open() on Closed state.\n");
			}
			else {
				fwrite($tests_log_file, "❌ Calling open() on Closed state. Expected value: Open. Returned value: {$state->name}\n");
				$valid = false;
			}
			unset($door);
		}
		catch (Exception $e) {
			fwrite($tests_log_file, "❌ Calling open() on Lock state threw\n{$e->getMessage()}\n");
			$valid = false;
		}

		try {
			$door = new Door(DoorState::Locked);
			$door->open();
			$state = $door->get_state();
			if ($state == DoorState::Locked) {
				fwrite($tests_log_file, "✅ Calling open() on Locked state.\n");
			}
			else {
				fwrite($tests_log_file, "❌ Calling open() on Locked state. Expected value: Locked. Returned value: {$state->name}\n");
				$valid = false;
			}
			unset($door);
		}
		catch (Exception $e) {
			fwrite($tests_log_file, "❌ Calling open() on Locked state threw\n{$e->getMessage()}\n");
			$valid = false;
		}
		
		return $valid;
	}	

?>