<?php
namespace PHPTranslate\Provider;

abstract class ProviderAbstract{
  protected $langSource;

  public function setSourceLang($lang){
    $this->langSource = $lang;
    return $this;
  }

  abstract public function translate($text, $lang);
}