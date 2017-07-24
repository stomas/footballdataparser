#About

This package parses CSV files from http://www.football-data.co.uk/data.php and adds them to Database.

##Installation

1. Download package (for now simple clone project)
2. Add Service provider to you config/app.php.

```
'providers' => [
 Stomas\Footballdataparser\FootballDataServiceProvider::class
 ]
```
3. Move all data from package folder to desired folders with command `php artisan vendor:publish`
4. Migrate all databases with `php artisan migrate`
5. `Go to www.your-domain.com/footballdata` and follow instructions

