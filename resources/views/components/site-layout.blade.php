<html>
<head>
    <title>List of Projects</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-blue-200">

<div class="bg-blue-950 text-white 100">

    <ul class="flex space-x-4 p-4 ">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('projects.index') }}">Projects</a></li>
        <li><a href="#">Characters</a></li>
        <li><a href="#">Settings</a></li>
    </ul>   

</div>

<div class="p-4">

    {{ $slot }}


</div>
</body>
</html>