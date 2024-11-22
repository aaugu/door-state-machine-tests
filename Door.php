<?php

	enum DoorState
	{
		case Open;
		case Closed;
		case Locked;
	}

	class Door
	{
		private	DoorState $_state;

		public function __construct(DoorState $state)
		{
			$this->_state = $state;
		}

		public function open() {
			switch($this->_state) {
				case DoorState::Open:
					echo "Cannot open a door that is already open\n";
					break;
				case DoorState::Closed:
					$this->_state = DoorState::Open;
					echo "Door successfully opened!\n";
					break;
				case DoorState::Locked:
					echo "Cannot open a door that is locked\n";
					break;
				default:
					throw new Exception("Unknown status of the door.\n");
			}

		}

		public function close() {
			switch($this->_state) {
				case DoorState::Open:
					$this->_state = DoorState::Closed;
					echo "Door successfully closed!\n";
					break;
				case DoorState::Closed:
					echo "Cannot close a door that is already closed\n";
					break;
				case DoorState::Locked:
					echo "Cannot close a door that is already closed\n";
					break;
				default:
					throw new Exception("Unknown status of the door.\n");
			}
		}

		public function lock() {
			switch($this->_state) {
				case DoorState::Open:
					echo "Cannot lock a door that is open\n";
					break;
				case DoorState::Closed:
					$this->_state = DoorState::Locked;
					echo "Door successfully locked!\n";
					break;
				case DoorState::Locked:
					echo "Cannot lock a door that is already locked\n";
					break;
				default:
					throw new Exception("Unknown status of the door.\n");
			}
		}

		public function unlock() {
			switch($this->_state) {
				case DoorState::Open:
					echo "Cannot unlock a door that is open\n";
					break;
				case DoorState::Closed:
					echo "Cannot unlock a door that is already ope\n";
					break;
				case DoorState::Locked:
					$this->_state = DoorState::Closed;
					echo "Door successfully unlocked!\n";
					break;
				default:
					throw new Exception("Unknown status of the door.\n");
			}
		}

		public function get_state() {
			return $this->_state;
		}

		public function __destruct()
		{
			echo "Destruct door final state {$this->_state->name}\n";
		}
	}

	
?>

