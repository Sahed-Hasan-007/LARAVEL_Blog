<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="bg-gray-50">
    <div class="py-8 px-2 md:py-16 md:px-20">
        <section class="relative">
            <div class="w-full mx-auto p-8 sm:px-6 lg:px-8 border-2 rounded-md shadow-md ">
                @include('user/blogBody')
                @include('user/commentBody')
            </div>
        </section>
    </div>
</body>


</html>