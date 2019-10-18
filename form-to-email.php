<?php
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}
$email = $_POST['FormControlInputEmail'];
$question = $_POST['FormControlInputQuestion'];
$message = $_POST['FormControlTextarea'];

//Validate first
if(empty($name)||empty($visitor_email)) 
{
    echo "Email is verplicht!";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Het email adres is onjuist!";
    exit;
}

$email_from = 'administratie@polair.nl';//<== update the email address
$email_subject = "Formulier Polair website";
$email_body = "Je hebt een bericht ontvangen van $email.\n".
    "Over het volgende onderwerp:\n $question".
    "Waarin het volgende gevraagd wordt:\n $message".
    
$to = "administratie@polair.nl";//<== update the email address
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
header('Location: thank-you.php');


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 