<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Ensure jQuery is included -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .liked {
            
            transform: scale(1.2);
            transition: transform 0.3s ease-in-out;
 
        }

        .like-button {
            transition: transform 0.3s ease-in-out;
        }

        /* Optional: Add a 'liked' state effect */
        .liked svg {
            animation: likeAnimation 0.3s ease-in-out;
        }

        @keyframes likeAnimation {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1);
            }
        }
    </style>
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
                <div class="flex flex-wrap gap-2">
                    @foreach ($post->categories as $category)
                    <span class="inline-block py-1 px-3 text-sm font-semibold text-white rounded-full"
                        style="background-color: {{ $category->getRandomColor() }}">
                        {{ $category->category_name }}
                    </span>
                    @endforeach
                </div>
                <h2 class="font-manrope font-bold text-3xl leading-10 text-gray-900 capitalize py-4 text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-pink-600 to-purple-600">{{ $post->title }}</h2>
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
                    <button class="group p-3 rounded-full bg-indigo-200 hover:bg-indigo-300 transition-all duration-300 ease-in-out like-button" id="like-button" data-post-id="{{ $post->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 8.467 8.467" id="like">
                            <path d="M1.322 7.674a.535.535 0 0 1-.53-.53V3.44c0-.289.242-.53.53-.53h.795c.196 0 .368.113.46.275.178-.11.353-.174.466-.239.266-.154.402-.586.465-1.037.031-.225.048-.442.076-.623.014-.09.027-.17.064-.258a.353.353 0 0 1 .32-.235c.393 0 .715.154.92.39.206.235.302.53.354.822.084.478.052.883.036 1.172h1.6c.436 0 .796.358.796.793 0 .154-.044.27-.1.45-.056.181-.131.399-.215.632-.166.466-.364.994-.494 1.383a1.32 1.32 0 0 1-.24.459.724.724 0 0 1-.539.251H2.91a.774.774 0 0 1-.264-.049v.05c0 .288-.24.529-.529.529zm0-.53h.795V3.44h-.795zm1.588-.529h3.176c.07 0 .092-.014.138-.068a.913.913 0 0 0 .14-.282c.135-.405.333-.932.497-1.392.082-.23.156-.443.207-.61.052-.166.077-.316.077-.294a.259.259 0 0 0-.266-.264H5.004a.265.265 0 0 1-.266-.266c0-.312.068-.87-.015-1.344-.042-.236-.12-.435-.233-.564a.607.607 0 0 0-.378-.199c-.027.151-.045.409-.079.65-.069.493-.199 1.117-.726 1.422-.197.113-.387.18-.5.258-.114.078-.16.12-.16.307v2.38c0 .152.112.266.263.266z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-feature-settings:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;text-orientation:mixed;shape-padding:0;isolation:auto;mix-blend-mode:normal"></path>
                        </svg> </button>
                    <span id="like-count-{{ $post->id }}">{{ session('likeCount', $post->likes->count()) }} likes</span>
                </div>


            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.getElementById("like-button").addEventListener("click", function() {
            var button = this;
            var postId = button.getAttribute("data-post-id");

            // Check if the user has already liked the post (you can manage this with an API or session)
            var liked = button.classList.contains('liked');

            if (liked) {
                // If already liked, remove like
                button.classList.remove('liked');
                // Update the like count (Decrement or fetch the new count via an API)
                document.getElementById('like-count-' + postId).textContent = (parseInt(document.getElementById('like-count-' + postId).textContent) - 1) + " likes";
            } else {
                // If not liked, add like
                button.classList.add('liked');
                // Update the like count (Increment or fetch the new count via an API)
                document.getElementById('like-count-' + postId).textContent = (parseInt(document.getElementById('like-count-' + postId).textContent) + 1) + " likes";
            }

            // Optional: Send AJAX request to server to update the like status in the database
            // fetch('/like-post', { method: 'POST', body: JSON.stringify({ postId: postId }) });
        });
    </script>
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