<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (  !array_key_exists('country', $_REQUEST)
   || !array_key_exists('amount', $_REQUEST)
   && !array_key_exists('dont', $_REQUEST))
    {
        // Bye I have no duty here.
        echo 'Hello Kristi was herre.'; //...
        die();
    }
//Edited by rezker (http://www.rezker.com)
//Kristi: Added Kosovo
function code_to_country( $code ){
            $code = strtoupper($code);
            $countryList = array(
            'AF' => 'Afghanistan',
            'AX' => 'Aland Islands',
            'AL' => 'Albania',
            'DZ' => 'Algeria',
            'AS' => 'American Samoa',
            'AD' => 'Andorra',
            'AO' => 'Angola',
            'AI' => 'Anguilla',
            'AQ' => 'Antarctica',
            'AG' => 'Antigua and Barbuda',
            'AR' => 'Argentina',
            'AM' => 'Armenia',
            'AW' => 'Aruba',
            'AU' => 'Australia',
            'AT' => 'Austria',
            'AZ' => 'Azerbaijan',
            'BS' => 'Bahamas the',
            'BH' => 'Bahrain',
            'BD' => 'Bangladesh',
            'BB' => 'Barbados',
            'BY' => 'Belarus',
            'BE' => 'Belgium',
            'BZ' => 'Belize',
            'BJ' => 'Benin',
            'BM' => 'Bermuda',
            'BT' => 'Bhutan',
            'BO' => 'Bolivia',
            'BA' => 'Bosnia and Herzegovina',
            'BW' => 'Botswana',
            'BV' => 'Bouvet Island (Bouvetoya)',
            'BR' => 'Brazil',
            'IO' => 'British Indian Ocean Territory (Chagos Archipelago)',
            'VG' => 'British Virgin Islands',
            'BN' => 'Brunei Darussalam',
            'BG' => 'Bulgaria',
            'BF' => 'Burkina Faso',
            'BI' => 'Burundi',
            'KH' => 'Cambodia',
            'CM' => 'Cameroon',
            'CA' => 'Canada',
            'CV' => 'Cape Verde',
            'KY' => 'Cayman Islands',
            'CF' => 'Central African Republic',
            'TD' => 'Chad',
            'CL' => 'Chile',
            'CN' => 'China',
            'CX' => 'Christmas Island',
            'CC' => 'Cocos (Keeling) Islands',
            'CO' => 'Colombia',
            'KM' => 'Comoros the',
            'CD' => 'Congo',
            'CG' => 'Congo the',
            'CK' => 'Cook Islands',
            'CR' => 'Costa Rica',
            'CI' => 'Cote d\'Ivoire',
            'HR' => 'Croatia',
            'CU' => 'Cuba',
            'CY' => 'Cyprus',
            'CZ' => 'Czech Republic',
            'DK' => 'Denmark',
            'DJ' => 'Djibouti',
            'DM' => 'Dominica',
            'DO' => 'Dominican Republic',
            'EC' => 'Ecuador',
            'EG' => 'Egypt',
            'SV' => 'El Salvador',
            'GQ' => 'Equatorial Guinea',
            'ER' => 'Eritrea',
            'EE' => 'Estonia',
            'ET' => 'Ethiopia',
            'FO' => 'Faroe Islands',
            'FK' => 'Falkland Islands (Malvinas)',
            'FJ' => 'Fiji the Fiji Islands',
            'FI' => 'Finland',
            'FR' => 'France, French Republic',
            'GF' => 'French Guiana',
            'PF' => 'French Polynesia',
            'TF' => 'French Southern Territories',
            'GA' => 'Gabon',
            'GM' => 'Gambia the',
            'GE' => 'Georgia',
            'DE' => 'Germany',
            'GH' => 'Ghana',
            'GI' => 'Gibraltar',
            'GR' => 'Greece',
            'GL' => 'Greenland',
            'GD' => 'Grenada',
            'GP' => 'Guadeloupe',
            'GU' => 'Guam',
            'GT' => 'Guatemala',
            'GG' => 'Guernsey',
            'GN' => 'Guinea',
            'GW' => 'Guinea-Bissau',
            'GY' => 'Guyana',
            'HT' => 'Haiti',
            'HM' => 'Heard Island and McDonald Islands',
            'VA' => 'Holy See (Vatican City State)',
            'HN' => 'Honduras',
            'HK' => 'Hong Kong',
            'HU' => 'Hungary',
            'IS' => 'Iceland',
            'IN' => 'India',
            'ID' => 'Indonesia',
            'IR' => 'Iran',
            'IQ' => 'Iraq',
            'IE' => 'Ireland',
            'IM' => 'Isle of Man',
            'IL' => 'Israel',
            'IT' => 'Italy',
            'JM' => 'Jamaica',
            'JP' => 'Japan',
            'JE' => 'Jersey',
            'JO' => 'Jordan',
            'KZ' => 'Kazakhstan',
            'KE' => 'Kenya',
            'KI' => 'Kiribati',
            'KP' => 'Korea',
            'KR' => 'Korea',
            'KW' => 'Kuwait',
            'KG' => 'Kyrgyz Republic',
            'LA' => 'Lao',
            'LV' => 'Latvia',
            'LB' => 'Lebanon',
            'LS' => 'Lesotho',
            'LR' => 'Liberia',
            'LY' => 'Libyan Arab Jamahiriya',
            'LI' => 'Liechtenstein',
            'LT' => 'Lithuania',
            'LU' => 'Luxembourg',
            'MO' => 'Macao',
            'MK' => 'Macedonia',
            'MG' => 'Madagascar',
            'MW' => 'Malawi',
            'MY' => 'Malaysia',
            'MV' => 'Maldives',
            'ML' => 'Mali',
            'MT' => 'Malta',
            'MH' => 'Marshall Islands',
            'MQ' => 'Martinique',
            'MR' => 'Mauritania',
            'MU' => 'Mauritius',
            'YT' => 'Mayotte',
            'MX' => 'Mexico',
            'FM' => 'Micronesia',
            'MD' => 'Moldova',
            'MC' => 'Monaco',
            'MN' => 'Mongolia',
            'ME' => 'Montenegro',
            'MS' => 'Montserrat',
            'MA' => 'Morocco',
            'MZ' => 'Mozambique',
            'MM' => 'Myanmar',
            'NA' => 'Namibia',
            'NR' => 'Nauru',
            'NP' => 'Nepal',
            'AN' => 'Netherlands Antilles',
            'NL' => 'Netherlands the',
            'NC' => 'New Caledonia',
            'NZ' => 'New Zealand',
            'NI' => 'Nicaragua',
            'NE' => 'Niger',
            'NG' => 'Nigeria',
            'NU' => 'Niue',
            'NF' => 'Norfolk Island',
            'MP' => 'Northern Mariana Islands',
            'NO' => 'Norway',
            'OM' => 'Oman',
            'PK' => 'Pakistan',
            'PW' => 'Palau',
            'PS' => 'Palestinian Territory',
            'PA' => 'Panama',
            'PG' => 'Papua New Guinea',
            'PY' => 'Paraguay',
            'PE' => 'Peru',
            'PH' => 'Philippines',
            'PN' => 'Pitcairn Islands',
            'PL' => 'Poland',
            'PT' => 'Portugal, Portuguese Republic',
            'PR' => 'Puerto Rico',
            'QA' => 'Qatar',
            'RE' => 'Reunion',
            'RO' => 'Romania',
            'RU' => 'Russian Federation',
            'RW' => 'Rwanda',
            'BL' => 'Saint Barthelemy',
            'SH' => 'Saint Helena',
            'KN' => 'Saint Kitts and Nevis',
            'LC' => 'Saint Lucia',
            'MF' => 'Saint Martin',
            'PM' => 'Saint Pierre and Miquelon',
            'VC' => 'Saint Vincent and the Grenadines',
            'WS' => 'Samoa',
            'SM' => 'San Marino',
            'ST' => 'Sao Tome and Principe',
            'SA' => 'Saudi Arabia',
            'SN' => 'Senegal',
            'RS' => 'Serbia',
            'SC' => 'Seychelles',
            'SL' => 'Sierra Leone',
            'SG' => 'Singapore',
            'SK' => 'Slovakia (Slovak Republic)',
            'SI' => 'Slovenia',
            'SB' => 'Solomon Islands',
            'SO' => 'Somalia, Somali Republic',
            'ZA' => 'South Africa',
            'GS' => 'South Georgia and the South Sandwich Islands',
            'ES' => 'Spain',
            'LK' => 'Sri Lanka',
            'SD' => 'Sudan',
            'SR' => 'Suriname',
            'SJ' => 'Svalbard & Jan Mayen Islands',
            'SZ' => 'Swaziland',
            'SE' => 'Sweden',
            'CH' => 'Switzerland, Swiss Confederation',
            'SY' => 'Syrian Arab Republic',
            'TW' => 'Taiwan',
            'TJ' => 'Tajikistan',
            'TZ' => 'Tanzania',
            'TH' => 'Thailand',
            'TL' => 'Timor-Leste',
            'TG' => 'Togo',
            'TK' => 'Tokelau',
            'TO' => 'Tonga',
            'TT' => 'Trinidad and Tobago',
            'TN' => 'Tunisia',
            'TR' => 'Turkey',
            'TM' => 'Turkmenistan',
            'TC' => 'Turks and Caicos Islands',
            'TV' => 'Tuvalu',
            'UG' => 'Uganda',
            'UA' => 'Ukraine',
            'AE' => 'United Arab Emirates',
            'GB' => 'United Kingdom',
            'US' => 'United States of America',
            'UM' => 'United States Minor Outlying Islands',
            'VI' => 'United States Virgin Islands',
            'UY' => 'Uruguay, Eastern Republic of',
            'UZ' => 'Uzbekistan',
            'VU' => 'Vanuatu',
            'VE' => 'Venezuela',
            'VN' => 'Vietnam',
            'WF' => 'Wallis and Futuna',
            'EH' => 'Western Sahara',
            'YE' => 'Yemen',
            'ZM' => 'Zambia',
            'ZW' => 'Zimbabwe',
            'XK' => 'Kosovo'
            );
            if( !$countryList[$code] ) return $code;
            else return $countryList[$code];
}
function ip_details($ipp) {
  $json = file_get_contents("http://ipinfo.io/{$ipp}/json/?token=<your_token>");
  $details = json_decode($json, true);
  return $details;
}
header('Content-type: text/html; charset=iso-8859-1');
if(isset($_REQUEST['ip'       ])) { $ip        = $_REQUEST['ip'       ]; } else { $ip        = ''; }
if(isset($_REQUEST['amount'   ])) { $amount    = $_REQUEST['amount'   ]; } else { $amount    = ''; }
if(isset($_REQUEST['hit_time' ])) { $hit_time  = $_REQUEST['hit_time' ]; } else { $hit_time  = ''; }
if(isset($_REQUEST['sale_time'])) { $sale_time = $_REQUEST['sale_time']; } else { $sale_time = ''; }
if(isset($_REQUEST['platform' ])) { $platform  = $_REQUEST['platform' ]; } else { $platform  = ''; }
if(isset($_REQUEST['country'  ])) { $country   = $_REQUEST['country'  ]; } else { $country   = ''; }
if(isset($_REQUEST['tracker'  ])) { $tracker   = $_REQUEST['tracker'  ]; } else { $tracker   = ''; }
if(isset($_REQUEST['s1'       ])) { $s1        = $_REQUEST['s1'       ]; } else { $s1        = ''; }
if(isset($_REQUEST['s2'       ])) { $s2        = $_REQUEST['s2'       ]; } else { $s2        = ''; }
if(isset($_REQUEST['sendto'   ])) { $email     = $_REQUEST['sendto'   ]; } else { $email     = ''; }
//$receiver = 'john.doe@mail.uk';
$subject = "$country \$$amount";
$ipdetails = ip_details($ip);
$message = 
'<html>
<body>
<table style="width: 400px;">
<tbody>
<tr>
<td>&nbsp;Country</td>
<td>&nbsp;'.code_to_country(htmlspecialchars($country)).'</td>
</tr>
<tr style="height: 50px;">
<td>&nbsp;Amount</td>
<td>&nbsp;$'.htmlspecialchars($amount).'</td>
</tr>
<tr style="height: 50px;">
<td>&nbsp;Hit on</td>
<td>&nbsp;'.date('M j G:i:s', htmlspecialchars($hit_time)).'</td>
</tr>
<tr style="height: 50px;">
<td>&nbsp;Sale on</td>
<td>&nbsp;'.date('M j G:i:s', htmlspecialchars($sale_time)).'</td>
</tr>
<tr style="height: 50px;">
<td>&nbsp;IP</td>
<td>&nbsp;'.htmlspecialchars($ip).'</td>
</tr>
<tr style="height: 50px;">
<td>&nbsp;IP Details</td>
<td>&nbsp;'.$ipdetails['country'].'&#44;&nbsp;'.$ipdetails['region'].'&#44;&nbsp;'.$ipdetails['city'].'</td>
</tr>
<tr style="height: 50px;">
<td style="width: 111px; height: 23px;">&nbsp;Platfom</td>
<td style="width: 122px; height: 23px;">&nbsp;'.htmlspecialchars($platform).'</td>
</tr>
<tr style="height: 50px;">
<td>&nbsp;Tracker</td>
<td>&nbsp;'.htmlspecialchars($tracker).'</td>
</tr>
<tr style="height: 50px;">
<td>&nbsp;s1</td>
<td>&nbsp;'.htmlspecialchars($s1).'</td>
</tr>
<tr style="height: 50px;">
<td>&nbsp;s2</td>
<td>&nbsp;'.htmlspecialchars($s2).'</td>
</tr>
</tbody>
</table>
</body>
</html>'
;
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$reallysend = !array_key_exists('dont', $_REQUEST);
if(isset($_REQUEST['sendto']) && $email && $reallysend)
{
    mail($email, $subject, $message, $headers);
}
else if(!$reallysend)
{
    echo "Message content:\r\n";
    //header($headers);
    echo $email? $message."\r\nSent to: $email" : $message;
}
else
{
            echo "\r\nHi there";
}
?>
