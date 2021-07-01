## Building API
Building an API for the front end to catch the data and display it out.

### Build a Model
A model in laravel is like the table in the database, you have to create the variable that corresponding to the table. For more [details](https://laravel.com/docs/8.x/eloquent).

Create a model by artisan command in terminal:

> `php artisan make:model YourModel --migration`

You can see a `YourModel.php` file created under the `/app/Models` directory.

Modify the Class and fit the `$fillable` array like the columns in your db.

```php
class YourModel extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'your_table'; //Here is the name of your table
    protected $fillable = ['id', 'name', 'occupation', 'created_at', 'updated_at', 'model_info'];
}
```

### Connect to the Database
I'm using the route method to show the json data in the web server.

Go to the file `api.php` under directory `/routes`
Create a route fucntion like this:

```php
Route::get('api_link_here', function(Request $request) {
  return YourModel::selectRaw('occupation', COUNT(occupation) as count)
                    ->where('created_at', '>', 'yyyy-mm-dd')
                    ->where('model_info', '=', 'condition') //Two where func means AND
                    ->orderBy('occupation', 'ASC')
                    ->paginate(); //Func paginate makes the webpage much more structure,
                                  //the parameter limit how many offset in a page.
                                  //Default 15 if not typing any parameter.
});
```

When you run your laravel server you can call your api by typing:
> `http://127.0.0.1:8000/api/api_link_here`
