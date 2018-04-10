<?php
$pagetitle = 'Party - Vem kommer';
include_once('incl/header.php');
?>

<h1> Gästerna</h1>

<?php
require_once('dbc.php');


//Hämta med prepared statement.
$stmt = $dbc->prepare('SELECT fname, lname, sname, civil FROM guests');
$stmt->execute();

while ($row = $stmt->fetch()) {
  echo "<p>" . $row['fname'] . " \"". $row['sname'] . " \" " . $row['lname'] . ", ";

  switch($row['civil']) {
    case 'S':
    echo 'Singel</p>';
    break;
    case 'U':
    echo 'Upptagen</p>';
    break;
    case 'T':
    echo 'Tillgänglig</p>';
    break;
  }
}
?>
<?php
include_once('incl/footer.html');
?>
