<?php

use Nedryse\Nette\Localization\SimpleTranslator;

class SimpleTranslatorTest extends PHPUnit_Framework_TestCase
{

	public function testTranslate()
	{
		$simpleTranslator = new SimpleTranslator;

		$this->assertSame('Translatable text', $simpleTranslator->translate('Translatable text'));
		$this->assertSame('We have 5 translatable text', $simpleTranslator->translate('We have %d translatable text', 5));
		$this->assertSame('Field test have to be translated', $simpleTranslator->translate('Field %s have to be translated', 'test'));
		$this->assertSame('Field test with 5 letter have to be translated', $simpleTranslator->translate('Field %s with %d letter have to be translated', 'test', 5));
	}

}
