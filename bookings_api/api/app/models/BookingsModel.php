<?php

require_once dirname( __FILE__ ) . '/' . '../core/Database.php';

class Users extends Database {

	protected function register($firstName, $lastName, $phoneNumber, $email, $tableID, $restarauntID) {

		$this->prepare('INSERT INTO `bookings` (`firstName`, `lastName`, `phoneNumber`, `email`, `tableID`, `restarauntID`) VALUES (?, ?, ?, ?, ?, ?)');

		if ($this->statement->execute([$firstName, $lastName, $phoneNumber, $email, $tableID, $restarauntID])) {

			return true;

		} else {

			return false;

		}

	}

	protected function reqBookings() {

		$this->prepare('SELECT * FROM `bookings`');

		if ($this->statement->execute()) {

			$result = $this->statement->fetchAll();
			return $result;


		} else {

			return false;

		}

	}

	protected function login($username, $password)
	{
		$this->prepare('SELECT * FROM `staff` WHERE `username` = ?');
		$this->statement->execute([$username]);
		$row = $this->statement->fetch();

		if ($row) {

			$hashedPassword = $row->password;
			
			// If password is correct
			if (password_verify($password, $hashedPassword)) {
				
				return true;

			} else {

				return false;

			}

		}

	}

}