<?php

namespace Tests\PHPTranslate;

use PHPTranslate\PHPTranslate;
use PHPTranslate\Provider\GoogleTranslateProvider;

class PHPTranslateTest extends \PHPUnit_Framework_TestCase {
    public function testConstruct()
    {
        $this->assertInstanceOf('PHPTranslate\PHPTranslate', new PHPTranslate());
    }

    public function testSetLang()
    {
        $object = new PHPTranslate();
        $this->assertInstanceOf('PHPTranslate\PHPTranslate', $object->setLang('fr'));
        $this->assertEquals('fr', $object->getLang());
    }

    public function testSetAdapter()
    {
        $object = new PHPTranslate();
        $adapter = new GoogleTranslateProvider();
        $this->assertInstanceOf('PHPTranslate\PHPTranslate', $object->setAdapter($adapter));
    }

    /**
     * @expectedException PHPTranslate\Exception\InvalidAdapterException
     * @expectedExceptionMessage No adapter defined for PHPTranslate
     */
    public function testTranslateException()
    {
      $object = new PHPTranslate();
      $object->translate('texte', 'en-GB');
    }

    public function testTranslate()
    {
      $adapter = new GoogleTranslateProvider();

      $object = new PHPTranslate($adapter);
      $object->setLang('fr');
      $this->assertNotEmpty($object->translate('texte', 'en-GB'));
    }
}
 