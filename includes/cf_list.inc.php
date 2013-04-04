<?php 

function getURL($url, $username=NULL, $password=NULL, $api_key) {
  //echo 'token: '.$_SESSION['access_token'];
  // setup the session & setup curl options
  $headers = array(
        'Authorization: Bearer '.$_SESSION['access_token'],
        'x-myobapi-cftoken: ',
        'x-myobapi-key: '.$api_key,
    );

  

  $session = curl_init($url); 
  curl_setopt($session, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($session, CURLOPT_HEADER, false); 
  curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
  
  // if there is a username present, assume we want to use it
  if($username) {
    // pass the username and password like 'username:password' to curl
    curl_setopt($session, CURLOPT_USERPWD, $username . ":" . $password);
  } 
  
  // get the response & close the session
  $response = curl_exec($session); 
  curl_close($session); 
  // return what we got
  return($response);
  
}

// start a timer to check the API
$API_starttime = microtime();
$API_startarray = explode(" ", $API_starttime);
$API_starttime = $API_startarray[1] + $API_startarray[0];

$response = getURL(api_url, '', '', api_key);

$API_endtime = microtime();
$API_endarray = explode(" ", $API_endtime);
$API_endtime = $API_endarray[1] + $API_endarray[0];

// it returned as JSON so lets decode it
$response = json_decode($response);

if( isset( $response->Message ) ) {
  $response = '<p class="well"><span class="label label-important">Error</span> Sorry there was an error<br />'.$response->Message.'</p>';
}

?>
<!-- Jumbotron -->
<div class="jumbotron">
  <div class="form-signin">
        <h2 class="form-signin-heading">Company files</h2>
        <?php
        echo '<p>access_token: '.$_SESSION['access_token'].'</p><hr /><p>refresh_token: '.$_SESSION['refresh_token'].'</p><hr />';
        foreach($response as $companyFile) {
          echo '<a class="btn btn-large btn-block" style="text-align: left; padding-left: 5px; padding-right: 5px;" href="?page=accounts&guid='.$companyFile->Id.'">'.$companyFile->Name.' </a>';
        }
        ?>
  </div>
</div>

<hr>

<!-- Example row of columns -->
<div class="row-fluid">
  <div class="span4">
    <h2>Do more</h2>
    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
    <p><a class="btn" href="#">View details &raquo;</a></p>
  </div>
  <div class="span4">
    <h2>With Your</h2>
    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
    <p><a class="btn" href="#">View details &raquo;</a></p>
 </div>
  <div class="span4">
    <h2>Company File</h2>
    <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
    <p><a class="btn" href="#">View details &raquo;</a></p>
  </div>
</div>

