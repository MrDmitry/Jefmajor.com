<!DOCTYPE html>
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require "./credentials.php";
//setup the usual, the cred file is just the 4 variables under here, in that new PDO object.
$con = new mysqli($SQL_server, $SQL_username, $SQL_password, $SQL_database);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
 ?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ARE YOU A QUOTE YET?</title>
    <link rel="stylesheet" href="../static/css/quotes.css">
  </head>
  <body>
   
    <div class="quote">
    <table>
    <tbody>
    	<th>ID</th><th>Quote</th><th>Submitter Name</th><th>Timestamp</th>
     		<?php 
        //prepared statement, security man, it's hard :^)
        $query = "SELECT `ID`,QUOTE,SUBMITTER,TIMESTAMP FROM `Quotes` WHERE `CHANNEL`LIKE 'jefmajor' ORDER BY `ID` DESC";

        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($id, $quote, $sub, $stamp);
            while ($stmt->fetch()) {
            printf('<tr><td style="border: 1px solid #ddd;">%s</td><td>%s</td><td>%s</td><td>%s</td></tr>', $id, $quote, $sub, $stamp);
            }
            $stmt->close();
        }
        $con->close();
        



        ?>
        </tbody>
</table>
    </div>
   
  </body>
</html>
<!-- Idea by Fed993 -->
