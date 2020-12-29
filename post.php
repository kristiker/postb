<?php

include 'p_include.php';

$ipinfo_token = '';
$telegram_bot_token = '';

// ?n=adv&country={country}&am={amount}&hit={hit_time}&sale={sale_time}&ip={ip}&tr={tracker}&to={chat_id}&switch=notrack%20{chat_id}%20k%20{chat_id}

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (  !array_key_exists('n', $_GET)
   /*|| !array_key_exists('am', $_GET)*/
   && !array_key_exists('dont', $_GET))
    {
        // Bye I have no duty here.
        echo 'Hello bye...';
        die();
    }

// ?n=adv&country={country}&am={amount}&hit={hit_time}&sale={sale_time}&ip={ip}&to=k

if(isset($_GET['hit'      ])) { $hit_time  = $_GET['hit'     ]; } else { $hit_time  = '0'; }
if(isset($_GET['sale'     ])) { $sale_time = $_GET['sale'    ]; } else { $sale_time = '0'; }

if(isset($_GET['ip'       ])) { $ip        = $_GET['ip'      ]; } else { $ip        = ''; }
if(isset($_GET['am'       ])) { $amount    = $_GET['am'      ]; } else { $amount    = '0'; }
if(isset($_GET['plat'     ])) { $platform  = $_GET['plat'    ]; } else { $platform  = 'mobile'; }
if(isset($_GET['country'  ])) { $country   = $_GET['country' ]; } else { $country   = ''; }

if(isset($_GET['t'/*time*/])) { $time2     = $_GET['t'       ]; } else { $time2     = ''; }
if(isset($_GET['d'/*date*/])) { $date2     = $_GET['d'       ]; } else { $date2     = ''; }
if(isset($_GET['s'/*src*/ ])) { $source    = $_GET['s'       ]; } else { $source    = ''; }
if(isset($_GET['g'/*goal*/])) { $goal_id   = $_GET['g'       ]; } else { $goal_id   = '0'; }
if(isset($_GET['o'/*offr*/])) { $offer     = $_GET['o'       ]; } else { $offer     = ''; }
if(isset($_GET['n'/*netw*/])) { $network   = $_GET['n'       ]; } else { $network   = 'adv'; }

if(isset($_GET['tr'       ])) { $tracker   = $_GET['tr'      ]; } else { $tracker   = 'notrack'; }
if(isset($_GET['s1'       ])) { $s1        = $_GET['s1'      ]; } else { $s1        = ''; }
if(isset($_GET['s2'       ])) { $s2        = $_GET['s2'      ]; } else { $s2        = ''; }


$userip = $_SERVER['REMOTE_ADDR'];

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

if(isset($_GET['to']))
{
    $to = $_GET['to'];
    
}
$reallysend = !array_key_exists('dont', $_GET);


// &to=owner
$owner_telegram_id = 0
$to[0] == 'owner' ? $chatid = $owner_telegram_id : $chatid = $to;

// add &switch=notrack {chatid} track1 {chatid} track2 {chatid}
// to switch chatid based on tracker 
if(isset($_GET['switch']))
{
    $arrKeyValue = explode(" ", $_GET['switch']);
    if(is_numeric($arrKeyValue[0]))
    {
        array_unshift($arrKeyValue, "notrack");
    }
    if(sizeof($arrKeyValue) % 2 != 0){ // key:value pairs are odd!
        array_pop($arrKeyValue);
    }

    for ($i = 0; $i <= count($arrKeyValue); $i++) { // 
        $k = $arrKeyValue[$i];
        $v = $arrKeyValue[$i+1];
        
        if($tracker == $k){
            $chatid = $v;
            break;
        }
        $i++;
    }
}
switch($network)
{
    
    case 'adv': default:
        $msg = "*\$$amount* nga $shteti\nRegjist:  $hit_time\nKonfirm:  $sale_time\nIP:  $ip\nAdresa  $ipdetails\nTracker  $tracker"; //Tracker: $tracker\ns1: $s1\ns2: $s2";
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
    sendMessage($chatid, $msg, $telegram_bot_token);
    echo 'Okej';
}
else // don't really send - just print
{
    echo "Sent to $to-\r\nMessage content:\r\n$msg";
}
?>
