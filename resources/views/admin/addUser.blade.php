<!DOCTYPE html>
<html>

<head>
    @include('admin.adminCss')
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
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

                    <div class="p-4">
                    <h1 class="flex items-center justify-center font-bold p-2 text-2xl text-white">Add a User</h1>
                        <form action="{{ route('adminAddUser') }}" method="POST" class=" p-4 border rounded-md flex-col gap-5 flex">
                            @csrf
                            <div class="flex flex-col justify-center items-center gap-4">
                                <div class="flex flex-col">
                                    <label for="name" class=" text-sm font-medium text-white">Name</label>
                                    <input type="text" name="name" class=" px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-400" placeholder="Enter name" required style="width: 450px; height: 40px;">
                                </div>
                                <div class="flex flex-col">
                                    <label for="email" class="text-sm font-medium text-white">Email</label>
                                    <input type="email" name="email" class="px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-400" placeholder="Enter email" required style="width: 450px; height: 40px;">
                                </div>
                                <div class="flex flex-col">
                                    <label for="password" class="text-sm font-medium text-white">Password</label>
                                    <input type="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-400" placeholder="Enter password" required style="width: 450px; height: 40px;">
                                </div>
                                <div class="flex flex-col">
                                    <label for="role" class="text-sm font-medium text-white">Role</label>
                                    <select name="role" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-400 " style="width: 450px; height: 40px;">
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <button type="submit" class="px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-800 transition-all duration-300">
                                    Add User
                                </button>
                            </div>
                        </form>

                    </div>

                    @include('admin.footer')

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