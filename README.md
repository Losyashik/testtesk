
## Распаковка
1. Выполнить установку с помощью команд:
    <code>
    npm i
    composer install
    </code>
2. переиминовать .env.example в .env и обновите его с помощью ваших учетных данных базы данных
3. Выполнить миграции базы данных с помощью команды
    <code>php artisan migrate</code>
4. Создать ключ с помощью команды
    <code>php artisan key:generate </code>
5. Запустить

## Как запустить
В одном терминале выполнить команду:
<code>npm run dev</code>
Во втором выполнить:
<code>php artisan serve</code>