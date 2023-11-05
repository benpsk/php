<?php

$address = new Address('Blv. Bajram Curri', 'Tirana', 'Albania', 1040);

echo "Full address as string: {$address}\n";
echo "\n <br>";

// No magic method called.
$address->street = 'Blv. Zogu 1';

// Access properties using __set since is protected
$address->city = 'London';

// Access properties using __get
echo "City: {$address->city} \n";
echo "\n <br>";

// Check if a property is set using __isset
echo isset($address->zip) ? 'ZIP is set' : 'ZIP is not set';
echo "\n <br>";

// Convert the object to a string using __toString
echo "Full address as string: {$address}\n";
echo "\n <br>";

// Unset a property using __unset
unset($address->zip);
echo isset($address->zip) ? 'ZIP is set' : 'ZIP is not set';
echo "\n <br>";

// Set object properties using __sleep
$serialized = serialize($address);
echo "Object address serialized: $serialized";
echo "\n <br>";

// Call a method using __call
echo "Formatted address:" . $address->format();
echo "\n <br>";

// Call a static method using __callStatic
$defaultAddress = Address::getDefaultAddress(1);
echo "\nDefault Address: {$defaultAddress}\n";
echo "\n <br>";

// Call __clone method of object.
$newAddress = clone $address;
