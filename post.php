<?php

include 'p_include.php';

// 
$ipinfo_token = '';
$telegram_bot_token = '';

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (  !array_key_exists('n', $_REQUEST)
   /*|| !array_key_exists('am', $_REQUEST)*/
   && !array_key_exists('dont', $_REQUEST))
    {
        // Bye I have no duty here.
        echo 'Hello Kristi was herre.'; //...
        die();
    }

header('Content-type: text/html; charset=iso-8859-1');

if(isset($_REQUEST['hit'      ])) { $hit_time  = date('M j G:i:s', $_REQUEST['hit'     ]); } else { $hit_time  = '0'; }
if(isset($_REQUEST['sale'     ])) { $sale_time = date('M j G:i:s', $_REQUEST['sale'    ]); } else { $sale_time = '0'; }

if(isset($_REQUEST['ip'       ])) { $ip        = $_REQUEST['ip'      ]; } else { $ip        = ''; }
if(isset($_REQUEST['am'       ])) { $amount    = $_REQUEST['am'      ]; } else { $amount    = '0'; }
if(isset($_REQUEST['plat'     ])) { $platform  = $_REQUEST['plat'    ]; } else { $platform  = 'mobile'; }
if(isset($_REQUEST['country'  ])) { $country   = $_REQUEST['country' ]; } else { $country   = ''; }

if(isset($_REQUEST['t'/*time*/])) { $time2     = $_REQUEST['t'       ]; } else { $time2     = ''; }
if(isset($_REQUEST['d'/*date*/])) { $date2     = $_REQUEST['d'       ]; } else { $date2     = ''; }
if(isset($_REQUEST['s'/*src*/ ])) { $source    = $_REQUEST['s'       ]; } else { $source    = ''; }
if(isset($_REQUEST['g'/*goal*/])) { $goal_id   = $_REQUEST['g'       ]; } else { $goal_id   = '0'; }
if(isset($_REQUEST['o'/*offr*/])) { $offer     = $_REQUEST['o'       ]; } else { $offer     = ''; }
if(isset($_REQUEST['n'/*netw*/])) { $network   = $_REQUEST['n'       ]; } else { $network   = 'adv'; }

if(isset($_REQUEST['tr'       ])) { $tracker   = $_REQUEST['tr'      ]; } else { $tracker   = ''; }
if(isset($_REQUEST['s1'       ])) { $s1        = $_REQUEST['s1'      ]; } else { $s1        = ''; }
if(isset($_REQUEST['s2'       ])) { $s2        = $_REQUEST['s2'      ]; } else { $s2        = ''; }


$userip = getUserIP();

if(!empty($ip))
{
    $cache = ip_details($ip);
    $ipdetails = $cache['city'].', '.$cache['region'].', '.$cache['country'];
}
else
{
    $ip = "Report $userip";
    $ipdetails = '';
}

$country = strtoupper($country);

if(!isset($countryList[$country])) // 'UNITED STATES' or ''
{
    if(empty($country)) // ''
    {
        if(!empty($ipdetails))
        {
            $country = $cache['country'];
            
            $shteti = code_to_country($cache['country']);
        }
        else
        {
            $shteti = 'Antarktida';
        }
    }
    else // 'UNITED STATES'
    {
        if(!empty($ipdetails))
        {
            $country = $cache['country'];
            
            $shteti = code_to_country($cache['country']);
        }
        else
        {
            $shteti = $country;
        }
    }
}
else
{
     $shteti = code_to_country($country);
}

if(isset($_REQUEST['to']))
{
    $to = $_REQUEST['to'];
    
}
$reallysend = !array_key_exists('dont', $_REQUEST);

    
$token = '<telegram_bot_token>';

// hardcoded owner
$to[0] == 'k' ? $chatid = '<owner_telegram_id>' : $chatid = $to;

switch($network)
{
    
    case 'adv': default:
        $msg = "---------------\n*\$$amount* nga $shteti\nRegjist:  $hit_time\nKonfirm:  $sale_time\nIP:  $ip\nAdresa  $ipdetails\nTracker  $tracker\n---------------"; //Tracker: $tracker\ns1: $s1\ns2: $s2";
        break;
    case 'crak':
        $msg = "*[ \$$amount ]* nga $shteti - $goal_id\n$offer\nKoha $time2 @ $date2\nIP: $ip\nAdresa $ipdetails";
        break;
    case 'imo':
        $msg = "*\$$amount* nga $shteti"; // *$2* nga Anglia"
        break;
    
    //case 'los':
    
    //default: $msg = "Nga $country *\$$amount* \nRregjistruar $hit_time \nKonfirmuar $sale_time \nIP: $ip \nTracker: $tracker \ns1: $s1 \ns2: $s2";
}

if($reallysend)
{
    sendMessage($chatid, $msg, $token);
    echo 'Okej';
}
else // don't really send - just print
{
    echo "Sent to $to-\r\nMessage content:\r\n$msg";
}
?>
