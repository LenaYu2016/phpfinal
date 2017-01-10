<?php
namespace Project\Classes;
ini_set('allow_url_fopen', 'On');
ini_set('allow_url_include', 'On');

/**
 * Class Curl
 * Curl wrapper
 * @package Project\Classes
 * @author Yi
 */
class Curl {

  const HEADER_OAUTH = ['Accept: application/json', 'Content-type: application/x-www-form-urlencoded'];

  // Sends GET / POST request to other pages and get the return value
  public static function post( $url, $data, $header) {
    $options = [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_USERAGENT => 'Mozilla/5.0',
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query($data),
        CURLOPT_HTTPHEADER => $header
    ];
    $ch = curl_init();
    curl_setopt_array($ch, $options);
    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);
    return empty($error) ? $response : false;
  }

  /**
   * @param string $url Target URL
   * @param array $params Array of GET params
   * @return bool|string
   */
  public static function get($url, $params) {
    $ch = curl_init();
    $url = $url . '?' . http_build_query($params, '', '&amp;');
    $options = [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_USERAGENT => 'Mozilla/5.0'
    ];
    curl_setopt_array($ch, $options);
    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);
    return empty($error) ? $response : false;
  }

}