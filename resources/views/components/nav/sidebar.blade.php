<div class="fixed w-56 inset-y-0 left-0 bg-white p-8 flex flex-col space-y-16">
    <a href="{{ route('index') }}" class="flex_center"><x-logo.icon-name size="xl"/></a>

    <div class="h-full flex flex-col space-y-2">
        <a href="{{ route('dashboard') }}" class="nav_link active">Dashboard</a>
        <a href="#" class="nav_link">Users</a>
        <a href="#" class="nav_link">Products</a>
    </div>

    <div class="h-40 flex-none flex_col_center space-y-4">
        <div class="flex_col_center space-y-1">
            <a href="{{ route('profile') }}" class="transition_default border-2 border-transparent hover:border-primary-300 rounded-full"><x-avatar/></a>
            <p class="text-xs font-black text-center">{{ auth()->user()->profile->fullname }}</p>
            <p class="text-xs font-semibold text-general-400 text-center">{{ auth()->user()->email }}</p>
        </div>
        <form method="post" action="{{ route('sign-out') }}" class="flex_center">
            @csrf
            <button type="submit" class="flex_center bg-white border border-general-300 hover:border-black p-1 rounded transition_default hover:bg-black hover:text-white">
                <x-icon.power stroke="stroke-2"/>
            </button>
        </form>
    </div>
</div>
