<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <meta property="og:title" content="The reverse job board for .NET developers">
    <meta property="og:description" content="We empower developers to help them find their next job.">
    <meta property="og:image" content="https://ik.imagekit.io/nearfal/og-dotnetdevs.png">

    @routes
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @inertiaHead

    <script src="/js/tilewind.js"></script>
</head>
<body>
@inertia
</body>
</html>
