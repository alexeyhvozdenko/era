<?
  ini_set("display_errors", "1");
error_reporting(1);

//header('Location: http://www.galabrides.com/men_registration1.html');


require_once ("_include_files.php");





$check_blocked_res = mysql_query ("SELECT count(ip) FROM blockip WHERE ip='{$remote_addr}'");








//�����஢���� ip


if (mysql_result ($check_blocked_res, 0, 0) != 0) {


	die ("Page not found");


}











$current_head_button = "join";


$error = '';





$username = (isset ($_GET['username']))	?	$_GET['username']	:	'';


$email = (isset ($_GET['email']))	?	$_GET['email']	:	'';


$pass = (isset ($_GET['pass']))	? addslashes($_GET['pass'])	:	'';


$pass2 = (isset ($_GET['pass2']))	?	$_GET['pass2']	:	'';


$iam = (isset ($_GET['iam']))	? (int)	$_GET['iam']	:	'1';


$orientation = (isset ($_GET['orientation']))	? (int)	$_GET['orientation']:	'1';


$join_reason = (isset ($_GET['join_reason']))	? (int)	$_GET['join_reason']:	'2';


//$age =  (isset ($_GET['age']))	? (int)	$_GET['age']	:	'0';


$subscribe = (isset ($_GET['subscribe']) )	? (int)	$_GET['subscribe']	:	'0';


$agree = (isset ($_GET['agree']) )	? (int)	$_GET['agree']	:	'0';





$dob_day = (isset ($_GET['dob_day']) ) ? (int) $_GET['dob_day']: '1';


$dob_month = (isset ($_GET['dob_month']) ) ? (int) $_GET['dob_month']: '1';


$dob_year = (isset ($_GET['dob_year']) ) ? (int) $_GET['dob_year']: '1975';





$country = (isset ($_GET['country']) ) ? (int) $_GET['country']: '259';


$city = (isset ($_GET['city']))	? addslashes ($_GET['city']):	'';





if (!isset($_GET['iam'])) $subscribe = 1;








if (isset ($_GET['email']))


