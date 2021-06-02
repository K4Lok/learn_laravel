## Custom Commands

Go to the offical website [(console)](https://laravel.com/docs/8.x/artisan) for more details.

___

## Generating Commands
With build-in artisan command, it can create a new command class in the `app/Console/Commands` directory.

> ` php artisan make:command CallAPI ` //for say, a command use for call API

> ```php
> <?php
>
> /* The name and signature of the console command. 
>    @var string */
>  protected $signature = 'api:get {arg}';
> 
> /* The console command description. 
>    @var string */
>  protected $description = 'Call the API from web';
>
> /* Execute the console command.
>    @return mixed */
>  public function handle()
>  {
>     //...
>  }
> ```

___

## Use the Commands

Basically, you can type `php artisan api:get` in the terminal and it will run the handle function.

You can also add a arguement variable at the end of $signature within a curly braces,
 
> `php artisan api:get https://api-call.com`, just for example.

> ```php
> <?php
>  public function handle()
>  {
>     $url = "https://api-call.com/id=" . {!arg} . "&apikey=xxxxxxxxxxxxxxxxxxxxxxx"; // just an example
>     //... request api and get back the json data
>  }
> ```

You can use the arg in this way.
