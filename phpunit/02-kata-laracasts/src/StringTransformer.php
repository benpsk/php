<?php

namespace App;

class StringTransformer
{
  public function toCamelCase(string $input): string
  {
    /*
    $string = str_replace("-", "_", $inputString)
    $words = explode(' ', strtolower($string));
   */

    $input = preg_replace('/[^a-zA-Z0-9]+/', ' ', $input);
    $words = explode(' ', strtolower($input));

    $camelCase = $words[0];
    for ($i = 1; $i < count($words); $i++) {
      $camelCase .= ucfirst($words[$i]);
    }
    return $camelCase;
  }
}
