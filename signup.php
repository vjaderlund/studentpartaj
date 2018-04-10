<?php
$pagetitle = 'Party - Anmälan';
include_once('incl/header.php');
?>

<h1> Jag kommer, inget party utan mig!</h1>
<p> Här skriver du något om anmälan</p>

<?php
//Här kommer ny php-kod
if (isset($_POST['submit'])) {

  $errors = array();
  if(empty($_POST['fname'])) {
    $errors[] = "Du glömde ditt förnamn.";
  }else{
    $fname = $_POST['fname'];
  }

  if(empty($_POST['lname'])) {
    $errors[] = "Du glömde ditt efternamn.";
  }else{
    $lname = $_POST['lname'];
  }

  if(empty($_POST['sname'])) {
    $errors[] = "Du glömde ditt smeknamn.";
  }else{
    $sname = $_POST['sname'];
  }

  if(empty($_POST['email'])) {
    $errors[] = "Du glömde ditt email.";
  }else{
    $email = $_POST['email'];
  }

  if(empty($_POST['civil'])) {
    $errors[] = "Du måste ange din civilstånd.";
  }else{
    $civil = $_POST['civil'];
  }


  $fname - $_POST['fname'];
  $lnamn - $_POST['lname'];
  $sname - $_POST['sname'];
  $mobile - $_POST['mobile'];
  $email - $_POST['email'];
  $civil - $_POST['civil'];
if (empty($errors)) {
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
echo "<p>Tack för din anmälan</p>";
}else{
  //Här kommer mer kod
  foreach ($errors as $message) {
    echo '<p class="error">' . $message . '</p>';
  }
}
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
