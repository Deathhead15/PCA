<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
    <title>Pasay City Academy</title>
    <meta name="description" content="Pasay City Academy" />
    <meta name="keywords" content="Pasay City Academy" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/portfolio.css" rel="stylesheet" type="text/css" />
    <link href="css/dark.css" rel="stylesheet" type="text/css" />
    <link rel="apple-touch-icon" sizes="57x57" href="icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
    <link rel="manifest" href="icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.galleriffic.js"></script>
    <script type="text/javascript" src="js/jquery.opacityrollover.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // we only want these styles applied when javascript is enabled
            $('div.content').css('display', 'block');
            // initially set opacity on thumbs and add additional styling for hover effect on thumbs
            var onMouseOutOpacity = 0.67;
            $('#thumbs ul.thumbs li, div.navigation a.pageLink').opacityrollover({
                mouseOutOpacity:   onMouseOutOpacity,
                mouseOverOpacity:  1.0,
                fadeSpeed:         'fast',
                exemptionSelector: '.selected'
            });
            // initialize advanced galleriffic gallery
            var gallery = $('#thumbs').galleriffic({
                delay:                     3500,
                numThumbs:                 10,
                preloadAhead:              10,
                enableTopPager:            false,
                enableBottomPager:         false,
                imageContainerSel:         '#slideshow',
                controlsContainerSel:      '#controls',
                captionContainerSel:       '#caption',
                loadingContainerSel:       '#loading',
                renderSSControls:          true,
                renderNavControls:         true,
                playLinkText:              'Play Slideshow',
                pauseLinkText:             'Pause Slideshow',
                prevLinkText:              '&lsaquo; Previous Photo',
                nextLinkText:              'Next Photo &rsaquo;',
                nextPageLinkText:          'Next &rsaquo;',
                prevPageLinkText:          '&lsaquo; Prev',
                enableHistory:             true,
                autoStart:                 false,
                syncTransitions:           true,
                defaultTransitionDuration: 900,
                onSlideChange:             function(prevIndex, nextIndex) {
                    // 'this' refers to the gallery, which is an extension of $('#thumbs')
                    this.find('ul.thumbs').children()
                        .eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
                        .eq(nextIndex).fadeTo('fast', 1.0);

                    // update the photo index display
                    this.$captionContainer.find('div.photo-index')
                        .html('Photo '+ (nextIndex+1) +' of '+ this.data.length);
                },
                onPageTransitionOut:       function(callback) {
                    this.fadeTo('fast', 0.0, callback);
                },
                onPageTransitionIn:        function() {
                    var prevPageLink = this.find('a.prev').css('visibility', 'hidden');
                    var nextPageLink = this.find('a.next').css('visibility', 'hidden');
                    // show appropriate next / prev page links
                    if (this.displayedPage > 0)
                        prevPageLink.css('visibility', 'visible');
                    var lastPage = this.getNumPages() - 1;
                    if (this.displayedPage < lastPage)
                        nextPageLink.css('visibility', 'visible');
                    this.fadeTo('fast', 1.0);
                }
            });
            // event handlers for custom next / prev page links
            gallery.find('a.prev').click(function(e) {
                gallery.previousPage();
                e.preventDefault();
            });
            gallery.find('a.next').click(function(e) {
                gallery.nextPage();
                e.preventDefault();
            });
        });
    </script>

    <script>

        function checkMsg()
        {
            var x = document.getElementsByName("message")[0].value;
            if (x == null || x == "") {
                document.getElementsByName("message")[0].style.backgroundColor = "red";
                alert("Message should be filled out");
            }
        }

        function checkSub()
        {
            var x = document.getElementsByName("subject")[0].value;
            if (x == null || x == "") {
                document.getElementsByName("subject")[0].style.backgroundColor = "red";
                alert("Subject should be filled out");
            }
        }


    </script>
</head>

<body>
<div id="main">
    <div id="header">
        <div id="user">
            User: <?php echo $_COOKIE['user']; ?>
        </div>
        <div id="welcome">
            <img class="logo"   src="images/pcalogo.jpg" height="75px" width="75px"/>
            <h1><span>PASAY CITY ACADEMY</span></h1>
        </div><!--end welcome-->
        <div id="menubar">
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="event.php">Events</a></li>
                <li class="current"><a href="contact.php">Contact Us</a></li>
                <li class="last"><a href="../index.php">Log Out</a></li>
            </ul>
        </div><!--end menubar-->
    </div><!--end header-->

    <div id="site_content">

        <div id="text_content">
            <h3 id="title">Contact Us</h2>
                <div id="cont">
                <form method="post" action="contactus.php">
                    <label>To:</label> <input type="text" value="aapcahome1952@gmail.com" readonly/><br>
                    <label>Email:</label> <input type="text" value="<?php echo $_COOKIE['user'] ?>" name="email" /><br>
                    <label>Subject:</label> <input type="text" name="subject" onblur="checkSub()"/> <br>
                    <label>Message:</label><textarea rows="15" cols="50" name="message" onblur="checkMsg()"></textarea><br>
                    <button type="submit" name="submit">Contact Us</button>
                </form>
                </div>
        </div><!--close text_content-->

        <div class="static_image">
            <img width="500" height="450" src="images/0.jpg" alt="PAC" />
        </div>

    </div><!--end site_content-->
</div><!--end main-->

<div id="footer">
    <div id="footer_container">
        <div class="footer_container_box">
            <!---
            <h4>Events</h4>
            <p> </p>
              <a href="ourwork.html">Read more</a>
              --->
        </div><!--close footer_container_box-->
        <div class="footer_container_box">
            <h4>Latest Events</h4>
            <p> January 16, 2016 - Hour of Worship</p>
            <p> January 16, 2016 - Alumni Dinner </p>
            <a href="event.php">Read more</a>
        </div><!--close footer_container_box-->
        <div class="footer_container_boxl">
            <!--
                <h4>Events</h4>
                <p> Phasellus laoreet feugiat risus. Ut tincidunt, ante vel fermentum iaculis.</p>
                  <a href="projects.html">Read more</a>
                  -->
        </div><!--close footer_container_box1-->
        <br style="clear:both"/>
        <br />
        <p>@Copyright 2015</p><a href=159.203.40.108/index.php">Pasay City Academy</a>
    </div><!--close footer_container-->
</div><!--close footer-->

</body>
</html>
