<?php

use App\StringTransformer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class StringTransformerTest extends TestCase
{
  /*
   * @return array 
   */
  public static function additionProvider(): array
  {
    return [
      ['helloWorld', 'hello world'],
      ['helloWorld', 'hello_world'],
      ['helloWorld', 'hello--world'],
      ['helloWorld', 'HELLO_WORLD'],
    ];
  }

  #[DataProvider('additionProvider')]
  public function test_the_input_string_return_camel_case(string $expected, string $input): void
  {
    $stringTransformer = new StringTransformer();
    $this->assertEquals($expected, $stringTransformer->toCamelCase($input));
  }

  // public function test_underscore_string_return_camel_case()
  // public function test_dash_string_return_camel_case()
  // public function test_double_dash_string_return_camel_case()
  // public function test_uppercase_string_return_camel_case()
}
