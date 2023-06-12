<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Quote Generator / About</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
            integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="flex flex-col min-h-screen">
@include('partials.nav')

<main class="flex-grow flex items-center justify-center">
    <div class="bg-white rounded-lg shadow p-8 w-full sm:w-1/2 md:w-1/3 lg:w-4/4">
        <form name="generate_form" id="generate_form" method="post">

            <input type="hidden" name="generate" value="rasul"/>
            @csrf
            <div class="py-3">
                Home / About
            </div>


            <p class="text-1xl color-blue mb-4 py-5 text-center">
                This system generates random quotes at the click of a button to improve your mood.
                It was created by intuazir <a href="https://chopurov.me/" target="_blank" style="text-color:blue;">Rasul
                    Chopurov</a> for the technical task.
            </p>


        </form>
    </div>
</main>

@include('partials.foot')



</body>
</html>
