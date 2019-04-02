<!DOCTYPE html>

<html class="page">
<?php include('Meta&Head.html'); ?>
<title>About | Rafael</title>

<body>
    <!-- HEADER -->
    <div class="header" style="
        background-image: url('src/aboutHeader.jpg');
        background-position: 50% 25%;
    ">

        <?php include('NavigationBar.html'); ?>

        <h3><span style="background-color: white;">
             About
        </span></h3>
    </div>

    <!-- MAIN -->
    <div class="main" style="max-width: 1000px;">
        <h1>
            Biography
        </h1>
        <p1 style="min-height:245px; background-color: lightgrey; padding: 25px 25px 5px;">
            <img src="src\aboutMainA.jpg" style="
                width:300px;
                height:225px;
                padding: 0px 25px 5px 0px;
                float: left;
                ">
            <?php include('BioPt1'); ?>
        </p1>

        <div style="padding: 25px"></div>

        <p1 style="min-height:245px; background-color: lightgrey; padding: 25px 25px 5px;">
            <img src="src\aboutMainB.jpg" style="
                width:300px;
                height:225px;
                padding: 0px 0px 5px 25px;
                float: right;
                ">
            Influenced early on by the likes of modern prog metal and math rock artists, Rafael brings an interesting color to the contemporary music scene, combining the sounds, colors, and textures of progressive music with modern pop/soul/hip-hop stylings. His musical endeavours range from regularly produced Instagram content to recording and producing dozens of live performances with <i>Half Mad</i> and other local groups.
        </p1>
    </div>

    

    <div style="padding: 40px"></div>
    
    <!-- FOOTER -->
    <?php include('Footer.html'); ?>
    
    
</body>

</html>
