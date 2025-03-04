<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Ensure jQuery is included -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 mx-auto p-4 border-2">
        <!-- Image Section -->
        <div class="img-box">
            <img src="{{ asset('postImage/' . $post->image) }}" alt="Yellow Tropical Printed Shirt"
                class="w-full h-98 object-cover rounded-xl shadow-lg transition-transform transform hover:scale-105">
        </div>

        <!-- Data Section -->
        <div class="data flex flex-col justify-center items-start space-y-6">
            <div class="w-full max-w-xl">
                <p class="text-lg font-medium leading-8 text-indigo-600 py-4">Clothing / Menswear</p>
                <h2 class="font-manrope font-bold text-3xl leading-10 text-gray-900 capitalize py-4">{{ $post->title }}</h2>
                <p class="text-gray-500 text-base font-normal mb-4 py-4">
                    {{ $post->content }}
                </p>

                <!-- Author Section -->
                <div class="flex items-center gap-3  text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM12 14c-3.31 0-6 2.69-6 6v1h12v-1c0-3.31-2.69-6-6-6z" fill="currentColor" />
                    </svg>
                    <span class="font-semibold">{{ $post->user_name }}</span>
                </div>

                <!-- Post Creation Date Section -->
                <div class="text-sm text-gray-500 mt-2">
                    <span class="font-medium">Posted on: </span>{{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y h:i A') }}
                </div>

                <div class="flex items-center gap-4 mt-6">
                    <button class="group p-3 rounded-full bg-indigo-100 hover:bg-indigo-200 transition-all duration-300 ease-in-out" id="like-button" data-post-id="{{ $post->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                            <path d="M4.47084 14.3196L13.0281 22.7501L21.9599 13.9506M13.0034 5.07888C15.4786 2.64037 19.5008 2.64037 21.976 5.07888C24.4511 7.5254 24.4511 11.4799 21.9841 13.9265M12.9956 5.07888C10.5204 2.64037 6.49824 2.64037 4.02307 5.07888C1.54789 7.51738 1.54789 11.4799 4.02307 13.9184M4.02307 13.9184L4.04407 13.939M4.02307 13.9184L4.46274 14.3115" stroke="#4F46E5" stroke-width="1.6" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <span id="like-count-{{ $post->id }}">{{ session('likeCount', $post->likes->count()) }} likes</span>
                </div>


            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#like-button').on('click', function() {

                var postId = $(this).data('post-id');

                $.ajax({
                    url: '{{ route("userAddLike", ["id" => ":id"]) }}'.replace(':id', postId),
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        // console.log("AJAX Success:", response);
                        var svgElement = $('#like-button').find('svg');
                        var likeCountElement = $('#like-count-' + postId);

                        if (response.status === 'liked') {
                            svgElement.removeClass('text-gray-500').addClass('text-blue-500');
                        } else {
                            svgElement.removeClass('text-blue-500').addClass('text-gray-500');
                        }

                        likeCountElement.text(response.likes_count + ' likes');
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            });
        });
    </script>

</body>

</html>