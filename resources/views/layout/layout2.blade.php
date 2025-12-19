<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<x-head />
<style>
    .sidebar-logo{
        height: auto !important;
    }
    .sidebar-logo img{
        max-height: none !important;
        margin: auto;
    }
</style>

<body>

    <!-- ..::  header area start ::.. -->
    <x-sidebar />
    <!-- ..::  header area end ::.. -->

    <main class="dashboard-main">

        <!-- ..::  navbar start ::.. -->
        <x-navbar />
        <!-- ..::  navbar end ::.. -->
        <div class="dashboard-main-body">
            
            <!-- ..::  breadcrumb  start ::.. -->
            <x-breadcrumb title='{{ $title }}' subTitle='{{ $subTitle }}' />
            <!-- ..::  header area end ::.. -->

            @yield('content')
        
        </div>
        <!-- ..::  footer  start ::.. -->
        <x-footer />
        <!-- ..::  footer area end ::.. -->

    </main>

    <!-- ..::  scripts  start ::.. -->
    
    <x-scripts script="{{ isset($script) ? $script : '' }}" />
    @stack('scripts')
    <!-- ..::  scripts  end ::.. -->

</body>

</html>