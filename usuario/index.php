<?php 
ob_start();
session_start();
require_once 'config.php'; 

//initalize user class
$user_obj = new Cl_User();


/*******Google ******/
require_once 'Google/src/config.php';
require_once 'Google/src/Google_Client.php';
require_once 'Google/src/contrib/Google_PlusService.php';
require_once 'Google/src/contrib/Google_Oauth2Service.php'; 


 $client = new Google_Client();
$client->setScopes(array('https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.me'));
$client->setApprovalPrompt('auto');

$plus       = new Google_PlusService($client);
$oauth2     = new Google_Oauth2Service($client);
//unset($_SESSION['access_token']);

if(isset($_GET['code'])) {
	$client->authenticate(); // Authenticate
	$_SESSION['access_token'] = $client->getAccessToken(); // get the access token here
	header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
}

if(isset($_SESSION['access_token'])) {
	$client->setAccessToken($_SESSION['access_token']);
}

if ($client->getAccessToken()) {
	$_SESSION['access_token'] = $client->getAccessToken();
	$user         = $oauth2->userinfo->get();
	try {
		$user_obj->google_login( $user );
	}catch (Exception $e) {
		$error = $e->getMessage();
	}
}  
/*******Google ******/
?>
<?php 
	if( !empty( $_POST )){
		try {
			
			$data = $user_obj->login( $_POST );
			if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
				header('Location: inicio/');
			}
		} catch (Exception $e) {
			$error = $e->getMessage();
		}
	}
	//print_r($_SESSION);
	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
		header('Location: inicio/');
	}
?>