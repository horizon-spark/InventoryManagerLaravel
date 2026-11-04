## Первый запуск приложения

### 1. Откройте терминал в папке проекта и выполните:

```bash
composer install
```

### 2. Создайте файл конфигурации из шаблона:

```bash
cp .env.example .env
```

### 3. Сгенерируйте новый ключ приложения (он уникален для каждого устройства):

```bash
php artisan key:generate
```

### 4. Откройте .env и настройте подключение к базе данных.

### Параметры (DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD) должны соответствовать той СУБД, которая установлена на новом устройстве:

#### Пример для PostgreSQL:

```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=laravel_project_db
DB_USERNAME=user
DB_PASSWORD=password
```

### 5. Создайте пустую базу с именем из .env — например, через pgAdmin, DBeaver или из терминала:

```bash
createdb -U user laravel_project_db
```

### 6. Примените миграции:

```bash
php artisan migrate
```

### 7. (Опционально) Заполните БД тестовыми данными через Tinker:

```bash
$e = App\Models\Category::create(['name' => 'Электроника', 'description' => 'Гаджеты']);
$b = App\Models\Category::create(['name' => 'Книги', 'description' => 'Литература']);
$f = App\Models\Category::create(['name' => 'Продукты']);

App\Models\Product::create(['name' => 'Смартфон Pixel 8', 'sku' => 'SM-12345', 'price' => '69999.00', 'category_id' => $e->id]);
App\Models\Product::create(['name' => 'Книга «Clean Code»', 'sku' => 'BK-001', 'price' => '2499.50', 'category_id' => $b->id]);
App\Models\Product::create(['name' => 'Кофе в зёрнах 1 кг', 'sku' => 'FD-777', 'price' => '1290.00', 'is_archived' => true, 'category_id' => $f->id]);
```

### 8. Запустите приложение:

```bash
php artisan serve
```
