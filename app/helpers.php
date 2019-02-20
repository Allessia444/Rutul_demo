<?php

use PragmaRX\Countries\Package\Countries;

function upload_tmp_path($file) {
  return public_path() . "/tmp/$file";
}
function upload_tmp_url($file) {
  return asset("tmp/$file");
}
function upload_path($file, $model, $variation=false, $relative=null) {
  $use_aws = is_null($relative)? env('AWS_STATUS',false) : $relative;
  $folder = "/uploads/". ( empty($variation) || $variation =='original' ? $model : "{$model}-{$variation}" ); 

  if (!$use_aws && !is_array($variation) && !file_exists(public_path().$folder)) {
      umask(0);
      @mkdir(public_path().$folder, 0777, true);
    }
  $target_path = ($use_aws? "" : public_path()) ."$folder/$file";
  return $target_path;
}
function upload_url($file, $model, $variation=false)  {
  $use_aws = env('AWS_STATUS',false);
  $folder = "/uploads/". ( empty($variation)  || $variation =='original' ? $model : "{$model}-{$variation}" );
  if(!empty($file)) {
    if($use_aws)
      return env('AWS_S3_HOST')."$folder/$file";
    else
      return asset("$folder/$file");
  } 
  return false;
}
function upload_move($file,$model,$variation=false,$source=false) {
  $use_aws = env('AWS_STATUS',false);
  $source = $source ? $source : upload_tmp_path($file);
  $target = upload_path($file,$model,$variation);
  if($use_aws) {
      $s3 = AWS::createClient('s3');
      $s3->putObject(array(
            'Bucket'     => env('AWS_S3_BUCKET'),
            'Key'        => $target,
            'SourceFile' => $source,
            'ACL'    => 'public-read'
        ));
  } else {
     copy($source, $target);
  }
}

function upload_delete($file,$model,$variations=false) {
  if(empty($file)) return false;;
  if(is_array($variations)) {
    foreach($variations as $variation){
        $local_path = upload_path($file,$model,$variation,false);
        @unlink($local_path);
    } 
  }
  $use_aws = env('AWS_STATUS',false);    
  if($use_aws) {
    $aws_path = upload_path($file,$model,$variations,true);
    $s3 = AWS::createClient('s3');
    $s3->deleteObject(array(
          'Bucket'     => env('AWS_S3_BUCKET'),
          'Key'        => $aws_path,          
        ));     
  }

}

