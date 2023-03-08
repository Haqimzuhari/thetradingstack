<x-layout title="Sign In">
    <div class="min-h-screen flex_center">
        <div class="w-full max-w-sm px-10 space-y-10 bg-white shadow-xl py-14 rounded-xl border border-general-50">
            <div class="flex_center">
                <a href="{{ route('index') }}" class="flex_center"><x-logo.icon-name size="2xl"/></a>
            </div>

            <div class="space-y-3 text-center flex_col_center">
                <p class="text-3xl font-semibold">Welcome back!</p>
                <div class="px-5 flex_col_center">
                    <p class="font-semibold">Let's continue our journey together</p>
                    <p class="text-sm font-light">Fill up below information to go to your account</p>
                </div>
            </div>

            <form method="post">
                @csrf
                <div class="space-y-6">
                    <div class="space-y-2"><x-model.users crud="r-login"/></div>
                    <div><p class="text-xs">Forgot password? Reset <a href="{{ route('forgot-password') }}" class="font-bold link link_primary">here</a></p></div>
                    <button type="submit" name="sign_in" class="w-full py-2 btn btn_primary">SIGN IN</button>
                    <div class="flex_center"><a href="{{ route('create-account') }}" class="text-xs font-bold link link_primary">Create Account</a></div>
                </div>
            </form>
        </div>
    </div>
</x-layout>
