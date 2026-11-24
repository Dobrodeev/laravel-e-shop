# laravel-e-shop

e-shop с админкой на Laravel.

Интернет-магазин украшений Goldberry: витрина на основе готовой вёрстки, каталог с категориями, корзина, оформление заказа и админка на [Filament](https://filamentphp.com/).

## Возможности

- **Витрина** — главная, каталог с сортировкой и пагинацией, коллекции, распродажа, страница товара с галереей.
- **Корзина** — в сессии, учитывает остатки на складе.
- **Оформление заказа** — валидация, списание склада в транзакции, страница подтверждения.
- **Админка** (`/admin`) — товары, категории, заказы; отмена заказа возвращает товары на склад.

## Требования

- PHP 8.3+
- Composer
- SQLite (по умолчанию) или MySQL

## Установка

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Сайт откроется на http://127.0.0.1:8000.

В окружении `local` сидер создаёт администратора `admin@example.com` / `password`.
На боевом сервере администратор создаётся командой:

```bash
php artisan shop:admin you@example.com
```

## Тесты

```bash
php artisan test
```

## Структура

- `markup/` — исходная HTML-вёрстка
- `resources/views/` — Blade-шаблоны (layout, partials, страницы)
- `app/Services/Cart.php` — корзина
- `app/Filament/` — админка
- `public/uploads/` — картинки, загруженные через админку (не хранятся в git)
