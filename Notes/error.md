## Error Handling

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

___

## Error Logging
Output the error into a text file to specific directory.

```php
<?php
    $errorLogPath = "./Log/error_log.txt" //./ start from the root directory of the project
    
    if(isset($jsonData->errorsExist)) { // getting json data from web api
        $errorString = "Error on sth" . $error_code;
        
        if(!is_file($errorLogPath)) { // create file if it doesn't exist 
            fopen($errorLogPath, "w");
        }
        error_log($errorString.PHP_EOL, 3, $errorLog);
        
    }
```
More detail on [fopen()](https://www.php.net/manual/en/function.fopen.php), [error_log()](https://www.php.net/manual/en/function.error-log), [.PHP_EOL](https://stackoverflow.com/questions/2987465/newline-in-error-log-in-php/29965983)

You can create a [folder](https://www.delftstack.com/howto/php/how-to-create-a-folder-if-it-does-not-exist-in-php/) as well.
