<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/crud-dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <img src="{{ asset('images/' . $image->filename) }}" alt="Uploaded Image">

    <form action="{{ route('crud-dashboard.updateName') }}" method="post">
        @csrf
        <input type="text" name="editable_name" value="{{ $image->name ?? '' }}" required>
        <button type="submit"><i class="fas fa-save"></i> Save</button>
    </form>
    @if(session('success'))
    <div style="text-align: center; padding: 20px; background-color: #3d3d3d; color: white;">
        {{ session('success') }}
    </div>
    @endif
    <a href="{{ route('image-history.index') }}" class="view-image-history">
        <i class="fas fa-images"></i> Uploads
    </a>
    <form action="/upload-image" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" id="image" required>
        <button type="submit"><i class="fas fa-cloud-upload-alt"></i> Upload</button>
    </form>
    <hr>
</body>
</html>
