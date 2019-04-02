<!DOCTYPE html>

<html class="page">

<title>Contact | Rafael</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<head>
    <link rel="stylesheet" type="text/css" href="css/body.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="icon" href="src\icons\icon.png">
</head>

<body onload="reasonActive(false)">
    <!-- HEADER -->
    <div class="header" style="
        background-image: url('src/contactHeader.jpg');
        background-position: 50% 38%;
    ">

        <?php include('NavigationBar.html'); ?>
        
        <h3><span style="background-color: white;">
            Contact
        </span></h3>
    </div>

    <!-- MAIN -->
    <div class="main">
        <h1>
            Message Me
        </h1>

        <form target="_blank" action="email.php" method="post" name="sendMessage" id="sendMessage" class="sendMessage">
            Name:<span style="color:tomato;">*</span> <br>
            <input type="text" name="name"><br><br>
            E-mail:<span style="color:tomato;">*</span><br>
            <input type="email" name="mail"><br><br>
            Subject:<span style="color:tomato;">*</span> <br>
            <input type="radio" name="subject" value="Private Instruction" onclick="reasonActive(false)" checked> Private Instruction <br>
            <input type="radio" name="subject" value="Performance Request" onclick="reasonActive(false)"> Performance Request <br>
            <input type="radio" name="subject" value="Collaboration" onclick="reasonActive(false)"> Want to Collaborate <br>
            <input type="radio" name="subject" value="Other" onclick="reasonActive(true)">Other <input type="text" name="reason" id="reason"></input><br><br>
            Comment:<span style="color:tomato;">*</span><br>
            <textarea name="comment" rows="4"></textarea><br><br>
            <input type="submit" value="Send">
            <input type="reset" value="Reset">
        </form>

    </div>

    <script src="scripts\sendMessage.js"></script>

    

    <div style="padding: 40px"></div>
    
    <!-- FOOTER -->
    <footer>
        <h3> Rafael Rodriguez
            <a href="https://www.youtube.com"><img src="src\icons\youtube-w.png" alt="YouTube"></a>
            <a href="https://rafaelrodriguez.bandcamp.com/releases"><img src="src\icons\bandcamp-w.png" alt="Bandcamp"></a>
            <a href="https://www.instagram.com/thatvegankidrar/?hl=en"><img src="src\icons\instagram-w.png" alt="Instagram"></a>
            <a href="https://soundcloud.com/rafaelrodriguezmusic"><img src="src\icons\soundcloud-w.png" alt="SoundCloud"></a>
        </h3>
        <h3 style="font-size: 14px;">Website by Ethan Sifferman | <a href="mailto:ethan.sifferman@gmail.com">
            ethan.sifferman@gmail.com</a>
        </h3>
        <h4>Icons made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from www.flaticon.com</h4>
    </footer>
    
</body>

</html>
