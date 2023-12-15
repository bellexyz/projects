<!-- resources/views/storage.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/storage.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Add any additional styles or scripts as needed -->
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
                        <i class="fas fa-trash-alt"></i> <!-- Font Awesome trash icon -->
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
    @else
        <p>No image history available.</p>
    @endif

    <!-- resources/views/storage.blade.php -->

<!-- ... (previous code) ... -->

<!-- ... (previous code) ... -->

<!-- ... (previous code) ... -->

<!-- ... (previous code) ... -->

<script>
    function showImage(imagePath) {
        // Open the image in a new window or tab
        window.open(imagePath, '_blank');
    }

    function confirmDelete(imageId) {
        // Log the generated delete URL to the console
        console.log("Delete URL:", "{{ url('image-history') }}/" + imageId);

        if (confirm('Are you sure you want to delete this image?')) {
            // Send an AJAX request to delete the image
            $.ajax({
                url: "{{ url('image-history') }}/" + imageId,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Refresh the page or update the image list based on your needs
                    location.reload();
                },
                error: function(error) {
                    console.error('Error deleting image:', error);
                }
            });
        }
    }

</script>

<!-- ... (following code) ... -->

</body>
</html>
