<?php
function engtoban($input) {
    $engDATE = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'am', 'pm');
    $bangDATE = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর', 'শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', '
	বুধবার', 'বৃহস্পতিবার', 'শুক্রবার', 'পূর্বাহ্ন', 'অপরাহ্ন');
    $convertedDATE = str_replace($engDATE, $bangDATE, $input);
    return "$convertedDATE";
}


function ul_li_view($data, $start = 2, $limit = 6) {
    echo"<ul class='cata_wise_news_list'>";
    for ($s = $start; $s <= $limit; $s++) {
        if (isset($data['title_' . $s]) && $data['title_' . $s] != '') {
            echo'<li>' . @$data['stitle_' . $s] . ' ' . @$data['title_' . $s] . '</li>';
        }
    }
    echo"</ul>";
}


function img_ul_li_view($data, $start = 2, $limit = 6) {
    echo"<ul>";
    for ($s = $start; $s <= $limit; $s++) {
        echo'<li>' . @$data['image_' . $s] . @$data['stitle_' . $s] . ' ' . @$data['title_' . $s] . '</li>';
    }
    echo"</ul>";
}


function getAttribute($attrib, $tag) {
    //get attribute from html tag
    $re = '/' . $attrib . '=["\']?([^"\' ]*)["\' ]/is';
    preg_match($re, $tag, $match);
    if ($match) {
        return urldecode($match[1]);
    } else {
        return false;
    }
}

/**
 * Timezones list
 *
 * @return array
 */
$zones = timezone_identifiers_list();
foreach ($zones as $zone)
{
    $zoneExploded = explode('/', $zone);
    // Only use "friendly" continent names
    if ($zoneExploded[0] == 'Africa' || $zoneExploded[0] == 'America' || $zoneExploded[0] == 'Antarctica' || $zoneExploded[0] == 'Arctic' || $zoneExploded[0] == 'Asia' || $zoneExploded[0] == 'Atlantic' || $zoneExploded[0] == 'Australia' || $zoneExploded[0] == 'Europe' || $zoneExploded[0] == 'Indian' || $zoneExploded[0] == 'Pacific')
    {
        if (isset($zoneExploded[1]) != '')
        {
            $area = str_replace('_', ' ', $zoneExploded[1]);
            if (!empty($zoneExploded[2]))
            {
                 $area = $area . ' (' . str_replace('_', ' ', $zoneExploded[2]) . ')';
            }
            $locations[$zoneExploded[0]][$zone] = $area; // Creates array(DateTimeZone => 'Friendly name')
        }
    }
} 

?>
