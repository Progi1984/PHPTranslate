<?php
namespace PHPTranslate\Provider;

use \PHPTranslate\Exception\InvalidCredentialsException;

/**
 * Class BingTranslateProvider
 * @package PHPTranslate\Provider
 * @link https://datamarket.azure.com/dataset/bing/microsofttranslator#schema
 */
class BingTranslateProvider extends ProviderAbstract implements ProviderInterface
{
    protected $apiKey;

    public function __construct($apiKey = null)
    {
        $this->apiKey = $apiKey;
    }

    public function translate($text, $lang)
    {
        if (null === $this->apiKey || '' === $this->apiKey) {
            throw new InvalidCredentialsException('No API Key provided');
        }

        $url = 'https://api.datamarket.azure.com/Bing/MicrosoftTranslator/v1/Translate?';
        $url .= 'Text=%27'.urlencode($text).'%27';
        $url .= '&From=%27'.$this->langSource.'%27';
        $url .= '&To=%27'.$lang.'%27';

        $hCurl = curl_init ($url);
        curl_setopt($hCurl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($hCurl, CURLOPT_USERPWD, $this->apiKey.':'.$this->apiKey);
        curl_setopt($hCurl, CURLOPT_RETURNTRANSFER, true);
        $sReturn = curl_exec($hCurl);
        $arrReturn = explode('<d:Text m:type="Edm.String">', $sReturn);
        $arrReturn = explode('</d:Text>', $arrReturn[1]);
        return $arrReturn[0];
    }
}
