<?php

	function unlock_test_valid(mixed $tests_log_file): bool
	{
		$valid = true;
		
		try {
			$door = new Door(DoorState::Open);
			$door->unlock();
			$state = $door->get_state();
			if ($state == DoorState::Open) {
				fwrite($tests_log_file, "✅ Calling unlock() on Open state.\n");
			}
			else {
				fwrite($tests_log_file, "❌ Calling unlock() on Open state. Expected value: Open. Returned value: {$state->name}\n");
				$valid = false;
			}
			unset($door);
		}
		catch (Exception $e) {
			fwrite($tests_log_file, "❌ Calling unlock() on Open state threw\n{$e->getMessage()}\n");
			$valid = false;
		}

		try {
			$door = new Door(DoorState::Closed);
			$door->unlock();
			$state = $door->get_state();
			if ($state == DoorState::Closed) {
				fwrite($tests_log_file, "✅ Calling unlock() on Closed state.\n");
			}
			else {
				fwrite($tests_log_file, "❌ Calling unlock() on Closed state. Expected value: Closed. Returned value: {$state->name}\n");
				$valid = false;
			}
			unset($door);
		}
		catch (Exception $e) {
			fwrite($tests_log_file, "❌ Calling unlock() on Lock state threw\n{$e->getMessage()}\n");
			$valid = false;
		}

		try {
			$door = new Door(DoorState::Locked);
			$door->unlock();
			$state = $door->get_state();
			if ($state == DoorState::Closed) {
				fwrite($tests_log_file, "✅ Calling unlock() on Locked state.\n");
			}
			else {
				fwrite($tests_log_file, "❌ Calling unlock() on Locked state. Expected value: Closed. Returned value: {$state->name}\n");
				$valid = false;
			}
			unset($door);
		}
		catch (Exception $e) {
			fwrite($tests_log_file, "❌ Calling unlock() on Locked state threw\n{$e->getMessage()}\n");
			$valid = false;
		}
		
		return $valid;
	}	
?>