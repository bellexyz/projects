
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/storage.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    @if($images->count() > 0)
    <div class="container">
        <ul>
            @foreach ($images as $image)
                <li>
                    <img src="{{ asset('images/'. $image->filename) }}" alt="Image"
                         onclick="showImage('{{ asset('images/'.$image->filename) }}')">
                    <button class="delete-icon" onclick="confirmDelete('{{ $image->id }}')">
                        <i class="fas fa-trash-alt"></i> 
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
    @else
        <p>No image history available.</p>
    @endif

<script>
    function showImage(imagePath) {
        window.open(imagePath, '_blank');
    }

    function confirmDelete(imageId) {
        console.log("Delete URL:", "{{ url('image-history') }}/" + imageId);

        if (confirm('Are you sure you want to delete this image?')) {
            $.ajax({
                url: "{{ url('image-history') }}/" + imageId,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    location.reload();
                },
                error: function(error) {
                    console.error('Error deleting image:', error);
                }
            });
        }
    }

</script>

</body>
</html>
