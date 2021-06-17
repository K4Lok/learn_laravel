## Store data from excel csv to table in database

### Create a Mobel for the tabel
A Model in laravel is used for interact with the table from the database. For more [details](https://laravel.com/docs/8.x/eloquent).

Build a Model with command in terminal: 

> `php artisan make:model YourModel`

And you can see a `YourModel.php` file created under the `app\Models` or `app\` directory.

You might want to use `php artisan make:model YourModel --migration` instead if it's going to interact with the database?
(Not so sure, more details [here](https://laravel.com/docs/8.x/eloquent))

You can then modify the column inside the Model class
```php
class YourModel extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'TableName';
    protected $fillable = ['id', 'by_who', 'created_at'];
}
```
