<?php
/**
 * Created by PhpStorm.
 * User: prog9
 * Date: 28.02.18
 * Time: 13:56
 */
?>
<
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <ul class="languages">
                <li class="languages__item">
                    <a
                    <a href="http://translate.google.com/translate?u=http://<?= $_SERVER['HTTP_HOST'] ?>/&amp;langpair=en|sl&amp;hl=en&amp;ie=UTF8">
                        <img src="http://<?= $_SERVER['HTTP_HOST'] ?>/i/flags/slovenia-nf1.gif" width="15" height="10"
                             alt="Change Language"/></a> <a
                            href="http://translate.google.com/translate?u=http://<?= $_SERVER['HTTP_HOST'] ?>/&amp;langpair=en|sl&amp;hl=en&amp;ie=UTF8">
                        SL
                    </a>
                </li>
                <li class="languages__item">
                    <a href="http://translate.google.com/translate?u=http://<?= $_SERVER['HTTP_HOST'] ?>/&amp;langpair=en|sk&amp;hl=en&amp;ie=UTF8">
                        <img src="http://<?= $_SERVER['HTTP_HOST'] ?>/i/flags/slovakia-nf1.gif" width="15" height="10"
                             alt="Change Language"/></a> <a
                            href="http://translate.google.com/translate?u=http://<?= $_SERVER['HTTP_HOST'] ?>/&amp;langpair=en|sk&amp;hl=en&amp;ie=UTF8">
                        SK
                    </a>
                </li>
                <li class="languages__item">
                    <a
                    <a href="http://translate.google.com/translate?u=http://<?= $_SERVER['HTTP_HOST'] ?>/&amp;langpair=en|ro&amp;hl=en&amp;ie=UTF8">
                        <img src="http://<?= $_SERVER['HTTP_HOST'] ?>/i/flags/romania-nf1.gif" width="15" height="10"
                             alt="Change Language"/></a> <a
                            href="http://translate.google.com/translate?u=http://<?= $_SERVER['HTTP_HOST'] ?>/&amp;langpair=en|ro&amp;hl=en&amp;ie=UTF8">
                        RO
                    </a>
                </li>
                <li class="languages__item">
                    <a<a href="http://translate.google.com/translate?u=http://<?= $_SERVER['HTTP_HOST'] ?>/&amp;langpair=en|pl&amp;hl=en&amp;ie=UTF8">
                        <img src="http://<?= $_SERVER['HTTP_HOST'] ?>/i/flags/poland-nf1.gif" width="15" height="10"
                             alt="Change Language"/></a> <a
                            href="http://translate.google.com/translate?u=http://<?= $_SERVER['HTTP_HOST'] ?>/&amp;langpair=en|pl&amp;hl=en&amp;ie=UTF8">
                        PL
                    </a>
                </li>
                <li class="languages__item">
                    <a href="http://translate.google.com/translate?u=http://<?= $_SERVER['HTTP_HOST'] ?>/&amp;langpair=en|hu&amp;hl=en&amp;ie=UTF8">
                        <img src="http://<?= $_SERVER['HTTP_HOST'] ?>/i/flags/hungary-nf1.gif" width="15" height="10"
                             alt="Change Language"/></a> <a
                            href="http://translate.google.com/translate?u=http://<?= $_SERVER['HTTP_HOST'] ?>/&amp;langpair=en|hu&amp;hl=en&amp;ie=UTF8">
                        HU
                    </a>
                </li>
                <li class="languages__item">
                    <a href="http://translate.google.com/translate?u=http://<?= $_SERVER['HTTP_HOST'] ?>/&amp;langpair=en|bg&amp;hl=en&amp;ie=UTF8">
                        <img src="http://<?= $_SERVER['HTTP_HOST'] ?>/i/flags/bulgaria-nf1.gif" width="15" height="10"
                             alt="Change Language"/></a> <a
                            href="http://translate.google.com/translate?u=http://<?= $_SERVER['HTTP_HOST'] ?>/&amp;langpair=en|bg&amp;hl=en&amp;ie=UTF8">
                        BG
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h1 class="heading">Russian dating service with beautiful Russian brides</h1>
            <p class="sub-heading">EraDating provides quality dating services for everyone who is looking for love,
                passion and romance.
                Here you will find hundreds of charming Russian brides and attractive Ukrainian girls whose beauty
                is not only in their faces but in their hearts.</p>
            <p class="sub-heading">Rely on us and keep in mind that the secret forces are bringing compatible
                spirits together. And you
                permit yourself to be led by this attraction, good fortune will come to your way! </p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-2">
            <form action="#" class="find-match">
                <h1 class="find-match__heading">Find My Match</h1>
                <div class="find-match__group-form">
                    <?= $lang_me ?>
                    <select name="iam" class="t13" id="iam">
                        <option value="1" selected="selected">
                            <?= $lang_male ?>
                        </option>
                        <option value="0">
                            <?= $lang_female ?>
                        </option>
                    </select>
                </div>
                <div class="find-match__group-form">
                    <?= $lang_looking_for ?>
                    <select name="seeking" class="t13" id="seeking">
                        <option value="1">
                            <?= $lang_lokging_for_male ?>
                        </option>
                        <option value="0" selected="selected">
                            <?= $lang_lokging_for_female ?>
                        </option>
                    </select>
                </div>
                <div class="find-match__group-form">
                    <?= $lang_age ?>
                    <select name="age_from" class="t13" id="age_from">
                        <?
                        GetSimpleList(18, 99, 18);
                        ?>
                    </select>
                    <?= $lang_age2 ?>
                    <select name="age_to" class="t13" id="age_to">
                        <?
                        GetSimpleList(18, 99, 35);
                        ?>
                    </select>
                </div>
                <div class="find-match__group-form">
                    <?= $lang_country ?>
                    <select name="country" class="t13" id="country">
                        <option value="0" selected="selected">
                            <?= $lang_all_countries ?>
                        </option>
                        <?
                        GetCountryList_rus();
                        ?>
                    </select>
                </div>
                <div class="find-match__group-form">
                    <input name="photo" type="checkbox" class="t13" id="photo" value="1" checked="checked"/>
                    <label for="coding"><?= $lang_show_with_pics_only ?></label>
                </div>
                <div class=find-match__group-form">
                    <input type="submit" value="<?= $button_search ?>" class="find-match__submit">
                </div>
                <div class="find-match__group-form">
                    <a href="search.html" class="a11w">
                        <?= $lang_advenced_search ?>
                    </a>
                </div>
            </form>
        </div>
        <div class="col-xs-12 col-md-3 col-md-offset-1">
            <form action="#" class="sig-in">
                <h1 class="sig-in__heading"><?= $lang_members_login ?></h1>
                <div class="sig-in__group-form">
                    <?= $lang_username ?>
                    <input name="username" type="text" class="t13" id="username"/>
                </div>
                <div class="sig-in__group-form">
                    <?= $lang_password ?>
                    <input name="password" type="password" class="t13" id="password" size="12"/>"1
                </div>
                <div class="sig-in__group-form">
                    <input type="submit" value="<?= $lang_enter ?>">
                </div>
                <div class="sig-in__group-form">
                    <a href="forgotpassword.html">
                        <?= $lang_forgot_password ?>
                    </a>
                </div>
            </form>
            <div class="join-now">
                <a href="#">
                    <img src="img/join.gif" alt="" class="join-now__link">
                </a>
            </div>
        </div>
    </div>