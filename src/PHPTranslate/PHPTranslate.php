<?php

namespace PHPTranslate;

use PHPTranslate\Provider\ProviderInterface;
use PHPTranslate\Exception\InvalidAdapterException;

class PHPTranslate
{
    /**
     * @var Provider\ProviderInterface
     */
    private $provider;
    /**
     * @var string
     */
    private $lang;

    public function __construct(ProviderInterface $provider = null)
    {
        $this->provider = $provider;
    }

    public function setLang($lang)
    {
        $this->lang = $lang;
        return $this;
    }

    public function setAdapter(ProviderInterface $provider)
    {
        $this->provider = $provider;
        return $this;
    }

    public function translate($text, $lang)
    {
        if(!$this->provider instanceof ProviderInterface) {
            throw new InvalidAdapterException('No adapter defined for PHPTranslate');
        }

        $this->provider->setSourceLang($this->lang);
        return $this->provider->translate($text, $lang);
    }
}
