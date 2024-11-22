<?php

	function constructor_test_valid(mixed $tests_log_file): bool
	{
		$valid = true;
		foreach( DoorState::cases() as $state)
		{
			$current_valid = true;
			try {
				$door = new Door($state);
			} 
			catch (Exception $e) {
				fwrite($tests_log_file, "❌ Calling Door constructor with argument {$state->name} threw:\n{$e}\n");
				$valid = false;
				$current_valid = false;
			}
			
			if ($current_valid) {
				$result = $door->get_state();
				if ($result == $state) {
					fwrite($tests_log_file, "✅ Calling Door constructor with argument {$state->name}\n");
				}
				else {
					fwrite($tests_log_file, "❌ Calling Door constructor with argument {$state->name}. Expected value: {$state->name}. Returned value: {$result->name}\n");
					$valid = false;
				}
				unset($door);
			}
		}

		return $valid;
	}	

?>