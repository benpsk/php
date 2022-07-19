<?php
use App\Bar\MyTrait;

class MyClass 
{
    use MyTrait;

    public function foo() 
    {
        return 'Foo A';
    }

}

$a =  new MyClass();
echo $a->bar();
