<?php
/**
 * Created by PhpStorm.
 * User: franck
 * Date: 19/03/14
 * Time: 22:59
 */

namespace Tests\PHPTranslate\Provider;

use PHPTranslate\Provider\BingTranslateProvider;

class BingTranslateProviderTest extends \PHPUnit_Framework_TestCase {
    public function testConstruct()
    {
        $this->assertInstanceOf('PHPTranslate\Provider\BingTranslateProvider', new BingTranslateProvider());
    }

    /**
     * @expectedException PHPTranslate\Exception\InvalidCredentialsException
     * @expectedExceptionMessage No API Key provided
     */
    public function testTranslateException()
    {
        $object = new BingTranslateProvider();
        $object->translate('texte', 'en-GB');
    }
}
 