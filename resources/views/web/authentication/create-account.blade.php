<x-layout>
    <div class="min-h-screen flex_center">
        <div class="w-full max-w-sm px-10 space-y-10 bg-white shadow-xl py-14 rounded-xl border border-general-50">
            <div class="flex_center">
                <a href="{{ route('index') }}" class="flex_center"><x-logo.icon-name size="2xl"/></a>
            </div>

            <div class="space-y-3 text-center flex_col_center">
                <p class="text-3xl font-semibold">Hello there!</p>
                <div class="px-5 flex_col_center">
                    <p class="font-semibold">Join us! Be part of greatness togeter</p>
                    <p class="text-sm font-light">Please fill below information for us to create an account for you</p>
                </div>
            </div>

            <form method="post">
                @csrf
                <div class="space-y-6">
                    <div class="space-y-2">
                        <div class="space-y-2"><x-model.profile crud="c"/></div>
                        <div class="space-y-2"><x-model.users crud="c"/></div>
                    </div>
                    <button type="submit" name="create_account" class="w-full py-2 btn btn_primary">CREATE ACCOUNT</button>
                    <div><p class="text-xs">Already had an account? <a href="{{ route('sign-in') }}" class="font-bold link link_primary">Sign In</a></p></div>
                </div>
            </form>
        </div>
    </div>
</x-layout>
