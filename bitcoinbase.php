<?php
/**
 * bicoinbase.php
 *
 * Base Class to get Json 
 *
 * @category   CategoryName
 * @package    bitcoin
 * @author     Ingo Eyring <ingoeyring@googlemail.com
 * @copyright  2019 Ingo
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id:$
 */
class bitcoinbase {

    protected $_jsonArray;

    protected function getJson($jsonurl){
        $jsonData = file_get_contents($jsonurl);  // faster as Curl
        # Decide what to do based on return value:
        if ($jsonData === FALSE) {
            echo "Failed to open the URL ", htmlspecialchars($url);
        } elseif ($jsonData === NULL) {
            echo "Function is disabled.";
        } else {
            $this->_jsonArray = $this->json_validate($jsonData);
        }
    }
    
    protected function json_validate($string,$assoc=true) {
        // decode the JSON data
        $result = json_decode($string,$assoc);

        // switch and check possible JSON errors
        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                $error = ''; // JSON is valid // No error has occurred
                break;
            case JSON_ERROR_DEPTH:
                $error = 'The maximum stack depth has been exceeded.';
                break;
            case JSON_ERROR_STATE_MISMATCH:
                $error = 'Invalid or malformed JSON.';
                break;
            case JSON_ERROR_CTRL_CHAR:
                $error = 'Control character error, possibly incorrectly encoded.';
                break;
            case JSON_ERROR_SYNTAX:
                $error = 'Syntax error, malformed JSON.';
                break;
            // PHP >= 5.3.3
            case JSON_ERROR_UTF8:
                $error = 'Malformed UTF-8 characters, possibly incorrectly encoded.';
                break;
            // PHP >= 5.5.0
            case JSON_ERROR_RECURSION:
                $error = 'One or more recursive references in the value to be encoded.';
                break;
            // PHP >= 5.5.0
            case JSON_ERROR_INF_OR_NAN:
                $error = 'One or more NAN or INF values in the value to be encoded.';
                break;
            case JSON_ERROR_UNSUPPORTED_TYPE:
                $error = 'A value of a type that cannot be encoded was given.';
                break;
            default:
                $error = 'Unknown JSON error occured.';
                break;
        }

        if ($error !== '') {
            // throw the Exception or exit // or whatever :)
            exit($error);
        }

        // everything is OK
        return $result;
    }
}