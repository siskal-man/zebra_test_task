# Zebra test task

## Installation

PHP 8.0 and Laravel 9 or higher are required

```sh
git clone https://github.com/siskal-man/zebra_test_task.git
cd zebra_test_task
composer install
```
## Use

```sh
./vendor/bin/sail up
```

After running docker image run follow command for seeding `tenders` table
```sh
./vendor/bin/sail php artisan db:seed --class=TenderSeeder
```


## API
GET     
    api/tenders?name='text'&change_at=2022-08-14 --> get all tenders
        - name(optional). filtering tender by name
        - change_at(optional). filtering tender by change date. format 'YY-mm-dd H:i:s'

POST    api/tenders --> create tender
{
    "outer_code": "int|number",
    "number": "text",
    "status": "text",
    "name": "text"
}
При запросе выдает 405 код но в базу добавляет

GET     api/tenders/{id} --> get the specified tender by `id`
PATCH   api/tenders/{id} --> Update the specified tender by `id`
DELETE  api/tenders/{id} --> Remove the specified tender by `id`

## License

MIT