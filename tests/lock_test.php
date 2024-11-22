<?php

	function lock_test_valid(mixed $tests_log_file): bool
	{
		$valid = true;
		
		try {
			$door = new Door(DoorState::Open);
			$door->lock();
			$state = $door->get_state();
			if ($state == DoorState::Open) {
				fwrite($tests_log_file, "✅ Calling lock() on Open state.\n");
			}
			else {
				fwrite($tests_log_file, "❌ Calling lock() on Open state. Expected value: Open. Returned value: {$state->name}\n");
				$valid = false;
			}
			unset($door);
		}
		catch (Exception $e) {
			fwrite($tests_log_file, "❌ Calling lock() on Open state threw\n{$e->getMessage()}\n");
			$valid = false;
		}

		try {
			$door = new Door(DoorState::Closed);
			$door->lock();
			$state = $door->get_state();
			if ($state == DoorState::Locked) {
				fwrite($tests_log_file, "✅ Calling lock() on Closed state.\n");
			}
			else {
				fwrite($tests_log_file, "❌ Calling lock() on Closed state. Expected value: Locked. Returned value: {$state->name}\n");
				$valid = false;
			}
			unset($door);
		}
		catch (Exception $e) {
			fwrite($tests_log_file, "❌ Calling lock() on Lock state threw\n{$e->getMessage()}\n");
			$valid = false;
		}

		try {
			$door = new Door(DoorState::Locked);
			$door->lock();
			$state = $door->get_state();
			if ($state == DoorState::Locked) {
				fwrite($tests_log_file, "✅ Calling lock() on Locked state.\n");
			}
			else {
				fwrite($tests_log_file, "❌ Calling lock() on Locked state. Expected value: Locked. Returned value: {$state->name}\n");
				$valid = false;
			}
			unset($door);
		}
		catch (Exception $e) {
			fwrite($tests_log_file, "❌ Calling lock() on Locked state threw\n{$e->getMessage()}\n");
			$valid = false;
		}
		
		return $valid;
	}	

?>