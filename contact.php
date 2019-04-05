<!DOCTYPE html>

<html class="page">
<?php include('Meta&Head.html'); ?>
<title>Contact | Rafael</title>

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
    <div class="main" style="max-width: 800px;">
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
    <?php include('Footer.html'); ?>
    
</body>

</html>
