
## Распаковка
1. Выполнить установку с помощью команд:<br>
    <code>npm i</code>
    <code>composer install</code>
2. переиминовать .env.example в .env и обновите его с помощью ваших учетных данных базы данных<br>
3. Выполнить миграции базы данных с помощью команды<br>
    <code>php artisan migrate</code><br>
4. Создать ключ с помощью команды:<br>
    <code>php artisan key:generate </code><br>
5. Запустить

## Как запустить
В одном терминале выполнить команду:<br>
<code>npm run dev</code><br>
Во втором выполнить:<br>
<code>php artisan serve</code><br>


    | Название                   | Тип    | Значение по умолчанию                                                               | Вид выходного параметра
    | -------------------------- | ------ | ----------------------------------------------------------------------------------- | -------------------------------------------------
    | <code>$font-family</code>  | string | Arial, Helvetica, sans-serif                                                        | Устанавлевает свойство font-family по селектору *
    | <code>$box-sizing</code>   | string | border-box                                                                          | Устанавливает свойство box-sizing по селектору *
    | <code>$h-font-sizes</code> |   map  | <code>h1: 1.67vw, h2: 1.25vw, h3: 0.99vw, h4: 0.83vw, h5: 0.73vw, h6: 0.63vw</code> | Устанавливает свойство font-family в соответсвии с именем и linene-height: calc(size * 1.1)
    | <code>$font-sizes</code>   |   map  | <code>"max": 0.99vw, "mid": 0.83vw, "min": 0.68vw</code>                            |
    | <code>$font-weights</code> |   map  | <code></code>                                                                       |
    | <code>$ofsets</code>       |   map  |
    | <code>$colors</code>       |   map  |
    | <code>$backgrounds</code>  |   map  |
    | <code>$variables</code>    |   map  |
