<!-- resources/views/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/show-image.css') }}">
    <!-- Add any additional styles or scripts as needed -->
</head>
<body>
    <img src="{{ asset('images/'.$image->filename) }}" alt="Uploaded Image" class="full-screen-image">
</body>
</html>
