<?php session_start();
unset($_SESSION['username']);
unset($_SESSION['msg']);
unset($_SESSION['accountType']);
unset($_SESSION['id']);
session_destroy();
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Townsville Music Centre</title>
    <link href="a2CSS.css" rel="stylesheet" type="text/css">
    <!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
    <script>var __adobewebfontsappname__ = "dreamweaver"</script>
    <script src="http://use.edgefonts.net/basic:n4:default;arimo:n4:default;averia-libre:n4:default.js"
            type="text/javascript"></script>
</head>

<body>
<div id="headermain">
    <header>
        <div id="logo"><a href="HomePage.php"><img src="TCMC_Images_Docs/SiteImages/TCMC150100.jpg" width="150"
                                                   height="100"/> </a></div>

        <div id="nav"><a href="EventsPage.php" onMouseOut="MM_swapImgRestore()"
                         onMouseOver="MM_swapImage('Image19','','button_img/events2.fw.png',0)"><img
                    src="button_img/events.fw.png" alt="" width="120" height="30" id="Image19"></a></div>
        <div id="nav"><a href="ArtistsPage.php" onMouseOut="MM_swapImgRestore()"
                         onMouseOver="MM_swapImage('Image20','','button_img/artists2.fw.png',0)"><img
                    src="button_img/artists.fw.png" alt="" width="120" height="30" id="Image20"></a></div>
        <div id="nav"><a href="AboutUsPage.html" onMouseOut="MM_swapImgRestore()"
                         onMouseOver="MM_swapImage('Image30','','button_img/aboutus2.fw.png',0)"><img
                    src="button_img/aboutus.fw.png" alt="" width="120" height="30" id="Image30"></a></div>
        <div id="nav1"><a href="BulletinboardPage.php" onMouseOut="MM_swapImgRestore()"
                          onMouseOver="MM_swapImage('Image31','','button_img/bulletin2.fw.png',0)"><img
                    src="button_img/bulletin.fw.png" alt="" width="120" height="30" id="Image31"></a></div>
    </header>
    <div id="headerLogin">
        <div id="signIn"><a href="LoginPage.php" onMouseOut="MM_swapImgRestore()"
                            onMouseOver="MM_swapImage('Image5','','button_img/SignIn2.fw.png',0)"><img
                    src="button_img/SignIn.fw.png" alt="Sign In" width="112" height="40" id="Image5"></a></div>
        <div id="signUp"><a href="RegisterPage.php" onMouseOut="MM_swapImgRestore()"
                            onMouseOver="MM_swapImage('Image6','','button_img/SignUp2.fw.png',1)"><img
                    src="button_img/SignUp.fw.png" alt="Sign Up" width="112" height="40" id="Image6"></a></div>
    </div>
</div>
</div>
<div id="wrapmain">
    <div id="wrap">
        <div id="upcomingEventsHeader" class="headerFont2">BULLETIN BOARD</font></div>


        <?php
        include('noticelist.php');
        ?>


    </div>
    <div id="sponsors">
        <div id="upcomingEventsHeader">
        </div>

        <div id="sponsorsTxt">
            <div id="sponsorsImg">
                <img src="TCMC_Images_Docs/SiteImages/TCC83100.png">
            </div>
            The Council's Partnerships and Sponsorships scheme provides vital core funding which enables us to maintain
            the administrative base for all our other activities, and also provides the premises which house our office
            space.
            The Council also assist with the performance venues for our concerts and events.
        </div>

        <div id="sponsorsTxt">
            <div id="sponsorsImg">
                <img src="TCMC_Images_Docs/SiteImages/GCBF80_100px.png" width="80" height="100" alt=""/>
            </div>
            The Gambling Community Benefit Fund has assisted us to obtain office equipment and sound and lighting
            equipment for our productions
        </div>

    </div>

</div>
</body>
</html>
