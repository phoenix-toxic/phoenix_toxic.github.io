<style>
.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
    opacity: 1;
    transition: opacity 0.6s;
    margin-bottom: 15px;
}

.alert.success {background-color: #0088CC; color:white;}
.alert.danger {background-color: #F00; color:white;}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
</style>
<?php

$status_msg="";
$name=$_POST['name'];
$email=$_POST['email'];
$ph=$_POST['phone'];
$venue=$_POST['venue'];
$msg1=$_POST['message'];
if(empty($sub)){
	$sub="From WEB Enquiry";
}
		
			    
   
       //     $to_address = "theadermatology@gmail.com";
$to_address = "theadermatology@gmail.com";
       
        if($name && $email)
        {
            $msg = "Name: ".$name."<br><br>";
            $msg .= "Email: ".$email."<br><br>";
            $msg .= "Phone: ".$ph."<br><br>";
            	$msg .= "Venue: ".$venue."<br><br>";
			$msg .= "Message: ".$msg1."<br><br>";
            require 'PHPMailer/PHPMailerAutoload.php';

            $email1 = new PHPMailer();
            $email1->isSMTP(); // Set mailer to use SMTP
            $email1->Host = 'md-in-6.webhostbox.net';
            $email1->SMTPAuth = TRUE; // Enable SMTP authentication
            $email1->Username = 'mailer@namastheads.com'; // SMTP username
            $email1->Password = 'C!ECH%D6Kvv)'; // SMTP password
            $email1->Port = 465;
            $email1->SMTPSecure = 'ssl';
           
           
            $email1->SetFrom('mailer@namastheads.com', 'Namaste Ads');
            $email1->AddReplyTo("$email", "$name");
            $email1->FromName  = "$name";
           
            $email1->Subject   = $sub;
            $email1->Body      = $msg;
            $email1->AddAddress( $to_address );
          $email1->isHTML(true);                                  // Set email format to HTML
            if(!$email1->send()) {
               echo 'Message could not be sent.';
               echo 'Mailer Error: ' . $email1->ErrorInfo;
               exit;
            }
            else {
                $status_msg = $_POST['name'].", We will get back to you soon";   
            }
        }
        else
        {
            $status_msg1 = "Please fill in Name and Email fields";
        }
?>
<?php  if(!empty($status_msg)){ ?>
						<div class="alert success">
  							<span class="closebtn">&times;</span>  
  								<strong>Success!</strong> <?php echo $status_msg;?>
						</div>
<?php } ?>
<?php  if(!empty($status_msg1)){ ?>
						<div class="alert danger">
  							<span class="closebtn">&times;</span>  
  								<strong>!</strong> <?php echo $status_msg1;?>
						</div>
<?php } ?>