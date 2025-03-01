<!DOCTYPE html>
<html>

<head>
   @include('admin.adminCss')
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