<?php

namespace Nedryse\Nette\Localization;

use Nette\DI\CompilerExtension;
use Nette\DI\ContainerBuilder;

/**
 * SimpleTranslatorExtension simplify service loading into the config.neon
 */
class SimpleTranslatorExtension extends CompilerExtension
{

	/**
	 * Processes configuration data
	 *
	 * @return void
	 */
	public function loadConfiguration()
	{
		$builder = $this->getContainerBuilder();
		$this->parseServices($builder, $this->loadFileConfiguration());
	}

	/**
	 * File configuration loader
	 *
	 * @return array
	 */
	public function loadFileConfiguration()
	{
		return $this->loadFromFile(__DIR__ . '/extension.neon');
	}

	/**
	 * Parses section 'services' from (unexpanded) configuration file.
	 *
	 * @param ContainerBuilder $builder
	 * @param array $config
	 * @param string $namespace
	 * @return void
	 */
	public function parseServices(ContainerBuilder $builder, array $config, $namespace = NULL)
	{
		$this->compiler->parseServices($builder, $config, $namespace);
	}

}
