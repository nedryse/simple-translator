<?php

namespace Nedryse\Nette\Localization;

use Nette\Localization\ITranslator;

/**
 * SimpleTranslator just return untranslated string
 */
class SimpleTranslator implements ITranslator
{

	/**
	 * Translates the given string
	 *
	 * @param string $message
	 * @param integer $count plural count
	 * @return string
	 */
	public function translate($message, $count = NULL)
	{
		$arguments = func_get_args();
		return vsprintf(array_shift($arguments), $arguments);
	}

}