<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="/images/hipe_logo.svg" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">
        <script src="https://unpkg.com/alpinejs"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                        'hipe-blue': '#229fe7',
                        'hipe-dark-blue': '#023047',
                        'hipe-yellow': '#ffa903'
                        },
                    },
                },
            };
        </script>
        <title>LaraGigs | Find Laravel Jobs & Projects</title>
    </head>
    <body>
        <main>
            <div class="z-40 fixed top-0 w-full">
                @include('partials.dashboard._header')
            </div>
    
            <div class="flex justify-end">
                <div class="w-[20%] fixed left-0 top-0 h-full">
                    @include('partials.dashboard._sidenav')
                </div>
                <div class="w-[80%] bg-gray-200 min-h-screen pb-12 pt-28 px-8">
                    {{$slot}}
                </div>
            </div>
        </main>

        <x-flash-message />
    </body>
</html>