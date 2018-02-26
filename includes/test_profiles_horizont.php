<?
if ($member_id)
	$UserInfo = GetBasicInfoAboutUser ($member_id);
else
	{
		$UserInfo['sex'] =  ($lang_id == 1) ? 0 : 1;
		$UserInfo['orientation'] = 1;
	}
	
	if ($UserInfo['orientation'] > 2) $looking_for_sex = $UserInfo['sex'];
	else
	{
		if ($UserInfo['sex'] == 0) $looking_for_sex = 1;
		else $looking_for_sex = 0;
	}
	
//	$sql = "SELECT profile FROM best_profiles WHERE lang=$lang_id AND sex=$looking_for_sex ORDER BY id";
$time_new = mktime (0,0,0,date("m"),date("d")-107,date("Y"));
 	$sql = "SELECT id, username, age, height, weight, sex, num_of_pics, country FROM profiles WHERE gallery_lang{$lang_id}=0 AND sex=$looking_for_sex AND approved=1 AND num_of_pics>0 and time_registered>{$time_new} AND podozr=0 AND bria=0 ORDER BY bal desc, RAND() LIMIT 9";
	$profiles_result = mysql_query($sql);
	
	
?>
    <div class="featured">
        <h1 class="featured__heading"><?=$lang_text_fm ?></h1>
<?
$i = 1;
while ($row = mysql_fetch_assoc ($profiles_result))
{
	$id = $row['id'];
	$thumb_pic = GetImagePath ($id, "1mf");
	if (!file_exists($thumb_pic)) $thumb_pic="i/nopic".$row['sex'].".gif";
	$imagesize = ($thumb_pic);
	$imagesize = getimagesize($thumb_pic);
	if ($imagesize[0]<=75) $imagesize[3]='width="80" height="100"'; 
//	$b_UserInfo = GetBasicInfoAboutUser ($id);
?>
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <div class="featured__group-members">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="featured__group-members__photo">
                                <a href="member.html?id=<?=$id ?>"></a><img src="<?=$thumb_pic?>" <?=$imagesize[3] ?> alt="<?=$row['username'] ?>">
                            </div>
                        </div>
                        <div class="col-xs-6 col-xs-offset-1">
                            <a href="member.html?id=<?=$id ?>" class="featured__group-members__link"><?=$row['username'] ?></a>
                            <ul class="featured__group-members__list">
                                <li class="featured__group-members__list-item">
                                    <strong><?=$row['age'] ?>
  
  <?
  $prinitng_y_o = $lang_y_o;
  $age_end_figure = substr ($row['age'], -1);
  if ($age_end_figure == '1') $prinitng_y_o = $lang_y_o_1;
  if ($age_end_figure == '2' || $age_end_figure == '3' || $age_end_figure == '4')$prinitng_y_o = $lang_y_o_2;
  
  echo $prinitng_y_o;
  ?></strong>
                                </li>
                                <li class="featured__group-members__list-item"><?=GetNamesForValues ('height', $row['height']) ?></li>
                                <li class="featured__group-members__list-item"><?=GetNamesForValues ('weight', $row['weight']) ?></li>
                                <li class="featured__group-members__list-item"><? echo GetCountryName ($row['country']); ?></li>
                                <li class="featured__group-members__list-item">
                                    <a href="member.html?id=<?=$id ?>"><?=$lang_profile_view ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?

$i++;
 } ?>
        </div>
        <h1 class="featured__heading">
            <a href="#" class="featured__heading-link">More Russian Brides' Profilesred members</a>
        </h1>
    </div>