Error handling in php especially in a framwork, need a blackslash in front of the Exception to make try catch syntax works.

```php
<?php
namespace Module\Example;

class Test
{
    try{

    } catch(Exception $e) { // will look up Module\Example\Exception

    }

    try{

    } catch(\Exception $e) { // will look up Exception from global space

    }
}
```
Code from the [internet](https://stackoverflow.com/questions/44867463/difference-between-exception-e-and-exception-e-in-trycatch/44867502).
