<?
if ( ! isset ($current_head_button)) $current_head_button ='';
?>
<?
/*message for members
if (isset ($_SESSION['member']))
{
?>
<table width="100%" border="0" cellpadding="2" cellspacing="5" bgcolor="#FFFFCC">
<tr>
<td align="center">
<font size="2">On Tuesday, February 20, 2007 at 12:00 AM (Eastern Time) we are going to have our server's update.
<br>Update will be complete by 8:00 AM Eastern Time. Due to this fact website can be unavailable. We apologize for any inconveniences that this may be causing you.<br>Thank you for your patience, we will do our best to return to normal functioning as soon as possible.</font>
</td>
</tr>
</table>
<?
}
//end message for members
*/
?>
<header id="header">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-3 col-md-offset-2 header">
                <a href="<?=$lang_site_address ?>"><img src="img/logo.gif" alt="" class="header__box-logos__logo"></a>
                <img src="img/iods.gif" alt="" class="header__box-logos__sub-logo">
            </div>
            <div class="col-xs-12 col-md-5 ">
                <div class="score-box">
                    <ul class="score">
                        <li class="score__item">Total Members: <? include_once( 'stat/total.php' ); ?></li>
                        <li class="score__item">
                            <a href="#">Last Week: <? include_once( 'stat/new.php' ); ?></a>
                        </li>
                        <li class="score__item">
                            <a href="#">Members Online: <? include_once( 'stat/online.php' ); ?></a>
                        </li>
                    </ul>
                    <div class="header__member-sig-in">
                        <a href="#" class="header__member-sig-in__link"><?=$menu_login ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-11 col-md-10">
                <div class="header__nav">
                    <ul class="header__nav-list">
                        <li class="header__nav-list__item">
                            <? if (isset ($_SESSION['member']))
                            { ?><a href="member-home.html" class="bmenu"><?=$menu_myaccount ?></a><?
                            } else { ?><a href="index.html" class="bmenu"><?=$menu_home ?></a><? } ?>
                        </li>
                        <li class="header__nav-list__item">
                            <? if (isset ($_SESSION['member']))
                            { ?><a href="search.html" class="bmenu"><?=$menu_search ?></a><?
                            } else { ?><a href="signup1.html" class="bmenu"><?=$menu_join ?></a><? } ?>
                        </li>
                        <li class="header__nav-list__item">
                            <? if (isset ($_SESSION['member']))
                            { ?><a href="articles.html" class="bmenu"><?=$menu_articles ?></a><?
 } else { ?><a href="search.html" class="bmenu"><?=$menu_search ?></a><? } ?>
                        </li>
                        <li class="header__nav-list__item">
                            <a href="help.html"><?=$menu_help ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
