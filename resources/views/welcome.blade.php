<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title> Список дел</title>
    <link href=".../css/app.css" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-gray-200 p-4">
    <div class="lg:w-3/4 mx-auto py-8 bg-white rounded-xl">
        <h1 class="font-bold text-5xl text-center mb-8">Список дел</h1>
        <div class="mb-6">
            <form class="flex flex-col space-y-4 lg:w-5/6  mx-auto" method="POST" action="/">
                @csrf
                <input type="text" name="title" placeholder="Название" class="py-3 px-3 bg-gray-100 rounded-xl">
                <textarea name="description" placeholder="Описание"class="py-3 px-3 bg-gray-100 rounded-xl"></textarea>
                <button class="x-28 py-4 px-8 bg-blue-300 text-white rounded-xl">Добвить</button>
            </form>
        </div>

        <hr>

        <div class="mt-2">
            @foreach($todos as $todo)
            <div
                @class([
                    'py-4 flex items-center border-b border-gray-300 px-3 lg:w-5/6 mx-auto',
                    $todo->isDone ? 'bg-green-200' : ''
                    ])
            >
                <div class="flex-1 pr-8">
                    <h3 class="text-ld font-semibold">{{$todo->title}}</h3>
                    <p class="text-grey-400">{{$todo->description}}</p>
                </div>
                <div class="flex space-x-3">
                    <form method="POST" action="/{{$todo->id}}">
                        @csrf
                        @method('PATCH')
                        <button class="py-2 px-4 bg-green-300 text-white rounded-xl">✓</button>
                    </form>
                    <form method="POST" action="/{{$todo->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="py-2 px-4 bg-red-300 text-white rounded-xl">X</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</body>
</html>
