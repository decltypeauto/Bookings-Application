<?php
header("Content-Type: application/json; charset=UTF-8");
include 'app/require.php';

$user = new UserController;

//$user->test("test", "test", "1", "test", "1", "1");


echo $user->test2("test", "fluffy12");

//echo (json_encode($user->ListBookings()));

if (empty($_GET['Request']))
{
    $response = array('status' => 'failed', 'error' => 'Missing arguments');
}



else {
    if ($_GET['Request'] == 'ListBookings')
    {

        $response = $user->ListBookings();

    } else if ($_GET['Request'] == 'AddBooking') {


        if (empty($_GET['fName']) || empty($_GET['lName']) || empty($_GET['pNumber']) || empty($_GET['email']) || empty($_GET['tblID']) || empty($_GET['restID']) || empty($_GET['uName']) || empty($_GET['pWord'])) {
	
            $response = array('status' => 'failed', 'error' => 'Missing arguments');
        
        } else {
            
            $firstName = $_GET['fName'];
            $lastName = $_GET['lName'];
            $phoneNumber = $_GET['pNumber'];
            $email = $_GET['email'];
            $tableID = $_GET['tblID'];
            $restarauntID = $_GET['restID'];


            $userName = $_GET['uName'];
            $passwordHash = $_GET['pWord'];
            $password = base64_decode($passwordHash);

            
            if ($user->test2($userName, $password))
            {
                
                
                $response = $user->test($firstName, $lastName, $phoneNumber, $email, $tableID, $restarauntID);

            }
            else {
                $response = $user->test($firstName, $lastName, $phoneNumber, $email, $tableID, $restarauntID);
            }
        }

        
    }
}

// Check data
/*if (empty($_GET['fName']) || empty($_GET['lName']) || empty($_GET['pNumber']) || empty($_GET['email']) || empty($_GET['tblID'])|| empty($_GET['restID'])) {
	
	$response = array('status' => 'failed', 'error' => 'Missing arguments');

} else {

	$firstName = $_GET['fName'];
	$lastName = $_GET['lName'];
	$phoneNumber = $_GET['pNumber'];
	$email = $_GET['email'];
    $tableID = $_GET['tblID'];
    $restarauntID = $_GET['restID'];

	//if (API_KEY === $key) {

		// decode
		//$password = base64_decode($passwordHash);
		//$hwid = base64_decode($hwidHash);
		
		$response = $user->test($firstName, $lastName, $phoneNumber, $email, $tableID, $restarauntID);

	//} else {

		//$response = array('status' => 'failed', 'error' => 'Invalid API key');
		
	//}

}*/

echo (json_encode($response));