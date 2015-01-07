<?php



session_start();

//Facebook settings:
$app_id='312096898995017';
$app_secret='a4d5b0e00468c0d8c375d41cfab7eb54';
$redirect_to_url='http://localhost:1024/crayon_mark_2/#/login';
$logout_url='http://localhost:1024/crayon_mark_2/logout.php';

//Permissions (to be approved by the user) used for the app
$permissions=array(
    'user_birthday',
    'user_status'
    );

require_once('../vendor/autoload.php');

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;


use Facebook\FacebookRequest;
use Facebook\FacebookRequestException;

//store the user ids of the users you track....
FacebookSession::setDefaultApplication($app_id,$app_secret);

//Tells the app to redirect after a valid login process 
$facebook= new FacebookRedirectLoginHelper($redirect_to_url);

if(isset($_SESSION)  &&  isset($_SESSION['fb_token']))
{
  $session=new FacebookSession($_SESSION['fb_token']);
  try{
    if(!$session->validate()){
      $session=null;
      header('Location: index.php');
    }
  }
  catch(FacebookRequestException $e){
    //When FB returns throws an Exception 
    $error=$e->message;
  }
  catch(Exception $e){
    //local Exception
    $error=$e->message; 
  }
}
else{
  try{
  if($session=$facebook->getSessionFromRedirect())
  { $_SESSION['fb_token']=$session->getToken();
  // header('Location: index.php');
  print "session is not null";  
  }
}
catch(FacebookRequestException $e){
//issue with facebook 
}

catch(Exception $e){
  //local issue
}
}

if(isset($session)){
  $_SESSION['fb_token']=$session->getToken();

  $session=new FacebookSession($session->getToken());
  //We can redirect to another page or just check for the session
  //$logoutURL=$facebook->getLogoutUrl($session, $next);
}

if($session) {
  try {
      $request = (new FacebookRequest( $session, 'GET', '/me' ))->execute();
      // Get response as an array
      $response = $request->getGraphObject()->asArray();
      echo $response;
        } catch(FacebookRequestException $e) {
      
          echo "Exception occured, code: " . $e->getCode();
          echo " with message: " . $e->getMessage();
      
        } 

 

}
?>

