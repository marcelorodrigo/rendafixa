<?php
namespace App\Utils;
class Numeric
{
	const DOT = '.';
	const COMMA = ',';

	public static function toFloat($value)
	{
		$floatValue = $value;
		if (!is_float($value)) {
			$withoutDot = str_replace(self::DOT, '', (string)$value);
			$floatValue = (float)str_replace(self::COMMA, self::DOT, $withoutDot);
		}
		return $floatValue;
	}
}