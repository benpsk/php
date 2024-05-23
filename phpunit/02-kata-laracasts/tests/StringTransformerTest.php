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
  public function testCamelCase(string $expected, string $input): void
  {
    $stringTransformer = new StringTransformer();
    $this->assertEquals($expected, $stringTransformer->toCamelCase($input));
  }
}
