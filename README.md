<h1 align="center">
    Enum
</h1>

This library extends [myclabs/php-enum](https://github.com/myclabs/php-enum) with ability to 
compare enums by their identity (if static methods are used to create them).

## Usage

1. Require this package:

    ```bash
    $ composer require pamil/enum
    ```

2. Create your enum:

    ```php
    <?php
    
    use Pamil\Enum\Enum;
    
    /**
     * @method static static active()
     * @method static static inactive()
     */
    final class SampleEnum extends Enum
    {
        protected const active = 1;
        protected const inactive = 2;
    }
    ```

3. Compare your enums by identity:

    ```php
    var_dump(SampleEnum::active() === SampleEnum::active()); // true
    ```

## Caveats

* It does not work when creating enums by the constructor:

    ```php
    var_dump(new SampleEnum(1) === SampleEnum::active()); // false
    ```
    
* It does not work when you deserialise serialised enums:

    ```php
    var_dump(unserialize(serialize(SampleEnum::active())) === SampleEnum::active());
    ```
