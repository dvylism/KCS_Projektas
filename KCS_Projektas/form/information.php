<?php

$servername = "localhost";
$username = "projektas";
$password = "qwerasdf1";
try {
    $con = new PDO("mysql:host=$servername;dbname=chatroomdb", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
    }
catch(PDOException $e)
   {
   echo "Connection failed: " . $e->getMessage();
   }
$conn = null;
?>

<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacija</title>
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href="../css/form.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script language="javascript">
        function IsEmpty() {

          if (document.form.name.value == "" || document.form.email.value == "" || document.form.msg.value == "") {
            alert("Žinutė nebuvo išsiųsta, nes palikote tuščių laukelių");
          } else alert("Žinutė išsiųsta, laukite atsakymo!");

          return;
        }
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
    </script>
</head>
<body>
    <h1 class="heading1-line"><span>Paauglystė be streso</span></h1>
    <div class="header">
        <h2 class="heading2-line"><span>PBS</span></h2>
    </div>
    <div class="main">
        <nav class="navigation">
            <ul>
                <li><a href="../index.html">Pradinis</a></li>
                <li><a href="../about.html">Apie mus</a></li>
                <li><a href="http://martynasdvylis.lt/KCS_Projektas/form/information.php">Informacija</a></li>
                <li><a href="../products.html">Produktai</a></li>
                <li><a href="http://martynasdvylis.lt/KCS_Projektas/chatroom/chatroom.php">Bendravimas</a></li>
            </ul>
        </nav>
        <p class="bigger-font">Informacija apie stresą</p>
        <p class="video-place">
            <iframe class="yt-video" width="350" height="250" src="https://www.youtube.com/embed/3DZiTrzyJKo" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <iframe class="yt-video" width="350" height="250" src="https://www.youtube.com/embed/BFWlnBZR47I" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </p>
        <div class="information-section">
            <h1><span>Klausimai</span></h1>
		      <form action="" method="post" name="form">
                <label for="name">Vardas</label><br>
                <input type="text" name="name" placeholder="Vardas" required><br>
                <label for="email">El. Paštas</label><br>
                <input type="email" name="email" placeholder="El. paštas" required><br>
                <label for="message">Žinutė</label><br>
                <textarea name="msg" placeholder="Rašykite čia žinutę.." required></textarea><br>
                <input type="submit" name="submit" onclick="IsEmpty();" value="Siųsti">
		      </form>
	       </div>
        </div>
        <div id="footer">
            <span class="footer-line">
                <a href="https://www.facebook.com/paauglystebestreso/" class="fa fa-facebook" target="_blank";></a>
                <a href="https://www.instagram.com/paauglystebestreso/" class="fa fa-instagram" target="_blank";></a>
            </span>
        </div>
</body>
</html>

<?php

if(isset($_POST['submit'])){
			$name = $_POST['name'];
            $email = $_POST['email'];
			$msg = $_POST['msg'];
			$query = "INSERT INTO mail (name, email, msg) VALUES ('$name', '$email' , '$msg')";
			$run = $con -> query($query);
}
?>
