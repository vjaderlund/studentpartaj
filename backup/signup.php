<?php
$pagetitle = 'Party - Anmälan';
include_once('incl/header.php');
?>

<h1> Jag kommer, inget party utan mig!</h1>
<p> Här skriver du något om anmälan</p>

<?php
//Här kommer ny php-kod
if (isset($_POST['submit'])) {

  $fname - $_POST['fname'];
  $lnamn - $_POST['lname'];
  $sname - $_POST['sname'];
  $mobile - $_POST['mobile'];
  $email - $_POST['email'];
  $civil - $_POST['civil'];

  require_once('dbc.php'); //Koppla mot databas

  $stmt = $dbc->prepare("INSERT INTO guests (fname, lname, sname, mobile, email, civil)
  VALUES (:fname, :lname, :sname, :mobile, :email, :civil)");

  $stmt->execute(array(
    ':fname' => $fname,
    ':lname' => $lname,
    ':sname' => $sname,
    ':mobile' => $mobile,
    ':email' => $email,
    ':civil' => $civil
  ));

} //END if isset submit
?>

<form method="post" action="signup.php">
  <p>Förnamn <input type="text" name="fname" id="fname" value="" /></p>
  <p>Efternamn <input type="text" name="lname" id="lname" value="" /></p>
  <p>Smeknamn <input type="text" name="sname" id="sname" value="" /></p>
  <p>Mobil <input type="text" name="mobile" id="mobile" value="" /></p>
  <p>E-post <input type="text" name="email" id="email" value="" /></p>
  <br/>
  <p>Civilstånd
    <input type="radio" name="civil" value="S" /> Singel
    <input type="radio" name="civil" value="U" /> Upptagen
    <input type="radio" name="civil" value="T" /> Tillgänglig
  </p>
  <input type="submit" name="submit" value="Yes! Sätt mig på listan" />
</form>


<?php
include_once('incl/footer.html');
?>
