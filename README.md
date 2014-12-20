#nedryse/simple-translator (cc)#
Pavel Železný (2bfree), 2014 ([pavelzelezny.cz](http://pavelzelezny.cz))

## Requirements ##

[Nette Framework 2.2.0](http://nette.org) or higher

## Documentation ##

Simple implementation of [\Nette\Localization\ITranslator](http://api.nette.org/2.2/Nette.Localization.ITranslator.html) interface. Just print the key as is. Usefull when you have no time for managing gettext translation but want translatable application in the future.

## Instalation ##

Prefered way to intall is by [Composer](http://getcomposer.org)

	composer require nedryse/simple-translator:~1.0.0

Or by manualy adding into the [composer.json](https://getcomposer.org/doc/04-schema.md#json-schema)

	{
		"require":{
			"nedryse/simple-translator": "~1.0.0"
		}
	}

## Setup ##

Add following code into the [config.neon](http://doc.nette.org/en/2.2/configuring#toc-framework-configuration)

	common:
		extensions:
			translator: Nedryse\Nette\Localization\SimpleTranslatorExtension

## Usage ##

In Latte templates of presenters and components you can use standard [tlanslator macro](http://doc.nette.org/cs/2.2/default-macros#toc-preklady)

	{_'Translatable text'}
	{_'We have %d translatable text', $count}
	{_'Field %s have to be translated', $fieldName}
	{_'Field %s with %d letter have to be translated', $fieldName, $count}