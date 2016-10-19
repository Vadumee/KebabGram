<?php

namespace App\Validation\Rules;

use Respect\Validation\Rules\AbstractRule;

class ImageSize extends AbstractRule
{

	public function validate($input)
	{
		$image = $_FILES["kebab_pic_link"];
		$size = explode(".",$image['size']);
		$b = false;
		if($size[0] <= 500000) {
			$b = true;
		}
		return $b;
	}
}
