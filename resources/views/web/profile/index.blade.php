<x-layout.auth title="Profile">
    <div class="space-y-10">
        <p class="font-extrabold text-2xl">Profile</p>

        <div class="space-y-14">
            <form method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}"/>
                <div class="flex justify-between items-center border-b border-general-100 pb-4">
                    <div>
                        <p class="font-extrabold">Account</p>
                        <p class="font-light text-sm text-general-400">Update your account information</p>
                    </div>
                    <div>
                        <button type="submit" name="update_account" class="btn btn_primary px-4 py-2">Update</button>
                    </div>
                </div>

                <div class="space-y-4 py-4">
                    <div class="flex items-start">
                        <div class="w-full max-w-xl flex-none">
                            <p class="text-sm font-semibold">Email</p>
                        </div>

                        <div class="w-full max-w-lg flex-none">
                            <x-input type="email" id="email" name="email" class="input_primary" value="{{ $user->email }}"/>
                        </div>
                    </div>
                </div>
            </form>

            <form method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}"/>
                <div class="flex justify-between items-center border-b border-general-100 pb-4">
                    <div>
                        <p class="font-extrabold">Personal Information</p>
                        <p class="font-light text-sm text-general-400">Update your personal information</p>
                    </div>
                    <div>
                        <button type="submit" name="update_personal" class="btn btn_primary px-4 py-2">Update</button>
                    </div>
                </div>

                <div class="space-y-4 py-4">
                    <div class="flex items-start">
                        <div class="w-full max-w-xl flex-none">
                            <p class="text-sm font-semibold">Full Name</p>
                        </div>

                        <div class="w-full max-w-lg flex-none">
                            <x-input id="fullname" name="fullname" class="input_primary" value="{{ $user->profile->fullname }}"/>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-full max-w-xl flex-none">
                            <p class="text-sm font-semibold">Phone Number</p>
                        </div>

                        <div class="w-full max-w-lg flex-none">
                            <x-input id="phone" name="phone" class="input_primary" value="{{ $user->profile->phone }}"/>
                        </div>
                    </div>
                </div>
            </form>

            <form method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}"/>
                <div class="flex justify-between items-center border-b border-general-100 pb-4">
                    <div>
                        <p class="font-extrabold">Password</p>
                        <p class="font-light text-sm text-general-400">Manage your account password</p>
                    </div>
                    <div>
                        <button type="submit" name="update_password" class="btn btn_primary px-4 py-2">Update</button>
                    </div>
                </div>

                <div class="space-y-4 py-4">
                    <div class="flex items-start">
                        <div class="w-full max-w-xl flex-none">
                            <p class="text-sm font-semibold">Current Password</p>
                        </div>

                        <div class="w-full max-w-lg flex-none">
                            <x-input type="password" id="current_password" name="current_password" class="input_primary"/>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-full max-w-xl flex-none">
                            <p class="text-sm font-semibold">New Password</p>
                        </div>

                        <div class="w-full max-w-lg flex-none">
                            <x-input type="password" id="new_password" name="new_password" class="input_primary"/>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-full max-w-xl flex-none">
                            <p class="text-sm font-semibold">Confirm New Password</p>
                        </div>

                        <div class="w-full max-w-lg flex-none">
                            <x-input type="password" id="confirm_new_password" name="confirm_new_password" class="input_primary"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout.auth>
