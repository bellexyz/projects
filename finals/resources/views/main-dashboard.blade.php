<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/main-dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <title>Main Dashboard</title>
</head>
<body>
    
    @if($latestImage)
        <img src="{{ asset('images/' . $latestImage->filename) }}" alt="Latest Image">
        <p>{{ $latestImage->name }}</p> 
    @endif
<a href="{{ route('login.dashboard') }}"><i class="fas fa-sign-in-alt"></i></a>

</body>
</html>