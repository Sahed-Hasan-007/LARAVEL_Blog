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

                    @include('admin.footer')

                    <!-- Create Blog Form start-->

                    <!-- Alert Message start-->

                    <!-- Alert Message  start-->


                    <div class="container flex justify-center min-h-screen pt-8 pb-50 bg-gray-900">

                        <form method="POST" action="{{ route('adminEditUser',$user->id) }}" enctype="multipart/form-data" class="space-y-6 font-[sans-serif] max-w-md w-full bg-gray-800 p-8 rounded-2xl shadow-lg" enctype="multipart/form-data">
                            <h1 class="text-2xl font-bold mb-4">Edit User #{{ $user->id  }}</h1>
                            @csrf
                            @method('PUT')
                            <div>
                                @include('admin.alertMessage')
                            </div>

                            <div>
                                <label class="px-2">User Name</label>
                                <input type="text" placeholder="User Name" name="name" value="{{ old('name',$user->name) }}"
                                    class=" px-4 py-3 w-full text-sm text-black bg-gray-700 outline-none border-2 border-transparent focus:border-blue-400 rounded-lg placeholder-gray-400" />
                            </div>

                            <div>
                                <label class="px-2">User Role</label>
                                <input type="text" placeholder="User Role" name="role" value="{{ old('role',$user->role) }}"
                                    class="px-4 py-8 w-full text-sm text-black bg-gray-700 outline-none border-2 border-transparent focus:border-blue-400 rounded-lg placeholder-gray-400" />

                            </div>

                            <button type="submit"
                                class="w-full px-4 py-3 border text-sm font-semibold bg-green-500 text-white rounded-lg hover:bg-green-400 transition duration-200">Submit</button>
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