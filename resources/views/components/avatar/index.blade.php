<div class="w-12 h-12 rounded-full bg-general-100 overflow-hidden">
    <img src="https://api.dicebear.com/5.x/avataaars/svg?seed={{ md5(str_replace(' ', '', strtolower(auth()->user()->profile->fullname))) }}" class="w-full h-full object-cover"/>
</div>
