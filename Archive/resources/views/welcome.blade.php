<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Quote Generator</title>

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
                <img src="{{ asset('mood.png') }}" alt="Mood">

            </div>


            <h1 class="text-3xl font-bold mb-4 py-5 text-center">Random quote generator for your mood

            </h1>

            <div id="quote" class="bg-gray-100 rounded p-6 shadow mb-4 hidden">
                <p class="text-lg font-medium">Result:</p>
                <p id="quote-text" class="text-xl mt-2"></p>
            </div>


            <p id="submit">
                <input type="submit" id="send_message"
                       value="Generate"
                       class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded w-full"
                       style="cursor:pointer;">
            </p>

            <div class="mt-5 mb-4 py-5 text-center">
                <smal>provided by chat gpt &#10084;</smal>
            </div>


        </form>
    </div>
</main>


@include('partials.foot')


<script>
    $(document).ready(function () {
        $("#generate_form").on("submit", function (e) {
            e.preventDefault();
            var formData = $(this).serialize();

            var csrfToken = "{{ csrf_token() }}";

            $.ajaxPrefilter(function (options, originalOptions, xhr) {
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            });

            $.ajax({
                url: "/generate",
                {{--url: "{{ secure_url('/register') }}",--}}
                method: "POST",
                dataType: "json",
                data: formData,
                success: function (response) {
                    if (response.success) {
                        $('#mail_success').fadeIn(500);

                        // $('#submit').remove();
                        $("#generate_form")[0].reset();

                        // Display the quote
                        $('#quote').removeClass('hidden');
                        $('#quote-text').text(response.quote);
                    } else {
                        $('#mail_fail').fadeIn(500);
                        $('#send_message').removeAttr('disabled').attr('value', 'Send The Message');
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    $('#mail_fail').fadeIn(500);
                    $('#send_message').removeAttr('disabled').attr('value', 'Send The Message');
                }
            });
        });
    });

</script>

</body>
</html>