function flag_list()
{
  return $flag = array(
    "flag-icon-ad" => "Andorra",
    "flag-icon-ae" => "United Arab Emirates",
    "flag-icon-af" => "Afghanistan",
    "flag-icon-ag" => "Antigua and Barbuda",
    "flag-icon-ai" => "Anguilla",
    "flag-icon-al" => "Albania",
    "flag-icon-am" => "Armenia",
    "flag-icon-ao" => "Angola",
    "flag-icon-ar" => "Argentina",
    "flag-icon-as" => "American Samoa",
    "flag-icon-at" => "Austria",
    "flag-icon-au" => "Australia",
    "flag-icon-aw" => "Aruba",
    "flag-icon-ax" => "Aland Islands",
    "flag-icon-az" => "Azerbaijan",
    "flag-icon-ba" => "Bosnia and Herzegovina",
    "flag-icon-bb" => "Barbados",
    "flag-icon-bd" => "Bangladesh",
    "flag-icon-be" => "Belgium",
    "flag-icon-bf" => "Burkina Faso",
    "flag-icon-bg" => "Bulgaria",
    "flag-icon-bh" => "Bahrain",
    "flag-icon-bi" => "Burundi",
    "flag-icon-bj" => "Benin",
    "flag-icon-bl" => "Saint Barthélemy",
    "flag-icon-bm" => "Bermuda",
    "flag-icon-bn" => "Brunei Darussalam",
    "flag-icon-bo" => "Bolivia (Plurinational State of)",
    "flag-icon-bq" => "Bonaire, Sint Eustatius and Saba",
    "flag-icon-br" => "Brazil",
    "flag-icon-bs" => "Bahamas",
    "flag-icon-bt" => "Bhutan",
    "flag-icon-bw" => "Botswana",
    "flag-icon-by" => "Belarus",
    "flag-icon-bz" => "Belize",
    "flag-icon-ca" => "Canada",
    "flag-icon-cc" => "Cocos (Keeling) Islands",
    "flag-icon-cd" => "Democratic Republic of the Congo",
    "flag-icon-cf" => "Central African Republic",
    "flag-icon-cg" => "Republic of the Congo",
    "flag-icon-ch" => "Switzerland",
    "flag-icon-ci" => "Côte d'Ivoire",
    "flag-icon-ck" => "Cook Islands",
    "flag-icon-cl" => "Chile",
    "flag-icon-cm" => "Cameroon",
    "flag-icon-cn" => "China",
    "flag-icon-co" => "Colombia",
    "flag-icon-cr" => "Costa Rica",
    "flag-icon-cu" => "Cuba",
    "flag-icon-cv" => "Cabo Verde",
    "flag-icon-cw" => "Curaçao",
    "flag-icon-cx" => "Christmas Island",
    "flag-icon-cy" => "Cyprus",
    "flag-icon-cz" => "Czech Republic",
    "flag-icon-de" => "Germany",
    "flag-icon-dj" => "Djibouti",
    "flag-icon-dk" => "Denmark",
    "flag-icon-dm" => "Dominica",
    "flag-icon-do" => "Dominican Republic",
    "flag-icon-dz" => "Algeria",
    "flag-icon-ec" => "Ecuador",
    "flag-icon-ee" => "Estonia",
    "flag-icon-eg" => "Egypt",
    "flag-icon-eh" => "Western Sahara",
    "flag-icon-er" => "Eritrea",
    "flag-icon-es" => "Spain",
    "flag-icon-et" => "Ethiopia",
    "flag-icon-fi" => "Finland",
    "flag-icon-fj" => "Fiji",
    "flag-icon-fk" => "Falkland Islands",
    "flag-icon-fm" => "Federated States of Micronesia",
    "flag-icon-fo" => "Faroe Islands",
    "flag-icon-fr" => "France",
    "flag-icon-ga" => "Gabon",
    "flag-icon-gb" => "United Kingdom",
    "flag-icon-gd" => "Grenada",
    "flag-icon-ge" => "Georgia",
    "flag-icon-gf" => "French Guiana",
    "flag-icon-gg" => "Guernsey",
    "flag-icon-gh" => "Ghana",
    "flag-icon-gi" => "Gibraltar",
    "flag-icon-gl" => "Greenland",
    "flag-icon-gm" => "Gambia",
    "flag-icon-gn" => "Guinea",
    "flag-icon-gp" => "Guadeloupe",
    "flag-icon-gq" => "Equatorial Guinea",
    "flag-icon-gr" => "Greece",
    "flag-icon-gs" => "South Georgia and the South Sandwich Islands",
    "flag-icon-gt" => "Guatemala",
    "flag-icon-gu" => "Guam",
    "flag-icon-gw" => "Guinea-Bissau",
    "flag-icon-gy" => "Guyana",
    "flag-icon-hk" => "Hong Kong",
    "flag-icon-hn" => "Honduras",
    "flag-icon-hr" => "Croatia",
    "flag-icon-ht" => "Haiti",
    "flag-icon-hu" => "Hungary",
    "flag-icon-id" => "Indonesia",
    "flag-icon-ie" => "Ireland",
    "flag-icon-il" => "Israel",
    "flag-icon-im" => "Isle of Man",
    "flag-icon-in" => "India",
    "flag-icon-io" => "British Indian Ocean Territory",
    "flag-icon-iq" => "Iraq",
    "flag-icon-ir" => "Iran (Islamic Republic of)",
    "flag-icon-is" => "Iceland",
    "flag-icon-it" => "Italy",
    "flag-icon-je" => "Jersey",
    "flag-icon-jm" => "Jamaica",
    "flag-icon-jo" => "Jordan",
    "flag-icon-jp" => "Japan",
    "flag-icon-ke" => "Kenya",
    "flag-icon-kg" => "Kyrgyzstan",
    "flag-icon-kh" => "Cambodia",
    "flag-icon-ki" => "Kiribati",
    "flag-icon-km" => "Comoros",
    "flag-icon-kn" => "Saint Kitts and Nevis",
    "flag-icon-kp" => "North Korea",
    "flag-icon-kr" => "South Korea",
    "flag-icon-kw" => "Kuwait",
    "flag-icon-ky" => "Cayman Islands",
    "flag-icon-kz" => "Kazakhstan",
    "flag-icon-la" => "Laos",
    "flag-icon-lb" => "Lebanon",
    "flag-icon-lc" => "Saint Lucia",
    "flag-icon-li" => "Liechtenstein",
    "flag-icon-lk" => "Sri Lanka",
    "flag-icon-lr" => "Liberia",
    "flag-icon-ls" => "Lesotho",
    "flag-icon-lt" => "Lithuania",
    "flag-icon-lu" => "Luxembourg",
    "flag-icon-lv" => "Latvia",
    "flag-icon-ly" => "Libya",
    "flag-icon-ma" => "Morocco",
    "flag-icon-mc" => "Monaco",
    "flag-icon-md" => "Moldova",
    "flag-icon-me" => "Montenegro",
    "flag-icon-mf" => "Saint Martin",
    "flag-icon-mg" => "Madagascar",
    "flag-icon-mh" => "Marshall Islands",
    "flag-icon-mk" => "Former Yugoslav Republic of Macedonia",
    "flag-icon-ml" => "Mali",
    "flag-icon-mm" => "Myanmar",
    "flag-icon-mn" => "Mongolia",
    "flag-icon-mo" => "Macau",
    "flag-icon-mp" => "Northern Mariana Islands",
    "flag-icon-mq" => "Martinique",
    "flag-icon-mr" => "Mauritania",
    "flag-icon-ms" => "Montserrat",
    "flag-icon-mt" => "Malta",
    "flag-icon-mu" => "Mauritius",
    "flag-icon-mv" => "Maldives",
    "flag-icon-mw" => "Malawi",
    "flag-icon-mx" => "Mexico",
    "flag-icon-my" => "Malaysia",
    "flag-icon-mz" => "Mozambique",
    "flag-icon-na" => "Namibia",
    "flag-icon-nc" => "New Caledonia",
    "flag-icon-ne" => "Niger",
    "flag-icon-nf" => "Norfolk Island",
    "flag-icon-ng" => "Nigeria",
    "flag-icon-ni" => "Nicaragua",
    "flag-icon-nl" => "Netherlands",
    "flag-icon-no" => "Norway",
    "flag-icon-np" => "Nepal",
    "flag-icon-nr" => "Nauru",
    "flag-icon-nu" => "Niue",
    "flag-icon-nz" => "New Zealand",
    "flag-icon-om" => "Oman",
    "flag-icon-pa" => "Panama",
    "flag-icon-pe" => "Peru",
    "flag-icon-pf" => "French Polynesia",
    "flag-icon-pg" => "Papua New Guinea",
    "flag-icon-ph" => "Philippines",
    "flag-icon-pk" => "Pakistan",
    "flag-icon-pl" => "Poland",
    "flag-icon-pm" => "Saint Pierre and Miquelon",
    "flag-icon-pn" => "Pitcairn",
    "flag-icon-pr" => "Puerto Rico",
    "flag-icon-ps" => "State of Palestine",
    "flag-icon-pt" => "Portugal",
    "flag-icon-pw" => "Palau",
    "flag-icon-py" => "Paraguay",
    "flag-icon-qa" => "Qatar",
    "flag-icon-re" => "Réunion",
    "flag-icon-ro" => "Romania",
    "flag-icon-rs" => "Serbia",
    "flag-icon-ru" => "Russia",
    "flag-icon-rw" => "Rwanda",
    "flag-icon-sa" => "Saudi Arabia",
    "flag-icon-sb" => "Solomon Islands",
    "flag-icon-sc" => "Seychelles",
    "flag-icon-sd" => "Sudan",
    "flag-icon-se" => "Sweden",
    "flag-icon-sg" => "Singapore",
    "flag-icon-sh" => "Saint Helena, Ascension and Tristan da Cunha",
    "flag-icon-si" => "Slovenia",
    "flag-icon-sj" => "Svalbard and Jan Mayen",
    "flag-icon-sk" => "Slovakia",
    "flag-icon-sl" => "Sierra Leone",
    "flag-icon-sm" => "San Marino",
    "flag-icon-sn" => "Senegal",
    "flag-icon-so" => "Somalia",
    "flag-icon-sr" => "Suriname",
    "flag-icon-ss" => "South Sudan",
    "flag-icon-st" => "Sao Tome and Principe",
    "flag-icon-sv" => "El Salvador",
    "flag-icon-sx" => "Sint Maarten",
    "flag-icon-sy" => "Syrian Arab Republic",
    "flag-icon-sz" => "Swaziland",
    "flag-icon-tc" => "Turks and Caicos Islands",
    "flag-icon-td" => "Chad",
    "flag-icon-tf" => "French Southern Territories",
    "flag-icon-tg" => "Togo",
    "flag-icon-th" => "Thailand",
    "flag-icon-tj" => "Tajikistan",
    "flag-icon-tk" => "Tokelau",
    "flag-icon-tl" => "Timor-Leste",
    "flag-icon-tm" => "Turkmenistan",
    "flag-icon-tn" => "Tunisia",
    "flag-icon-to" => "Tonga",
    "flag-icon-tr" => "Turkey",
    "flag-icon-tt" => "Trinidad and Tobago",
    "flag-icon-tv" => "Tuvalu",
    "flag-icon-tw" => "Taiwan",
    "flag-icon-tz" => "Tanzania",
    "flag-icon-ua" => "Ukraine",
    "flag-icon-ug" => "Uganda",
    "flag-icon-um" => "United States Minor Outlying Islands",
    "flag-icon-us" => "United States of America",
    "flag-icon-uy" => "Uruguay",
    "flag-icon-uz" => "Uzbekistan",
    "flag-icon-va" => "Holy See",
    "flag-icon-vc" => "Saint Vincent and the Grenadines",
    "flag-icon-ve" => "Venezuela (Bolivarian Republic of)",
    "flag-icon-vg" => "Virgin Islands (British)",
    "flag-icon-vi" => "Virgin Islands (U.S.)",
    "flag-icon-vn" => "Vietnam",
    "flag-icon-vu" => "Vanuatu",
    "flag-icon-wf" => "Wallis and Futuna",
    "flag-icon-ws" => "Samoa",
    "flag-icon-xk" => "Kosovo",
    "flag-icon-ye" => "Yemen",
    "flag-icon-yt" => "Mayotte",
    "flag-icon-za" => "South Africa",
    "flag-icon-zm" => "Zambia",
    "flag-icon-zw" => "Zimbabwe",
  );
}