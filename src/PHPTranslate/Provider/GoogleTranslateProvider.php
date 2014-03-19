<?php
namespace PHPTranslate\Provider;

class GoogleTranslateProvider extends ProviderAbstract implements ProviderInterface
{
    public function translate($text, $lang)
    {
        $url = 'http://translate.google.com/translate_a/t?client=t&ie=UTF-8&oe=UTF-8&output=json';
        $url .= '&sl='.$this->langSource;
        $url .= '&tl='.$lang;
        $url .= '&text='.urlencode($text);

        $hCurl = curl_init ($url);
        curl_setopt ($hCurl, CURLOPT_RETURNTRANSFER, true);
        $sReturn = curl_exec ($hCurl);
        $arrReturn = explode('"', $sReturn);
        return $arrReturn[1];
    }
}
