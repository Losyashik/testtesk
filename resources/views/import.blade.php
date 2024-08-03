<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="css/app.css">
</head>

<body>
    @include('navigation')
    <main class="body form">
        <form class="import-form" action="/import" method="post" enctype="multipart/form-data">
            @csrf
            <div class="import-form_input-block">
                <label for="import-form_input" class="import-form_label">
                    Нажмите или перетащите файл
                </label>
                <input class="import-form_input" type="file" name="file" required accept=".xls,.xlsx"
                    id="import-form_input">
            </div>
            <button class="import-form_button" type="submit">Импорт</button>
        </form>
    </main>
    <script>
        let inp = document.querySelector("#import-form_input");
        let label = document.querySelector(".import-form_label");
        inp.addEventListener('change', () => {
            if (inp.files.length)
                label.innerHTML = inp.files[0].name;
        })
    </script>
</body>

</html>
