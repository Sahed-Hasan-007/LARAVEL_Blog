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
                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Role</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Created-at</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="bg-gray-800 divide-y divide-gray-700">
                                @foreach ($users as $user)
                                <tr class="hover:bg-gray-700 transition duration-200">
                                    <td class="px-6 py-4 text-sm">{{ $loop->index + 1 }}</td>
                                    <td class="px-6 py-4 max-w-xs text-sm ">{{ $user->name }}</td>
                                    <td class="px-6 py-4 text-sm max-w-xs ">{{ $user->email }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $user->role }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $user->created_at }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        <div class="flex">
                                            <a href="{{ route('adminViewUserEdit', ['id' => $user->id]) }}">
                                                <button class="bg-blue-600 border hover:bg-blue-500 px-4 py-2 rounded-lg text-white font-semibold transition duration-200">Edit</button>
                                            </a>
                                            <button onclick="confirmDelete('{{ route('adminDeleteUser', ['id' => $user->id]) }}')" class="bg-red-600 hover:bg-red-500 px-3 py-2 rounded-lg text-white font-semibold transition duration-200 ml-2">Delete</button>
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
                        text: "Once deleted, you will not be able to recover this User!",
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
