<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <style>
        table {
            border-collapse: collapse
        }

        td,
        th {
            border: 1px solid #000
        }

        td:first-child {
            width: 15%;
        }

        .block {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .block img {
            display: block;
            width: 23%;
            object-fit: cover;
            margin: 1vh 0;
            border: 2px solid #000;
        }
    </style>
</head>

<body>
    <a href="/">Назад</a>
    <table>
        <div class="block">
            @foreach ($product->images as $val)
                <img src="{{ $val }}" alt="">
            @endforeach
        </div>
        <tr>
            <th> Ключ </th>
            <th> Значение </th>
        </tr>
        @foreach ($product as $key => $val)
            @if (!in_array($key, ['images', 'additions', 'created_at', 'updated_at']))
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $val }}</td>
                </tr>
            @endif
        @endforeach
        @foreach ($product->additions as $key => $val)
            @if (!in_array($key, ['created_at', 'updated_at']))
                <tr>
                    <td>Доп. поле: {{ $key }}</td>
                    <td>{{ $val }}</td>
                </tr>
            @endif
        @endforeach
    </table>
</body>

</html>
