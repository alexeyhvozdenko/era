<?php
/**
 * Created by PhpStorm.
 * User: prog9
 * Date: 28.02.18
 * Time: 13:49
 */
?>
?php require ("_include_files.php"); ?>
<?
/********************** multicards *******************************************/
if ($_GET['payment'] == 'multicards') {
    if ($_SERVER[REMOTE_ADDR] == '72.32.75.194') { ?>
        <form action="http://www.eradating.com/member-home.html" method="GET">
            <input type="submit" value="return EraDating">
        </form>
        <?php
    }


    var_dump($_POST);

    echo '<!--success-->';
    die();

}
/********************** multicards END*******************************************/

// ini_set ("session.use_only_cookies", "1");


if (isset ($_GET['verify'])){
    $trying_to_activate = CheckControlFigure ( (int) $_GET['verify'] );
    if (!$trying_to_activate) { header ("Location: index.html"); exit; }
    $sql = "SELECT activated, num_of_pics, username, email, pass, original_language, sex FROM profiles WHERE id={$trying_to_activate}";
    $ac_result = mysql_query($sql);
    $ac_row = mysql_fetch_assoc ($ac_result);
    if ($ac_row['activated'] != 0) { header ("Location: member-home.html"); exit; }
    $member_id = $trying_to_activate;
    $sql = "UPDATE profiles SET r_email=1 WHERE id={$member_id}";
    mysql_query ($sql);
    MemberStart ($member_id);
    include ("_include/letters.php");
    $headers = "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=$lang_charset\n";
    $headers .= "From: $lang_text_name_url <$lang_email_mail>\n";
    $headers .= "Return-Path: $lang_text_name_url <$lang_email_mail>\n";
    $headers .= "X-Mailer: script at $lang_text_name_url \n";
    $mail_body=Activated ($ac_row['original_language'], $ac_row['sex'], $ac_row['username'], $ac_row['email'], $ac_row['pass'], $member_id);
    mail ($ac_row['email'], $subj_show_mail_subjectactive, $mail_body, $headers);

    /*  email
        if ($ac_row['num_of_pics'] == 0)
        {
            $mail_body=ActivatedWithoutPhotos ($ac_row['original_language'], $ac_row['username'], $ac_row['email'], $ac_row['pass']);
            mail ($ac_row['email'], "Welcome to GalaDating.com!", $mail_body, $headers);
        }
    */
    header ("Location: member-home.html");
    exit;
}
$current_head_button = "home";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=<?=$lang_charset ?>"/>
    <meta name="description" content="International online dating service - russian dating service with beautiful Russian Brides."/>
    <meta name="keywords" content="russian brides, russian dating, international dating"/>
    <link rel="alternate" type="application/rss+xml" title="Dating News EraDating.com" href="http://www.eradating.com/rss.php?news" />
    <link rel="alternate" type="application/rss+xml" title="Dating Guide EraDating.com" href="http://www.eradating.com/rss.php?articles" />
    <link rel="alternate" type="application/rss+xml" title="Women profiles EraDating.com" href="http://www.eradating.com/rss.php?women" />
    <link rel="alternate" type="application/rss+xml" title="Men profiles EraDating.com" href="http://www.eradating.com/rss.php?men" />
    <meta name="verify-v1" content="F25nbc8v0F8YGb8gjZj1Loh8Ip1Bc+nAb9ZmauXM47w=" />
    <meta name='yandex-verification' content='5e4f2e8b0054a847' />
    <meta name='yandex-verification' content='6ac7e4d62318ec38' />
    <meta name="google-site-verification" content="SkyTkRTVZLfIFQeC1Hs8T2GqxJGOk32OcBTtwys7IiA" />
    <meta name="google-site-verification" content="hfNKk--btwwtJ_txgypPNb-MmQQ0dchWj0jpH5brA5k" />
    <meta name="google-site-verification" content="OLJx2R4BmSk3qZyebhSqR9HWhyNU7WXLxtmBdljnp2Y" />
    <meta name="msvalidate.01" content="2AD0605BA9224523D0E96445514BBB35" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dating site</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36624578-1']);
    _gaq.push(['_trackPageview']);
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>
<?
    require ("my-header.php");
