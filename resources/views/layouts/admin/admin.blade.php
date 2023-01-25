
@include('layouts.admin.head')

    @include('layouts.admin.aside')

    <!-- Page Heading -->
    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        {{ $desktopHeader }}

        <!-- Mobile Header & Nav -->
        {{ $mobileHeader }}
    
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                {{ $slot }}
            </main>
    
            <!-- <footer class="w-full bg-white text-right p-4">
            </footer> -->
        </div>
        
    </div>

@include('layouts.admin.foot')