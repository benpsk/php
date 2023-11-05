<?php
class Address
{

  protected $link;

  public function __construct(
    public string           $street,
    protected string        $city,
    private readonly string $state,
    private ?int   $zip = null,
    private readonly string $type = 'address'
  ) {
    $this->connect();
    dump('Open connection');
  }

  public function __invoke()
  {
    //  dump('Address object is called as a function!');
  }

  public function __get($name)
  {
    dump("Address `$name` property was retrieve using __get");
    if (property_exists($this, $name)) {
      return $this->$name;
    }
    return  null;
  }

  public function __set($name, $value)
  {
    dump("Address `$name` property was __set to: `$value`");
    if (property_exists($this, $name)) {
      $this->$name = $value;
    }
  }

  public function __isset($name)
  {
    dump("Address `$name` property checked if __isset");
    return isset($this->$name);
  }

  public function __unset($name)
  {
    dump("Address `$name` property was __unset");
    $this->{$name} = null;
  }

  public function __toString()
  {
    dump("Address properties were returned as string using __toString");
    return "{$this->type}: {$this->street}, {$this->city}, {$this->state}, {$this->zip}.";
  }

  public function __clone()
  {
    dump('Address object called __clone');
    trigger_error('Cloning forbidden.', E_USER_ERROR);
  }

  public function __sleep()
  {
    dump('Address attributes to serialize, called __sleep');
    return array('street', 'zip');
  }

  public function __wakeup()
  {
    dump('Reconnect to DB __wakeup');
    $this->connect();
  }

  public function __destruct()
  {
    dump('Close connection to DB and do other cleanups');
    $this->closeConnection();
  }

  public function __call($name, $arguments)
  {
    dump("Calling object method '$name' " . implode(', ', $arguments));
    if ($name === 'format') {
      return $this->displayAddress();
    }
  }

  public static function __callStatic($name, $arguments)
  {
    dump("Calling static method '$name' " . implode(', ', $arguments));
    if ($name === 'getDefaultAddress') {
      return new Address('123 Main St', 'Meriland', 'US', 1000);
    }
  }

  private function connect(): void
  {
    // $this->link = new mysqli('$servername', '$username', '$password');
  }

  private function closeConnection(): void
  {
    // $this->link->close();
  }

  public function displayAddress(): string
  {
    return "{$this->street}, {$this->city}, {$this->state}";
  }
}
