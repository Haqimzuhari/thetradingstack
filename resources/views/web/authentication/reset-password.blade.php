<x-layout>
    <div class="min-h-screen flex_center">
        <div class="w-full max-w-sm px-10 space-y-10 bg-white shadow-xl py-14 rounded-xl border border-general-50">
            <div class="flex_center">
                <a href="{{ route('index') }}" class="flex_center"><x-logo.icon-name size="2xl"/></a>
            </div>

            <div class="space-y-3 text-center flex_col_center">
                <p class="text-2xl font-bold">Great!</p>
                <div class="px-5 flex_col_center">
                    <p class="font-semibold">We found your account</p>
                    <p class="text-sm font-light">Now reset your password then we can continue where we left off</p>
                </div>
            </div>

            <form method="post">
                @csrf
                <div class="space-y-6">
                    <div class="space-y-2"><x-model.users crud="u-r-password"/></div>
                    <button type="submit" name="reset_password" class="w-full py-2 btn btn_primary">RESET PASSWORD</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
