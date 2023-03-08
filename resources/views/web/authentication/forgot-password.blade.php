<x-layout>
    <div class="min-h-screen flex_center">
        <div class="w-full max-w-sm px-10 space-y-10 bg-white shadow-xl py-14 rounded-xl border border-general-50">
            <div class="flex_center">
                <a href="{{ route('index') }}" class="flex_center"><x-logo.icon-name size="2xl"/></a>
            </div>

            <div class="space-y-3 text-center flex_col_center">
                <p class="text-2xl font-semibold">Forgotted password?</p>
                <div class="px-7 flex_col_center">
                    <p class="font-semibold">No worries. We got your back.</p>
                    <p class="text-sm font-light">Let's find your account first</p>
                </div>
            </div>

            <form method="post">
                @csrf
                <div class="space-y-6">
                    <div class="space-y-2"><x-model.users crud="r"/></div>
                    <button type="submit" name="forgot_password" class="w-full py-2 btn btn_primary">FIND ACCOUNT</button>
                    <div><p class="text-xs">Remembered your account? <a href="{{ route('sign-in') }}" class="font-bold link link_primary">Sign In</a></p></div>
                </div>
            </form>
        </div>
    </div>
</x-layout>
