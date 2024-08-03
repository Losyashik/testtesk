
## Распаковка
1. Выполнить установку с помощью команд:<br>
    <code>
    npm i
    composer install
    </code>
2. переиминовать .env.example в .env и обновите его с помощью ваших учетных данных базы данных<br>
3. Выполнить миграции базы данных с помощью команды<br>
    <code>php artisan migrate</code>
4. Создать ключ с помощью команды:<br>
    <code>php artisan key:generate </code>
5. Запустить

## Как запустить
В одном терминале выполнить команду:<br>
<code>npm run dev</code>
Во втором выполнить:<br>
<code>php artisan serve</code>
