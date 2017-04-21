<?php
  $to = 'aweidele@gmail.com';
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $message .= "\n\n___________________________\n\nSent via roxanneweidele.com\n\n";
  $message .= "Catch: ".$_POST['url'];

  $headers = "From: ".$_POST['name']." <".$_POST['email'].">\r\n";
  $headers .= "Reply-To: ".$_POST['email']."\r\n";
  $headers .= "Return-Path: ".$_POST['email']."\r\n";

  if($_POST['url'] == '' && $_POST['email'] != '') {
     mail($to,$subject,$message,$headers);
  }
  header("Location: ".$_POST['redirect']);
?>
