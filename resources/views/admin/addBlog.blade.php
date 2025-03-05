<!DOCTYPE html>
<html>

<head>
    @include('admin.adminCss')
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <style>
          .custom-button {
        width: 100%;
        margin: 0 20px;
        padding: 12px 16px;
        border: 1px solid transparent;
        font-size: 0.875rem;
        font-weight: 600;
        color: white;
        background-color: #3b82f6; /* Default background color */
        border-radius: 0.5rem;
        transition: background-color 0.2s, box-shadow 0.2s;
    }

    .custom-button:hover {
        background-color: #2563eb; /* Darker shade on hover */
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    </style>
</head>

<body>
    <div>
        <x-app-layout>

            @include('admin.header')

            <div class="d-flex align-items-stretch">
                <!-- Sidebar Navigation-->
                @include('admin.sidebarNavigation')
                <!-- Sidebar Navigation end-->
                <div class="page-content">

                    @include('admin.footer')

                    <!-- Create Blog Form start-->
                    <div class="container flex justify-center min-h-screen pt-4 pb-50 bg-gray-900">

                        <form method="POST" action="{{ route('adminAddPost') }}" enctype="multipart/form-data" class=" font-[sans-serif]  w-full bg-gray-800 p-8 border rounded-2xl  shadow-lg">
                            @csrf
                            <div class="flex gap-12 justify-center">
                                <div class="flex flex-col gap-10">
                                    <div>
                                        @include('admin.alertMessage')
                                        <h2 class="text-2xl font-bold text-white text-center">Create a New Post</h2>
                                    </div>

                                    <input type="text" placeholder="Post Title" name="title"
                                        class="px-4 py-3 w-full text-sm text-black bg-gray-700 outline-none border-2 border-transparent focus:border-blue-400 rounded-lg placeholder-gray-400" />
                                    @if ($errors->has('title'))
                                    <span class="text-red-400 text-sm">{{ $errors->first('title') }}</span>
                                    @endif

                                    <input type="text" placeholder="Post Description" name="description"
                                        class="px-4 py-8 w-full text-sm text-black bg-gray-700 outline-none border-2 border-transparent focus:border-blue-400 rounded-lg placeholder-gray-400" />
                                    @if ($errors->has('description'))
                                    <span class="text-red-400 text-sm">{{ $errors->first('description') }}</span>
                                    @endif

                                    <div>
                                        <label class="px-2">Add an Image</label>
                                        <input type="file" name="image"
                                            class="w-full text-gray-300 font-medium text-sm bg-gray-700 file:cursor-pointer border p-2 cursor-pointer file:border-0 file:py-2 file:px-4 file:mr-4 file:bg-blue-600 file:hover:bg-blue-500 file:text-white rounded-lg" />
                                        @if ($errors->has('image'))
                                        <span class="text-red-400 text-sm">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <div>
                                    <div>
                                        <label class="px-2">Select Category</label>
                                        <div class="w-full px-4 py-3 text-sm text-black bg-gray-700 outline-none border-2 border-transparent focus:border-blue-400 rounded-lg placeholder-gray-400">
                                            @foreach($categories as $category)
                                            <div class="flex items-center mb-2">
                                                <input
                                                    type="checkbox"
                                                    name="categories[]"
                                                    value="{{ $category->id }}"
                                                    id="category_{{ $category->id }}"
                                                    class="category-checkbox">
                                                <label for="category_{{ $category->id }}" class="ml-2">{{ $category->category_name }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                        @if ($errors->has('categories'))
                                        <span class="text-red-400 text-sm">{{ $errors->first('categories') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 mx-60">
                                <button type="submit" class="custom-button">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- Create Blog Form end-->

                </div>
            </div>
            <!-- JavaScript files-->
            <script src="adminPannel/vendor/jquery/jquery.min.js"></script>
            <script src="adminPannel/vendor/popper.js/umd/popper.min.js"> </script>
            <script src="adminPannel/vendor/bootstrap/js/bootstrap.min.js"></script>
            <script src="adminPannel/vendor/jquery.cookie/jquery.cookie.js"> </script>
            <script src="adminPannel/vendor/chart.js/Chart.min.js"></script>
            <script src="adminPannel/vendor/jquery-validation/jquery.validate.min.js"></script>
            <script src="adminPannel/js/charts-home.js"></script>
            <script src="adminPannel/js/front.js"></script>

        </x-app-layout>

    </div>


</body>

</html>