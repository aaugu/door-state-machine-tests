<?php

	function close_test_valid(mixed $tests_log_file): bool
	{
		$valid = true;
		
		try {
			$door = new Door(DoorState::Open);
			$door->close();
			$state = $door->get_state();
			if ($state == DoorState::Closed) {
				fwrite($tests_log_file, "✅ Calling close() on Open state.\n");
			}
			else {
				fwrite($tests_log_file, "❌ Calling close() on Open state. Expected value: Closed. Returned value: {$state->name}\n");
				$valid = false;
			}
			unset($door);
		}
		catch (Exception $e) {
			fwrite($tests_log_file, "❌ Calling close() on Open state threw\n{$e->getMessage()}\n");
			$valid = false;
		}

		try {
			$door = new Door(DoorState::Closed);
			$door->close();
			$state = $door->get_state();
			if ($state == DoorState::Closed) {
				fwrite($tests_log_file, "✅ Calling close() on Closed state.\n");
			}
			else {
				fwrite($tests_log_file, "❌ Calling close() on Closed state. Expected value: Closed. Returned value: {$state->name}\n");
				$valid = false;
			}
			unset($door);
		}
		catch (Exception $e) {
			fwrite($tests_log_file, "❌ Calling close() on Lock state threw\n{$e->getMessage()}\n");
			$valid = false;
		}

		try {
			$door = new Door(DoorState::Locked);
			$door->close();
			$state = $door->get_state();
			if ($state == DoorState::Locked) {
				fwrite($tests_log_file, "✅ Calling close() on Locked state.\n");
			}
			else {
				fwrite($tests_log_file, "❌ Calling close() on Locked state. Expected value: Locked. Returned value: {$state->name}\n");
				$valid = false;
			}
			unset($door);
		}
		catch (Exception $e) {
			fwrite($tests_log_file, "❌ Calling close() on Locked state threw\n{$e->getMessage()}\n");
			$valid = false;
		}
		
		return $valid;
	}	


?>