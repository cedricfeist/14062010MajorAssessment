<?php session_start();
$username = $_SESSION['username'];
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
    <title>Townsville Music Centre - Logout</title>
    <link href="a2CSS.css" rel="stylesheet" type="text/css">
    <!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.--><script>
        var __adobewebfontsappname__="dreamweaver"
        function MM_swapImgRestore() { //v3.0
            var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
        }
        function MM_preloadImages() { //v3.0
            var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
                var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
                    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
        }

        function MM_findObj(n, d) { //v4.01
            var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
                d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
            if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
            for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
            if(!x && d.getElementById) x=d.getElementById(n); return x;
        }

        function MM_swapImage() { //v3.0
            var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
                if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
        }
    </script><script src="http://use.edgefonts.net/basic:n4:default;arimo:n4:default;averia-libre:n4:default.js" type="text/javascript"></script>
</head>

<body>
<div id="headermain">
    <header>
        <div id="logo"> <a href="HomePage.php"><img src="TCMC_Images_Docs/SiteImages/TCMC150100.jpg" width="150" height="100"/> </a></div>
        <div id="nav"><a href="Events.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image54','','button_img/events2.fw.png',0)"><img src="button_img/events.fw.png" alt="" width="120" height="30" id="Image54"></a></div>
        <div id="nav"><a href="ArtistsPage.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image20','','button_img/artists2.fw.png',0)"><img src="button_img/artists.fw.png" alt="" width="120" height="30" id="Image20"></a></div>
        <div id="nav"><a href="About_us.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image30','','button_img/aboutus2.fw.png',0)"><img src="button_img/aboutus.fw.png" alt="" width="120" height="30" id="Image30"></a></div>
        <div id="nav1"><a href="BulletinBoard.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image31','','button_img/bulletin2.fw.png',0)"><img src="button_img/bulletin.fw.png" alt="" width="120" height="30" id="Image31"></a></div>
    </header>
    <div id="headerLogin">
        <div id="signIn"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image22','','button_img/SignIn2.fw.png',0)"><img src="button_img/SignIn.fw.png" width="112" height="40" id="Image22"></a></div>
        <div id="signUp"><a href="RegisterPage.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image23','','button_img/SignUp2.fw.png',0)"><img src="button_img/SignUp.fw.png" alt="" width="112" height="40" id="Image23"></a></div>
    </div>
</div>
</div>
<div id="wrapmain">
    <div id="wrap">
        <div id="upcomingEventsHeader" class="headerFont2">LOGOUT</div>
        <?php
        include("logout.php");
        ?>
    </div>
    <div id="sponsors">
        <div id="upcomingEventsHeader">
        </div>

        <div id="sponsorsTxt">
            <div id="sponsorsImg">
                <img src="TCMC_Images_Docs/SiteImages/TCC83100.png">
            </div>
            The Council's Partnerships and Sponsorships scheme provides vital core funding which enables us to maintain the administrative base for all our other activities, and also provides the premises which house our office space.
            The Council also assist with the performance venues for our concerts and events.</div>

        <div id="sponsorsTxt">
            <div id="sponsorsImg">
                <img src="TCMC_Images_Docs/SiteImages/GCBF80_100px.png" width="80" height="100" alt=""/>
            </div>
            The Gambling Community Benefit Fund has assisted us to obtain office equipment and sound and lighting equipment for our productions
        </div>
    </div>
</div>
<div id="footer"><font size="-1">Contact Details: - <br>
        Phone: 07 4724 0286<br>
        Mobile: 0402 255 182<br>
        Postal Address: PO Box 1006, Townsville, Qld 4810 <br>
        Address: Townsville Civic Theatre, 41 Boundary Street Townsville, Qld 4810
    </font></div>
</body>
</html>