{





if (isset ($_GET['username']))


{


//echo strlen($username);


if (strlen ($username) < 3 or strlen ($username) > 15) $error .= $lang_register_2_error_username;


else	if (!eregi ("^[a-z A-Z0-9]{3,15}$", $username) ) $error .= $lang_register_2_err_username_letters;





		if ( $existent_id = GetProfileIDByField ($username, 'username')) 


		{


			$error .= $lang_error_username_exists;


		}


}








	if (! ValidateEmail($email) ) $error .= $lang_error_email;


	if ($error == '')


	{





//�������� �� ������������ email ������


		if ( $existent_id = GetProfileIDByField ($email, 'email')) 


		{


			$error .= $lang_error_email_exists;


		}





	}


	if ($orientation <0) $error .=  $lang_error_orientation;	


	if ($join_reason <0) $error .=  $lang_error_join_reason;	


	if ($agree==0) $error .=  $lang_error_agree;	


	if (strlen ($pass) < 5 || strlen ($pass) > 15) $error .=  $lang_error_pass_length;


	if ($pass != $pass2) $error .= $lang_error_pass_different;


	


	if (strlen ($city) < 2) $error .= $lang_register_2_error_city ;


	else	if (!eregi ("^[a-z A-Z0-9_\.\,-]{2,60}$", $city) ) $error .= $lang_register_2_err_city_letters ;	


	


 if ($error == '')


 {


  $ref_site = '';


  $ref_string = '';


  if (isset ($_COOKIE['rf']))


  {


   $MY_HTTP_REFERRER = $_COOKIE['rf'];


   if (substr ($MY_HTTP_REFERRER, 0, 7) == 'http://') $MY_HTTP_REFERRER = substr ($MY_HTTP_REFERRER, 7);


   if (substr ($MY_HTTP_REFERRER, 0, 8) == 'https://') $MY_HTTP_REFERRER = substr ($MY_HTTP_REFERRER, 8);


   $first_slash_pos = strpos ($MY_HTTP_REFERRER, '/') ;


   $ref_site = substr ($MY_HTTP_REFERRER, 0, ($first_slash_pos > 0 ) ? $first_slash_pos : 30 );


   $ref_string = substr ($MY_HTTP_REFERRER, strlen ($ref_site)+1 );


  }


  


  $time_registered = time();


  


$ip = $_SERVER['REMOTE_ADDR'];


		


		$birthdate = "{$dob_year}-{$dob_month}-{$dob_day}";


if ($dob_month==12 and $dob_day>=22) $zodiac=1;


if ($dob_month==1 and $dob_day<=20) $zodiac=1;





if ($dob_month==1 and $dob_day>=21) $zodiac=2;


if ($dob_month==2 and $dob_day<=20) $zodiac=2;





if ($dob_month==2 and $dob_day>=21) $zodiac=3;


if ($dob_month==3 and $dob_day<=20) $zodiac=3;





if ($dob_month==3 and $dob_day>=21) $zodiac=4;


if ($dob_month==4 and $dob_day<=20) $zodiac=4;





if ($dob_month==4 and $dob_day>=21) $zodiac=5;


if ($dob_month==5 and $dob_day<=20) $zodiac=5;





if ($dob_month==5 and $dob_day>=21) $zodiac=6;


if ($dob_month==6 and $dob_day<=21) $zodiac=6;





if ($dob_month==6 and $dob_day>=22) $zodiac=7;


if ($dob_month==7 and $dob_day<=22) $zodiac=7;





if ($dob_month==7 and $dob_day>=23) $zodiac=8;


if ($dob_month==8 and $dob_day<=23) $zodiac=8;





if ($dob_month==8 and $dob_day>=24) $zodiac=9;


if ($dob_month==9 and $dob_day<=23) $zodiac=9;





if ($dob_month==9 and $dob_day>=24) $zodiac=10;


if ($dob_month==10 and $dob_day<=23) $zodiac=10;





if ($dob_month==10 and $dob_day>=24) $zodiac=11;


if ($dob_month==11 and $dob_day<=22) $zodiac=11;





if ($dob_month==11 and $dob_day>=23) $zodiac=12;


if ($dob_month==12 and $dob_day<=21) $zodiac=12;





$age2=date('Y')-$dob_year;





if  ( ($dob_month-date('m')) > 0 ) $age2--;


if  (( ($dob_month-date('m')) == 0 ) and ( ($dob_day-date('d')) >0 )) $age2--;





		


if ($iam==1) $have_to_pay=1;


else $have_to_pay=0;

/*
//�������� ������� �� ip ����� � ���� ��� ����� ������������������ ������


//���� ip ����� ��� ��� �� ������� ������� ��� 5 ��������� � ���.


$ip0_p=0;


$check_blocked_res = mysql_query ("SELECT count(ip) FROM manip WHERE ip='{$ip}'");


if (mysql_result ($check_blocked_res, 0, 0) != 0) $ip0_p=1;





$check_blocked_res2 = mysql_query ("SELECT count(ip) FROM profiles WHERE ip='{$ip}' and sex=1");


if (mysql_result ($check_blocked_res2, 0, 0) != 0) $ip0_p=1;








//echo "��� �������=".$ip0_p;








//�������� ���������������� IP �� ������� ������ IP �� ������������ �� ������ ���� ������ IP ������





$pos1 = strpos($ip, ".");


$ip1 = strrchr($ip, ".");


$pos1 = strrpos($ip, ".");


$pos1++;


$ip1 = substr($ip, 0, $pos1);


$ip1.="*";


//echo "<br>ip1=".$ip1;


$check_blocked_res = mysql_query ("SELECT count(ip) FROM manip WHERE ip = '{$ip1}'");


if (mysql_result ($check_blocked_res, 0, 0) != 0) $ip0_p=1;


//echo "<br>��� ������� *=".$ip0_p;


//���� ip �� ������ �� �������� ip � ���� ip ������


if ($ip0_p==0) mysql_query ("INSERT INTO manip VALUES (NULL, '" . $ip ."')");





//����� �������� IP


//exit;


//����� �������� ip ������� ������








$query = "http://maxmind.com:8010/b?l=z1ypDD06rHGQ&i=".$ip;


include ("_include/maxmind.php");


if ($countrysmall!="RU" and $countrysmall!="UA" and $countrysmall!="BY" and $countrysmall!="AM" and $countrysmall!="AZ" and $countrysmall!="KG" and $countrysmall!="KZ" and $countrysmall!="TM" and $countrysmall!="TJ" and $countrysmall!="UZ" and $countrysmall!="MD" and $countrysmall!="LT" and $countrysmall!="LV" and $countrysmall!="EE" and $countrysmall!="GE") $have_to_pay=1;





if ($countryfull=="Senegal" or $countryfull=="Ghana" or $countryfull=="Nigeriya" or $countryfull=="Nigeria" or $countryfull=="Kenya" or $countryfull=="Cote d'Ivoire" or $countryfull=="Philippines" or $countryfull=="Iraq" or $countrysmall=="CI")


 { 


   mysql_query ("INSERT INTO blockip VALUES ('" . $ip ."')");





 $subject = "Girls Africa English";          // Change this          


  // Additional headers


  $headers = "From:  info@eradating.com \n";


  $headers .= "Reply-To: info@eradating.com\n\n";


  // The script


  $send = mail("info@eradating.com", $subject, $countryfull, $headers);





   die ("Page not found");





 }








if ($countryfull=='Satellite Provider' and $iam==0)


 { 


   mysql_query ("INSERT INTO blockip VALUES ('" . $ip ."')");





  $subject = "Girls Africa English";          // Change this          


  // Additional headers


  $headers = "From:  info@eradating.com \n";


  $headers .= "Reply-To: info@eradating.com\n\n";


  // The script


  $send = mail("info@eradating.com", $subject, $countryfull, $headers);





   die ("Page not found");





 }

*/



if( isset( $_SESSION['aid_id'] ) && ( $_SESSION['aid_id']==5545 ) ) {

    $ref_site = "Subscribe";

    $ref_string = "Subscribe";

}


mysql_query( "UPDATE `emails_base` SET `flag_active`=0 WHERE `email`='" . addslashes( $email ) . "'" );


  $sql = "INSERT INTO profiles SET username='$username', birthdate='$birthdate', zodiac='$zodiac', country='$country', city='$city', sex='$iam', original_language='$lang_id', orientation='$orientation', join_reason='$join_reason', approved='0', email='$email', pass='$pass', subscribe='$subscribe', time_registered='$time_registered', ip='$ip', ref_site='$ref_site', ref_string='$ref_string', age='$age2', have_to_pay='{$have_to_pay}', checkman='{$ip0_p}', reala1='{$countryfull}', reala2='{$regionfull}', reala3='{$cityfull}'";





//		echo $sql;





  mysql_query ($sql, $database_connector);


  $id_reg = mysql_insert_id ($database_connector);


  $_SESSION['registration_id'] = $id_reg;


  $_SESSION['time_registered'] = $time_registered;


  mysql_query ("INSERT INTO profiles_check SET id='$id_reg', adres='0', phone='0', photo='0', anketa='0', document='0', emaile='0', name1='0', name2='0'");





  header ("Location: signup2.html");


  exit;


 }	


} // if trying to SUBMIT





