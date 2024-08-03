@vite(['resources/scss/app.scss','resources/css/app.css','resources/js/app.js'])

<nav class="navigation">
    <ul class="navigation_ul">
        <li class="navigation_li"><a href="/" class="navigation_link  {{ request()->is('/') ? 'active' : null }}">Каталог</a></li>
        <li class="navigation_li"><a href="/import" class="navigation_link {{ request()->is('import') ? 'active' : null }}">Импорт</a></li>
    </ul>
    
</nav>