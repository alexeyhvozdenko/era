<?
if ( ! isset ($current_head_button)) $current_head_button ='';
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
                                <a href="/last-week-profiles.html">Last Week: <? include_once( 'stat/new.php' ); ?></a>
                            </li>
                            <li class="score__item">
                                <a href="/members-online-within-24-hours.html">Members Online: <? include_once( 'stat/online.php' ); ?></a>
                            </li>
                        </ul>
                        <div class="header__member-sig-in">
                            <a href="#" class="header__member-sig-in__link"><?=$menu_login ?></a>
                        </div>
                    </div>
                    <div class="header__nav">
                        <ul class="header__nav-list">
                            <li class="header__nav-list__item">
                                <a href="#"><?=$menu_home ?></a>
                            </li>
                            <li class="header__nav-list__item">
                                <a href="signup1.html"><?=$menu_join ?></a>
                            </li>
                            <li class="header__nav-list__item">
                                <a href="search.html"><?=$menu_search ?></a>
                            </li>
                            <li class="header__nav-list__item">
                                <a href="help.html"><?= $menu_help ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</header>