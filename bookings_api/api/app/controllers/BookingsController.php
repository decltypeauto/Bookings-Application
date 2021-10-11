<?php

require_once dirname( __FILE__ ) . '/' . '../models/BookingsModel.php';


class UserController extends Users {


    public function test($firstName, $lastName, $phoneNumber, $email, $tableID, $restarauntID) {

        $stringValidation = "/^[a-zA-Z0-9]*$/";
        if (empty($firstName) || empty($lastName) || empty($phoneNumber) || empty($email) || empty($tableID) || empty($restarauntID))
        {
            return 'Missing an argument!';
        } else if (is_numeric($firstName) || is_numeric($lastName) || is_numeric($email))
        {
            return "Names nor' Emails can't be numeric!";
        } else if (!is_numeric($phoneNumber))
        {
            return 'Phone Number must only be numeric!';
        } else if (!is_numeric($tableID))
        {
            return 'Table Number must only be numeric!';
        }else if (!is_numeric($restarauntID))
        {
            return 'Restaraunt ID\'s must only be numeric!';
        } else if (!preg_match($stringValidation, $firstName))
        {
            return 'The customers name must only contain alphanumericals!';
        } else if (!preg_match($stringValidation, $lastName))
        {
            return 'The customers name must only contain alphanumericals!';
        }

        else {
        $result = $this->register($firstName, $lastName, $phoneNumber, $email, $tableID, $restarauntID);

			// Session start
			if ($result) {
                return 'Success!';
				//Util::redirect('/login.php');

			} else {

				return 'Something went wrong.';
				
		    }
        }
    }

    public function test2($username, $password) {
        $result = $this->login($username, $password);

        return $result;
    }

    public function ListBookings() {
        $result = $this->reqBookings();

        return $result;
    }

}