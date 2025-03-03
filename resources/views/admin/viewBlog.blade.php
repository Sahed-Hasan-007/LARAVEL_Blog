<!DOCTYPE html>
<html>

<head>
    @include('admin.adminCss')
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

<body class="bg-gray-900 text-white">
    <div>
        <x-app-layout>

            @include('admin.header')

            <div class="d-flex align-items-stretch">
                <!-- Sidebar Navigation-->
                @include('admin.sidebarNavigation')
                <!-- Sidebar Navigation end-->
                <div class="page-content">
                    @include('admin.alertMessage')
                    <!-- Post Table start-->
                    <div class="font-sans overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-700 shadow-lg rounded-lg">
                            <thead class="bg-gray-800">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">S.No.</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Title</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Description</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Image</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">User Name</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">User Type</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="bg-gray-800 divide-y divide-gray-700">
                                @foreach ($posts as $post)
                                <tr class="hover:bg-gray-700 transition duration-200">
                                    <td class="px-6 py-4 text-sm">{{ $loop->index + 1 }}</td>
                                    <td class="px-6 py-4 max-w-xs break-words text-sm whitespace-normal">{{ $post->title }}</td>
                                    <td class="px-6 py-4 text-sm max-w-xs break-words whitespace-normal">{{ $post->content }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        <img src="{{ asset('postImage/' . $post->image) }}" class="w-24 h-16 rounded-xl object-cover shadow-md border-2 border-gray-600 hover:scale-110 transition-transform duration-300">
                                    </td>
                                    <td class="px-6 py-4 text-sm">{{ $post->user_name }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $post->user_type }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        <div class="flex">
                                            <a href="{{ route('adminViewEdit', ['id' => $post->id]) }}">
                                                <button class="bg-blue-600 border hover:bg-blue-500 px-4 py-2 rounded-lg text-white font-semibold transition duration-200">Edit</button>
                                            </a>
                                            <button onclick="confirmDelete('{{ route('adminDeletePost', ['id' => $post->id]) }}')" class="bg-red-600 hover:bg-red-500 px-3 py-2 rounded-lg text-white font-semibold transition duration-200 ml-2">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Post Table end-->

                    @include('admin.footer')

                </div>
            </div>
            <!-- JavaScript files-->
            <script src="adminPannel/vendor/jquery/jquery.min.js"></script>
            <script src="adminPannel/vendor/popper.js/umd/popper.min.js"></script>
            <script src="adminPannel/vendor/bootstrap/js/bootstrap.min.js"></script>
            <script src="adminPannel/vendor/jquery.cookie/jquery.cookie.js"></script>
            <script src="adminPannel/vendor/chart.js/Chart.min.js"></script>
            <script src="adminPannel/vendor/jquery-validation/jquery.validate.min.js"></script>
            <script src="adminPannel/js/charts-home.js"></script>
            <script src="adminPannel/js/front.js"></script>

            <script>
                function confirmDelete(url) {
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this post!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            window.location.href = url;
                        }
                    });
                }
            </script>

        </x-app-layout>
    </div>
</body>
</html>
