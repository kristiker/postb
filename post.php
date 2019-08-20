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
