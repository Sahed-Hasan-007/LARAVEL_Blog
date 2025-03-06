<!-- Alert Message start-->
@if(session()->has('fail'))
    <div id="auto-close-alert" class="fixed top-20 right-5 bg-red-500 text-white px-6 py-4 rounded-lg shadow-lg z-50 animate-slide-in">
        {{ session()->get('fail') }}
    </div>

    <script>
        const alert = document.getElementById('auto-close-alert');
        
        // Slide-in effect
        setTimeout(() => {
            alert.classList.add('animate-fade-out');
            setTimeout(() => alert.remove(), 500);
        }, 2000); // Auto-close after 2 seconds

        function closeAlert() {
            alert.classList.add('animate-fade-out');
            setTimeout(() => alert.remove(), 500);
        }
    </script>

    <style>
        @keyframes slide-in {
            0% {
                transform: translateX(100%);
                opacity: 0;
            }
            80% {
                transform: translateX(-10px);
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes fade-out {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
                transform: translateY(-10px);
            }
        }

        .animate-slide-in {
            animation: slide-in 0.5s ease-out forwards;
        }

        .animate-fade-out {
            animation: fade-out 0.5s ease-in forwards;
        }
    </style>
@endif
<!-- Alert Message end-->
