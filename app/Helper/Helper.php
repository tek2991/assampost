<?php
namespace App\Helper;
use Request;
use App\Models\LogActivity as LogActivityModel;
class Helper
{
public static function  cryptoJsAesDecrypt($passphrase, $jsonString)
{
    $jsondata = json_decode($jsonString, true);
    try {
        $salt = hex2bin($jsondata["s"]);
        $iv = hex2bin($jsondata["iv"]);
    } catch (Exception $e) {
        return null;
    }
    $ct = base64_decode($jsondata["ct"]);
    $concatedPassphrase = $passphrase . $salt;
    $md5 = array();
    $md5[0] = md5($concatedPassphrase, true);
    $result = $md5[0];
    for ($i = 1; $i < 3; $i++) {
        $md5[$i] = md5($md5[$i - 1] . $concatedPassphrase, true);
        $result .= $md5[$i];
    }
    $key = substr($result, 0, 32);
    $data = openssl_decrypt($ct, 'aes-256-cbc', $key, true, $iv);
    return $data;
    return json_decode($data, true);
}
/**
 * Encrypt value to a cryptojs compatiable json encoding string
 *
 * @param mixed $passphrase
 * @param mixed $value
 * @return string
 */
public  static function cryptoJsAesEncrypt($passphrase, $value)
{
    $salt = openssl_random_pseudo_bytes(8);
    $salted = '';
    $dx = '';
    while (strlen($salted) < 48) {
        $dx = md5($dx . $passphrase . $salt, true);
        $salted .= $dx;
    }
    $key = substr($salted, 0, 32);
    $iv = substr($salted, 32, 16);
    $encrypted_data = openssl_encrypt(json_encode($value), 'aes-256-cbc', $key, true, $iv);
    $data = array("ct" => base64_encode($encrypted_data), "iv" => bin2hex($iv), "s" => bin2hex($salt));
    return json_encode($data);
}

public static function addToLog($subject)
{
    $log = [];
    $log['subject'] = $subject;
    $log['url'] = Request::fullUrl();
    $log['method'] = Request::method();
    $log['ip'] = Request::ip();
    $log['agent'] = Request::header('user-agent');
    $log['user_id'] = auth()->check() ? auth()->user()->id : 1;
    LogActivityModel::create($log);
}

}