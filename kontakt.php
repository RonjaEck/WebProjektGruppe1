<?php
include('./header.php');
?>

<?php
if(!empty($_POST["send"])) {
	$name = $_POST["fname"];
	$email = $_POST["femail"];
  $content = $_POST["fmsg"];
	$subject = "Kontaktaufnahme durch Formular";

	$toEmail = "info@btv-hdh.de";
	$mailHeaders = "From: " . $name . "<". $email .">\r\n";
	if(mail($toEmail, $subject, $content, $mailHeaders)) {//throws error because there is no mailserver, should work when there is
	    $message = "Email wurde versendet.";
	    $type = "success";
	}else{
    $message = "Email konnte nicht versendet werden.";
    $type = "fail";
  }
}
?>

<main>
    <h2>Kontakt</h2>
    <form action="" enctype="multipart/form-data" method="post">

      <div><label for="fname">Name*:</label></div>
      <div><input id="fname" name="fname" type="text" required></input></div>

      <div><label for="femail">Email*:</label></div>
      <div><input id="femail" name="femail" type="email" required></input></div>

      <div><label for="ftel">Telefonnummer:</label></div>
      <div><input id="ftel" name="ftel" pattern="^([+](\d{1,3})\s?)?((\(\d{3,5}\)|\d{3,5})(\s)?)\d{3,8}$" type="tel"></input></div>

      <div><label for="fmsg">Nachricht*:</label></div>
      <div><textarea id="fmsg" name="fmsg" rows="8" cols= 30 autocomplete="on" required></textarea></div>

      <!--div class="g-recaptcha" data-sitekey="WEBSITEKEYHERE" data-theme="light" data-size="normal" data-image="image"></div>
      <script src="https://www.google.com/recaptcha/api.js" async defer></script-->
      <!-- needs to be setup, doesnt make sense for testing, alternate sources for captchas are possible ofc -->

      <div><input type="submit" name="send" value="send" /></div>

      <div id="statusMessage">
        <?php if (! empty($message)) { ?>
        <p class='<?php echo $type; ?>Message'><?php echo $message; ?></p>
        <?php } ?>
      </div>
    </form>
</main>


<?php
include('./footer.php');
?>
