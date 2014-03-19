<?php
  include_once 'vendor/autoload.php';

  /**
   * https://datamarket.azure.com/dataset/bing/microsofttranslator
   */
  define('API_KEY_BING_TRANSLATOR', '');

  $adapterGoogleTranslate = new \PHPTranslate\Provider\GoogleTranslateProvider();
  $adapterBingTranslate = new \PHPTranslate\Provider\BingTranslateProvider(API_KEY_BING_TRANSLATOR);

  $client = new \PHPTranslate\PHPTranslate();
  $client->setLang('fr');

  $client->setAdapter($adapterGoogleTranslate);
  echo '-------- GoogleTranslateProvider'.PHP_EOL;
  echo $client->translate('Bonjour tout le monde', 'de').PHP_EOL;
  echo $client->translate('Bonjour tout le monde', 'en').PHP_EOL;
  echo $client->translate('Bonjour tout le monde', 'hi').PHP_EOL;
  echo $client->translate('Bonjour tout le monde', 'it').PHP_EOL;
  echo $client->translate('Bonjour tout le monde', 'fi').PHP_EOL;
  echo $client->translate('Bonjour tout le monde', 'zh-CN').PHP_EOL;

  $client->setAdapter($adapterBingTranslate);
  echo '-------- BingTranslateProvider'.PHP_EOL;
  echo $client->translate('Bonjour tout le monde', 'de').PHP_EOL;
  echo $client->translate('Bonjour tout le monde', 'en').PHP_EOL;
  echo $client->translate('Bonjour tout le monde', 'hi').PHP_EOL;
  echo $client->translate('Bonjour tout le monde', 'it').PHP_EOL;
  echo $client->translate('Bonjour tout le monde', 'fi').PHP_EOL;
  echo $client->translate('Bonjour tout le monde', 'zh-CHS').PHP_EOL;