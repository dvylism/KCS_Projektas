<?php
include 'connection.php';
session_start();
$name = $name ?? $_SESSION['name'] ?? $_POST['name'] ?? null;
?>

<!DOCTYPE html>
<html>
<head>
<title>Chat Room</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/chatroom.css">
<script>
    function ajax(){
        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {
            if(req.readyState == 4 && req.status == 200){
				    document.getElementById('chat').innerHTML = req.responseText;
            }
        }
        req.open('GET','chat.php',true);
        req.send();
        }

    setInterval(function() {ajax()}, 1000);

    if (window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
</script>
</head>
<body onload="ajax();">
	<div class="ibox-content" style="margin-left: 5px; margin-right: 5px;">
        <div class="row" style="margin-right:2px;margin-left: -30px;">
            <div style="margin-left: 10%;" class=" col-md-10">
                <a href="../index.html">Išeiti</a>
                <div class="chat-discussion">
                    <div class="chat-message left">
                        <div id="chat"></div>
                    </div>
                </div>
            </div>
		</div>
	</div>
	<div class="row">
     	<div style="margin-left: 20%; right: 30px;" class="col-md-8">
			<form method="POST" action="chatroom/index.php">
				<input type="text" name="name" value="<?PHP print $name ?>" placeholder="Įveskite savo vardą" required="">
				<textarea name="message" placeholder="Rašykite žinutę..." required=""></textarea>
                <input type="submit" style="color: white;" name="submit" id="button1" value="Siųsti"/>
			</form>
		</div>
	</div>
     <?php
		if(isset($_POST['submit'])){
            $_SESSION['name'] = $name;
			$message = $_POST['message'];
			$query = "INSERT INTO chat (name, message) VALUES ('$name','$message')";
			$run = $con -> query($query);
			if($run){
				?>
				<audio src='../audio/facebook_pop.mp3' hidden='true' autoplay='true'/>
				<?php
			}
		}
	?>
    <div class="footer"></div>
</body>
</html>
