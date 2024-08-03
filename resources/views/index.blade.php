<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $title }}</title>
    <link rel="stylesheet" href="css/app.css">
</head>

<body>
    @include('navigation')
    <main class="body catalog">
        @foreach ($product_list as $product)
            <article class="card">
                <div class="card_images">
                    @foreach ($product->images as $src)
                        <img src="{{ $src }}" class="card_image" />
                    @endforeach
                </div>
                <h4 class="card_name">{{ $product->name }}</h4>
                <section class="card_interface">
                    <div class="card_price">{{ $product->price }}</div>
                    <a href="{{ $product->url }}" class="card_button">Подробнее</a>
                </section>
            </article>
        @endforeach
    </main>
</body>

</html>