$current_form_name  = $lang_step1_of_registration;


$current_button_name = $lang_registration;








?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Dating site</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/test_style.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>

    <body>
        <?php
            require ("_include/head.php"); 
        ?>
            <section class="registration">

                <div class="registration__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-5 col-md-offset-1">
                                <div class="registration__sig-up">
                                    <h1 class="registration__sig-up__heading">Sign up and become a member today for free!</h1>
                                    <div class="registration__sig-up__photos">
                                        <img src="img/k_signup.jpg" alt="">
                                    </div>
                                    <p class="registration__sig-up__content">nly members can view profiles and photos on our site, save their searches and favorite
                                        profiles. Also you can create a free profile, upload photos and start sending and
                                        receiving Free Standard Messages to see who is interested in you, and a lot more!</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <h1 class="regist__registr-free">
                                    <?=$current_form_name ?>
                                </h1>
                                <p>(Already a member?
                                    <a href="login.html">Sign in</a> )</p>
                                <form action="<?=$_SERVER['PHP_SELF'] ?>" class="registr-form" method="get" enctype="application/x-www-form-urlencoded">
                                    <h2 class="registr-form__heading">
                                        <?=$current_form_name ?>
                                    </h2>
                                    <div class="row registr-form__group-form">
                                        <div class="col-xs-4 registr-form__name">
                                            <label for="#">
                                                <?=$lang_username ?>e:</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input name="username" type="text" value="<?=$username ?>" maxlength="15" <? if ($member_id) echo 'disabled' ?>>
                                        </div>
                                    </div>
                                    <div class="row registr-form__group-form">
                                        <div class="col-xs-4 registr-form__name">
                                            <label for="#">
                                                <?=$lang_enter_pass1 ?>
                                            </label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input name="pass" type="password" value="<?=$pass ?>" maxlength="15">
                                        </div>
                                    </div>
                                    <div class="row registr-form__group-form">
                                        <div class="col-xs-4 registr-form__name">
                                            <label for="#">
                                                <?=$lang_enter_pass1 ?>
                                            </label>
                                        </div>
                                        <div class="col-xs-8 ">
                                            <input name="pass" type="password" value="<?=$pass ?>" maxlength="15">
                                        </div>
                                    </div>
                                    <div class="row registr-form__group-form">
                                        <div class="col-xs-4 registr-form__name">
                                            <label for="#">
                                                <?=$lang_your_email ?>:</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="text" name="email" value="<?=$email ?>">
                                        </div>
                                    </div>
                                    <div class="row registr-form__group-form">
                                        <div class="col-xs-4 registr-form__name">
                                            <label for="#">
                                                <?=$lang_me ?>:</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input name="iam" type="radio" value="1" <? if ($iam==1) echo 'checked';?> >
                                            <label for="#">
                                                <?=$lang_male ?>
                                            </label>
                                            <input name="iam" type="radio" value="0" <? if ($iam==0) echo 'checked';?> >
                                            <label for="#">
                                                <?=$lang_female ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row registr-form__group-form">
                                        <div class="col-xs-4 registr-form__name">
                                            <label for="#">
                                                <? echo ReturnFeatureName('orientation'); ?>:</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input name="orientation" type="radio" value="1" <? if ($orientation==1) echo 'checked';?> >
                                            <label for="#">
                                                <?=$lang_lokging_for_female ?>
                                            </label>
                                            <input name="orientation" type="radio" value="0" <? if ($orientation==0) echo 'checked';?> >
                                            <label for="#">
                                                <?=$lang_lokging_for_male ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row registr-form__group-form">
                                        <div class="col-xs-4 registr-form__name">
                                            <label for="#">
                                                <? GetFeatureValuesArray ('join_reason');  echo ReturnFeatureName('join_reason'); ?>
                                            </label>
                                        </div>
                                        <div class="col-xs-8">
                                            <select name=join_reason class="reg">
                                                <?
                                            GetFeatureValuesList ('join_reason', $join_reason);
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row registr-form__group-form">
                                        <div class="col-xs-4 registr-form__name">
                                            <label for="#">
                                                <?=$lang_birth_date ?>
                                            </label>
                                        </div>
                                        <div class="col-xs-8">
                                            <select name=dob_month>
                                                <?
                                                GetFeatureValuesList ('month', $dob_month);
                                                ?>

                                            </select>
                                            <select name=dob_day>
                                                <?
                                                GetSimpleList (1, 31, $dob_day);
                                                ?>

                                            </select>
                                            ,
                                            <select name=dob_year>

                                                <?
                                                GetSimpleList (1920, 1988, $dob_year);
                                                ?>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="row registr-form__group-form">
                                        <div class="col-xs-4 registr-form__name">
                                            <label for="#"><?=$lang_country ?></label>
                                        </div>
                                        <div class="col-xs-8">
                                        <select name=country>
                                            <?
                                            GetCountryList ($country);
                                            ?>

                                        </select>
                                        </div>
                                    </div>
                                    <div class="row registr-form__group-form">
                                        <div class="col-xs-4 registr-form__name">
                                            <label for="#"><?=$lang_city ?></label>
                                        </div>
                                        <div class="col-xs-8">
                                        <input type="text" name="city" value="<?=$city ?>">
                                        </div>
                                    </div>
                                    <div class="row registr-form__group-form">
                                        <div class="col-xs-offset-4 registr-form__name">

                                        </div>
                                        <div class="col-xs-8">
                                        <input name="subscribe" type="checkbox" value="1" <? if ($subscribe==1) echo 'checked';?> >>
                                            <label for=""><?=$lang_suscribe ?></label>
                                        </div>
                                    </div>
                                    <div class="row registr-form__group-form">
                                        <div class="col-xs-offset-4 registr-form__name">

                                        </div>
                                        <div class="col-xs-8">
                                            <input name="agree" type="checkbox" value="1" <? if ($agree==1) echo 'checked';?>>
                                            <label for="#"><?=$lang_rules2 ?></label>
                                            <a href="tos.html" target="_blank"><?=$lang_rules ?></a>
                                        </div>
                                    </div>
                                    <div class="row registr-form__group-form">
                                    <input name="Submit" type="submit" class="bbb" value="<?=$current_button_name ?>">
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </section>
            <footer id="footer">
                <div class="container">
                    <div class="row">
                        <div class="navbar" id="myNavbar">
                            <a href="#">Home</a>
                            <a href="#">Join Now</a>
                            <a href="#">Search</a>
                            <a href="#">Acticles</a>
                            <a href="#">Help&FFQ</a>
                            <a href="#">Links</a>
                            <a href="#">About Us</a>
                            <a href="#">Contact us</a>
                            <a href="#">Anti-Scam Policy</a>
                            <a href="javascript:void(0);" class="icon" onclick="navigation()">&#9776;</a>

                        </div>
                        <p class="footer__copi">Copyright © 2003 - 2018 EraDating - Russian Brides. All rights reserved. In Russian</p>
                        <p class="footer__copi">Bonex Trade LP 45 Rosehaugh Road, Inverness Inverness-Shire, Scotland IV3 8SW</p>
                    </div>
                </div>
            </footer>
    </body>

    </html>