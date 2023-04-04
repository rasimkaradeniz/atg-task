## ATG-TASK

Proje Symfony 6 ile geliştirilmiştir ve veritabanı olarak MySQL Kullanılmıştır.

### SETUP:
- `composer install`
- `php bin/console doctrine:database:create (Veritabanı oluşturur.)`
- `php bin/console doctrine:schema:update --force (Entitye göre tablo ver sutünları oluşturur.)`

### Routes:
-`/update-table` excel içerisinde ki kayıtları veritabanında ki tabloya yazar. (GET Request)
-`/search` type ve searchString verileri gönderilerek arama yapar (POST Request)


` Postman collectionu içerisinde örnek istekler mevcuttur.`


 