?>
<section>
    <?
        require ("sub-header.php");
    ?>
    <?
    require ("includes/test_profiles_horizont.php");
    ?>
    <div class="row">
        <div class="content">
            <div class="col-xs-12 col-md-6">
                <h2>
                    <a href="#">Single Russian Brides</a>
                </h2>
                <p>Looking for serious relationships? Then you are in the right place to start with! EraDating is an
                    international online dating website that has already united thousands of people all over the
                    world. Here you will meet the most beautiful and charming Ukrainian and Russian brides who will
                    capture your attention.</p>
                <p>Join the site community right now and you will get all the advantages of online dating that can
                    be
                    fun and playful as well. At EraDating you will be able to reveal your personality and
                    originality,
                    meet a lot of interesting people and make true friends. Browse through hundreds of Russian
                    brides'
                    profiles that are provided with sparkling photos and essays. And you will definitely find your
                    special one who is worthy of your heart!</p>
                <p>At the touch of love everyone becomes a poet! Don't waste your time - find your muse!</p>
            </div>
            <div class="col-xs-12 col-md-6">
                <?
                $sql= "SELECT * FROM news WHERE lang={$lang_id} ORDER BY id DESC LIMIT 3 ";
                $result = mysql_query ($sql);
                if(mysql_num_rows($result)>0){

                ?>
                <div class="news">
                    <?
                    while ($row = mysql_fetch_assoc ($result))
                    {
                        ?>
                        <h2 class="news__heading">
                            <img src="img/s-2.gif" alt="">
                            <a href="#"><?=$row['name'] ?></a>
                        </h2>
                        <p class="news__short-prewie"><?
                            if (strlen($row['body'])>150) {
                                echo stripslashes (substr( $row['body'], 0, 150)).'&nbsp;...';
                            }
                            else
                            {
                                echo stripslashes ($row['body']);
                            }

                            ?></p>
                        <hr class="news_under-line">
                        <?
                    }  // while
                    ?>
                </div>

                <div class="news__list-news">
                    <p class="news__list-news__names">
                        <a href="#"><?=$lang_all_news ?></a>
                    </p>
                    <? } ?>
                </div>

            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">

            <div class="col-xs-12 col-md-6">
                <h2 class="happy-couple__headeing">The happy couple of Eradating.com</h2>
                <div class="happy-couple__photo">
                    <img src="img/2008_122_small.jpg" alt="">
                    <img src="img/2008_146_small.jpg" alt="">
                </div>

                <p class="happy-couple__content">Almost 1 year and 6 months ago i was member of your site and was
                    looking as Belgian man for a russian
                    women. Well......... thank you very mush because i find my second half and now we are married
                    for a little more than 1 year. Never i have sush a loving and sweet wife as my Alla from Saint
                    Petersburg. Thank 1000 time's and keep on the good work. </p>
                <p class="happy-couple__content">Peter </p>
            </div>
            <div class="col-xs-12 col-md-6">
                <h2 class="slavic-brides">
                    <a href="#">Slavic Brides</a>
                </h2>
                <p class="slavic-brides_content">ou wonï¿½t believe it! What a great surprise we have for you. From
                    now EraDating presents not only
                    Russian brides from Ukraine, Russia and Byelorussia, but Slavic Brides from such countries like
                    <a href="brides-from-poland.html" title="Meet brides from Poland">Poland</a>> ,
                    <a href="brides-from-romania.html" title="Meet brides from Romania">Romania</a>,
                    <a href="brides-from-slovenia.html" title="Meet brides from Slovenia">Slovenia</a>,
                    <a href="brides-from-slovakia.html" title="Meet brides from Slovakia">Slovakia</a>,
                    <a href="brides-from-czech-republic.html" title="Meet brides from Czech Republic">Czech Republic</a>,
                    <a href="brides-from-hungary.html" title="Meet brides from Hungary">Hungary</a>,
                    <a href="brides-from-bulgaria.html" title="Meet brides from Bulgaria">Bulgaria</a> and many others.</p>
                <h3 class="slavic-brides__slogon">Join Now for Free!</h3>
                <ul class="requirements">
                    <li class="requirements__item">free personal ad and free flirting</li>
                    <li class="requirements__item">up to 4 photos</li>
                    <li class="requirements__item">Free anti-scam advice by email</li>
                    <li class="requirements__item">Send and receive free standard messages</li>
                    <li class="requirements__item">great chance to find your match!</li>
                </ul>
                <input type="submit" value="<?=$button_signup ?>" class="join__submit">
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="happy-couple__photo_jai">
                    <img src="img/jai.jpg" alt="">
                </div>
                <p class="happy-couple__content">Hi there.</p>
                <p class="happy-couple__content">I was once a member of this site and like many I'm sure I doubted
                    whether it was possible to find
                    love on the net. At the end of 2009 I met a young Russian girl on here and we began to
                    communicate.
                    Long story short and fast forward to 2012, we are now happily married and have applied for her
                    permanent visa for Australia. We have shared many holidays so far together to Thailand and I
                    have also visited her family in Russia as well. I could not have dreamed of meeting such an
                    amazing
                    girl but thanks to ERA it became a reality. All my family and friends love her and it seems her
                    family love me too so life is great. Again just want to thank all the team at ERA Dating for
                    making my dreams become real.
                </p>
                <p class="happy-couple__content">Thank you Jai</p>
            </div>

        </div>
    </div>


    </div>
</section>
<?
    require ("sub-header.php");
?>
</body>
</html>