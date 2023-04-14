<?php
        // Ici avant d'appeler la page, charge les données depuis la base dans une variables globale
        require_once('./Model.php');
        $GLOBALS['messages'] = getMessage();
        //require_once('./display.php');
		//print_r( $GLOBALS['messages']);
		//echo "<br>";
		//for($i = 0; $i < count($GLOBALS['messages']); $i++){
		//	echo $GLOBALS['messages'][$i]['pseudo']; echo "===="; echo $GLOBALS['messages'][$i]['message'];echo "===="; echo $GLOBALS['messages'][$i]['date']; echo "<br>";
		//	foreach($GLOBALS['messages'][$i] as $key => $value){
		//		echo $i; echo "-->"; echo $key; echo "####"; echo $value; echo "<br>"; 
		//	}
		//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>chatbox</title>
</head>
<body>
    <h1 class="title">CHATROOM</h1>
    <div class="card">
        <div class="container">
            <?php for($i = 0; $i < count($GLOBALS['messages']); $i++){?>
            <div class="info">
                <h4>message de : <?php echo $GLOBALS['messages'][$i]['pseudo'] ?> </h4> 
                <h4 class="date">date : <?php echo $GLOBALS['messages'][$i]['date'] ?> </h4> 
            </div>
            <p> <?php echo $GLOBALS['messages'][$i]['message'] ?> </p>
           <?php } ?>
        </div>
    </div>
    
    
    <div class="card">
        <div class="container">
            <form action="/tp-bts/action_page.php">
                <label for="pseudo">votre pseudo:</label><br>
                <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo"><br>
                <label for="message">votre message</label><br>
                <textarea name="message" id="message" cols="30" rows="10"></textarea>
                <br>
                <input type="submit" value="ENVOYER" name="ENVOYER">
            </form> 
        </div>
    </div>

   
</body>
</html>