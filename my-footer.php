<?php
/**
 * Created by PhpStorm.
 * User: prog9
 * Date: 28.02.18
 * Time: 13:34
 */
?>
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="navbar" id="myNavbar">
                <?
                if (!isset ($_SESSION['member'])) { PrintBottomLinksOnOff ('home', 'index.html', $lang_main, $current_head_button) ;}
                if (!isset ($_SESSION['member'])) {
                    PrintBottomLinksOnOff ('join', 'signup1.html', $menu_join, $current_head_button) ;
                }
                PrintBottomLinksOnOff ('search', 'search.html', $lang_search, $current_head_button) ;
                PrintBottomLinksOnOff ('articles', 'articles.html', $lang_articles, $current_head_button) ;
                PrintBottomLinksOnOff ('faq', 'help.html', htmlentities( $lang_faq ), $current_head_button) ;
                PrintBottomLinksOnOff ('links', 'dating-directory.html', $lang_links2, $current_head_button) ;
                PrintBottomLinksOnOff ('aboutus', 'aboutus.html', $lang_about_us, $current_head_button) ;
                PrintBottomLinksOnOff ('contactus', 'contactus.html', $lang_contactus, $current_head_button) ;
                PrintBottomLinksOnOff ('antiscam', 'anti-scam.html', $lang_antiscam, $current_head_button) ;
                ?>
            </div>
            <p class="footer__copi">Copyright © 2003 - 2018 EraDating - Russian Brides. All rights reserved. In
                Russian</p>
            <p class="footer__copi">Bonex Trade LP 45 Rosehaugh Road, Inverness Inverness-Shire, Scotland IV3 8SW</p>
        </div>
    </div>
</footer>
