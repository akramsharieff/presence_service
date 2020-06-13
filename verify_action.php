  
   <?php
session_start();
if (isset($_POST['action'])) {
   include("dbconnect.php");
	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	$check1=$_SESSION['login'];
	$sql = "SELECT u_name FROM users WHERE u_email = '$check1'";
	$result=$conn->query($sql);
	if($row = $result->fetch_assoc())
	{   
		$email=$check1;
		$n=6;
		function getName($n) { 
			$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; 
			$randomString = ''; 
			for ($i = 0; $i < $n; $i++) { 
				$index = rand(0, strlen($characters) - 1); 
				$randomString .= $characters[$index]; 
			} 
			return $randomString; 
		} 
		$otp=getName($n);	
		require 'php-mailer-master/PHPMailerAutoload.php';
		ini_set('display_startup_errors',1);
		ini_set('display_errors',1);
		error_reporting(E_ALL);
		
		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;                               // Enable verbose debug output

		//$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = false;		// Enable SMTP authentication
		$mail->SMTPSecure = false;
		$mail->Username = 'dummydemosmtp@gmail.com';                 // SMTP username
		$mail->Password = 'demo@dummy';                             // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom('dummydemosmtp@gmail.com', 'demo');
		$mail->addAddress($email);     // Add a recipient             // Name is optional

		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = "Hi! ".$row['u_name']." OTP for Email Verification by Presence Service";
		$mail->Body    = 'Your OTP for email - verification:'.$otp;

		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message has been sent';
			$_SESSION['otp']=$otp;
		}
	}
}
?>