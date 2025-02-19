<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>OpenCopilot - Dashboard</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="/dashboard/css/vendors/flatpickr.min.css" rel="stylesheet">
    <link href="/dashboard/style.css" rel="stylesheet">
</head>

<body
    class="font-inter antialiased bg-slate-100 text-slate-600"
    :class="{ 'sidebar-expanded': sidebarExpanded }"
    x-data="{ sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }"
    x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))"
>

<script>
    if (localStorage.getItem('sidebar-expanded') == 'true') {
        document.querySelector('body').classList.add('sidebar-expanded');
    } else {
        document.querySelector('body').classList.remove('sidebar-expanded');
    }
</script>

<!-- Page wrapper -->
<div class="flex h-screen overflow-hidden">

    <!-- Content area -->
    <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
        <!-- Site header -->
        @if(!isset($doNotShowTopHeader))
            @include('layout.header')
        @endif

        <main>
            @yield('content')
        </main>

    </div>

</div>

<script src="/dashboard/js/vendors/alpinejs.min.js" defer></script>
@if(!isset($doNotShowTopHeader))
    <script src="/dashboard/js/vendors/chart.js"></script>
    <script src="/dashboard/js/vendors/moment.js"></script>
    <script src="/dashboard/js/vendors/chartjs-adapter-moment.js"></script>
    <script src="/dashboard/js/dashboard-charts.js"></script>
    <script src="/dashboard/js/vendors/flatpickr.js"></script>
    <script src="/dashboard/js/flatpickr-init.js"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9KZBVFR9JE"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-9KZBVFR9JE');

    </script>

@endif

@yield('scripts')

<script src="/pilot.js"></script>
<script>
    initAiCoPilot({
        initialMessages: ["how are the things"],
        token: "1RuzS7w5ceGaN6CiK0J7",
        triggerSelector: "#triggerSelector",
        headers: {
            Authorization: "Bearer your_auth_token_goes_here",
        },
    });
</script>
</body>

</html>
