
<?php 
include 'sendsms.php';

// Pass api key and senderid of your account
$sendsms = new Sendsms("http://alerts.maxwellsms.com/api", "A5e24450f7e3297df048b257204e76d89", "SaaiRG");

$dlr_url = '';

// Sending an sms instantly 
$sendsms->send_sms("8807129650", "Successfully registered with Oozaaoo Club.Please use the login details username:Saai_50 Password:QdNJhIDc", $dlr_url,'json');
?>
