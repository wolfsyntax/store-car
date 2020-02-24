<?php

if (isset($_POST['submit'])) {
  $firstname = $_POST['fname'];
  $lastname = $_POST['lname'];
  $email = $_POST['eaddress'];
  $telephone = $_POST['tel'];
  $message = $_POST['message'];

  $mailTo = "manonamissionmotors19@gmail.com";
  $headers = "From: ".$mailFrom;
  $txt = "You have received an e-mail from ".$name.".\n\n".$message;

  mail($mailTo, $txt, $headers);
  header("Location: index.php?mailsent");
}