# lassehaslev/universal-objects
> Create global classes with ease!

## Install
```
composer require lassehaslev/universal-objects
```

## Usage
Extend global behavior:
```php
class MyClass extends LasseHaslev\UniversalObjects\Object {}
```

#### Create
Create a global instance simple with create or get.
First time you call this method you create a new instance. 
But all the next time you call these methods, you simple return the existsing instance for that particular object.
```php
MyClass::create(); // Create new or gets existing instance of my class
// or use alias "get" function
MyClass::get(); // alias for create()
```

Create different global object to use other places.
Note that the first instance will still be used, and 'second' will only create a new instance
```php
$firstInstance = MyClass::create(); // Creates new instance
$secondInstance = MyClass::create( 'second' ); // Creates new instance

$firstInstance = MyClass::get(); // Get first instance
$secondInstance = MyClass::get( 'second' ); // Get second instance
```

To force create a new instance you can call createNew function
```php
$firstInstance = MyClass::create(); // Creates new instance
$firstInstance = MyClass::createNew(); // Creates new instance
```

#### Destroy
You can also destroy instances you have created. If you run create again, they will create new fresh instances
```php
$firstInstance = MyClass::create(); // Creates new instance
$secondInstance = MyClass::createNew( 'second' ); // Creates new instance

$firstInstance = MyClass::destroy(); // Deletes instance $firstInstance
$secondInstance = MyClass::destroy( 'second' ); // Deletes instance $seondInstance
```


```php
$firstInstance = MyClass::create(); // Creates new instance
$secondInstance = MyClass::createNew( 'second' ); // Creates new instance

$firstInstance = MyClass::destroyAll(); // Destroy all instances of class ($firstInstance, $secondInstance)
```

## Development
```
# Install dependencies
composer install

# Install dependencies for automatic tests
yarn
```


#### Runing tests
``` bash
# Run one time
npm run test

# Automaticly run test on changes
npm run dev
```
