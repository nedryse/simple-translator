<?php

use Nedryse\Nette\Localization\SimpleTranslatorExtension;
use Nette\DI\Compiler;
use Nette\DI\ContainerBuilder;

class SimpleTranslatorExtensionTest extends PHPUnit_Framework_TestCase
{

	public function testLoadConfiguration()
	{
		$loadedConfiguration = array();

		/* @var $containerBuilderMock ContainerBuilder */
		$containerBuilderMock = $this->getMock('Nette\DI\ContainerBuilder');

		/* @var $simpleTranslatorExtensionMock SimpleTranslatorExtension */
		$simpleTranslatorExtensionMock = $this->getMockBuilder('Nedryse\Nette\Localization\SimpleTranslatorExtension')
				->setMethods(array('getContainerBuilder', 'loadFileConfiguration', 'parseServices'))
				->getMock();
		$simpleTranslatorExtensionMock->expects($this->once())
				->method('getContainerBuilder')
				->will($this->returnValue($containerBuilderMock));
		$simpleTranslatorExtensionMock->expects($this->once())
				->method('loadFileConfiguration')
				->will($this->returnValue($loadedConfiguration));
		$simpleTranslatorExtensionMock->expects($this->once())
				->method('parseServices')
				->with($this->equalTo($containerBuilderMock), $this->equalTo($loadedConfiguration));

		$this->assertNull($simpleTranslatorExtensionMock->loadConfiguration());
	}

	public function testLoadFileConfiguration()
	{
		$loadedConfiguration = array();

		/* @var $simpleTranslatorExtensionMock SimpleTranslatorExtension */
		$simpleTranslatorExtensionMock = $this->getMockBuilder('Nedryse\Nette\Localization\SimpleTranslatorExtension')
				->setMethods(array('loadFromFile'))
				->getMock();
		$simpleTranslatorExtensionMock->expects($this->once())
				->method('loadFromFile')
				->with($this->equalTo($this->getClassLocation('Nedryse\Nette\Localization\SimpleTranslatorExtension') . '/extension.neon'))
				->will($this->returnValue($loadedConfiguration));
		$this->assertSame($loadedConfiguration, $simpleTranslatorExtensionMock->loadFileConfiguration());
	}

	public function testLoadFileConfigurationContent()
	{
		$expectedConfiguration = array('services' => array(
				'simpletranslator.translator' => array(
					'class' => 'Nedryse\Nette\Localization\SimpleTranslator'
				),
				'nette.templateFactory' => array(
					'class' => 'Nedryse\Nette\Bridges\ApplicationLatte\TranslatableTemplateFactory'
				),
		));

		$simpleTranslatorExtension = new SimpleTranslatorExtension;
		$simpleTranslatorExtension->setCompiler(new Compiler, 'test');
		$this->assertSame($expectedConfiguration, $simpleTranslatorExtension->loadFileConfiguration());
	}

	public function testParseServices()
	{
		$this->markTestSkipped('No way to test static method Nette\DI\Compiler::parseServices');
	}

	/**
	 * Directory path of class file getter
	 *
	 * @param string $class
	 * @return string
	 */
	protected function getClassLocation($class)
	{
		$reflector = new ReflectionClass($class);
		return dirname($reflector->getFileName());
	}

}
