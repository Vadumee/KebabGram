<?php

namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class SearchFormatException extends ValidationException
{
	public static $defaultTemplates = [
			self::MODE_DEFAULT => [
					self::STANDARD => 'La recherche par tag ne peut pas rechercher un tag nul.',
			],
	];
}
