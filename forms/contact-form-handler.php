<?php
$errors = '';
$myemail = 'sejalc230@gmail.com';
if(empty($_POST['name'])  ||
   empty($_POST['email']) ||
   empty($_POST['msg_subject']) ||
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}
$name = $_POST['name'];
$email_address = $_POST['email'];
$subject = $_POST['msg_subject'];
$message = $_POST['message'];
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if(empty($errors))
{
$to = $myemail;
$email_subject = $subject;
$email_body = "You have received a new message. ".
" Here are the details:\n Name: $name \n ".
"Email: $email_address\n Message \n $message";
$header = "From: noreply@example.com\r\n";
$header.= "MIME-Version: 1.0\r\n";
$header.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$header.= "X-Priority: 1\r\n";
$mail_status = mail($to,$email_subject,$email_body,$header);
if ($mail_status) { ?>
  <script language="javascript" type="text/javascript">
   alert('Thank you for the message.');
  </script>
  <?php
  }else { ?>
   <script language="javascript" type="text/javascript">
    alert('Message failed. Please, send an email to sejalc230@gmail.com');
   </script>
  <?php }
//header('Location: sejal129.github.io');
}

?>