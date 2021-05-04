# About this project
A repository to store some of the learning process and hopefully I can note down some of the tricky part and some methods to solve it.
I'm doing the most of it on macOS(M1).

---

# Environment Setup
### Install PHP
Let's check whether you have php or not:

> `php -v` or `php --version`

If not, install it with homebrew:

> `brew search php` (to see which version is availble)

> `brew install php`

---
### Install Composer
You can also check out the [official webpage](https://getcomposer.org/download/) for more details info.

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```
To check whether composer is installed or not:
> `php composer.phar`

After that, move the downloaded file (composer.phar) to your path. Therefore we can access the composer command more convenience.
> `mv composer.phar /usr/local/bin/composer`

To check whether successfully add in to the path or not:
> `composer --version`

---
### Setup laravel project via composer
[Official tutorial](https://laravel.com/docs/8.x#getting-started-on-macos).
Create a new laravel project by using composer.
> `composer create-project laravel/laravel example-app`

To see if it works or not, run this command to see if the website is accessible or not.
> `cd example-app`
> `php artisan serve`

---
### Install Laravel Installer
Install the Laravel Install can help you not to download the framework every time you create a laravel project.
> `composer global require laravel/installer`

You will find out command not found: laravel if you directly tpye the command, you have to type ~/.composer/vendor/bin/laravel.

To reduce the work, by adding the path of laravel to the $PATH in ~/.zshrc

Get the path: `pwd`
> `vim ~/.zshrc`, `sudo vim /etc/paths`. add the path in both of the file.

Then by using this command, you can create a laravel project without downloading from the internet.
> `laravel new example-app`

And run it by `php artisan serve`.

---
