# Legacy kod ile Örnek Api projesi

Php kurulu ise aşağıdaki kod ile projeyi çalıştırabilirsiniz.
```
php -S localhost:8080 -t ./web
```

#### Endpoint Bilgileri:

Tüm havayollarını görüntüleme

```
http://localhost:8080/airports
```

Seçili tipdeki havayollarını görüntüleme

```
http://localhost:8080/airports?type=heliport
```

Seçili yükseklif fit havayollarını görüntüleme
```
http://localhost:8080/airports?elevation_ft=1100
```

Hem tip hem de yükseklif fit filtreli havayollarını görüntüleme
```
http://localhost:8080/airports?elevation_ft=1100&type=heliport
```


