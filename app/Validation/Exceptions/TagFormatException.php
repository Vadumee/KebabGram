<?php

namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class TagFormatException extends ValidationException
{
	public static $defaultTemplates = [
			self::MODE_DEFAULT => [
					self::STANDARD => 'Un tag doit explicitement commencer avec un "#".',
			],
	];
}
