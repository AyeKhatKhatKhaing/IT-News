<div class="col-12 col-lg-5 col-xl-2 vh-100 sidebar">
    <div class="d-flex justify-content-between align-items-center py-2 mt-3 nav-brand">
        <div class="d-flex align-items-center">
            <img src="{{ asset(\App\Base::$logo) }}" class="w-50" alt="">
        </div>
        <button class="hide-sidebar-btn btn btn-light d-block d-lg-none">
            <i class="feather-x text-primary" style="font-size: 2em;"></i>
        </button>
    </div>
    <div class="nav-menu fs-1">
        <ul>

            <x-menu-spacer></x-menu-spacer>

            <x-menu-item name="Home" class="feather-home" link="{{ route('index') }}"></x-menu-item>

            <x-menu-spacer></x-menu-spacer>

            <x-menu-title title="Article Manager"></x-menu-title>
            <x-menu-item name="Manage Category" class="feather-layers" link="{{ route('category.index') }}">
            </x-menu-item>
            <x-menu-item name="Add Article" class="feather-plus-circle" link="{{ route('article.create') }}">
            </x-menu-item>
            <x-menu-item name="Article List" class="feather-list" link="{{ route('article.index') }}"
                counter="{{ $article->count() }}"></x-menu-item>

            <x-menu-spacer></x-menu-spacer>

            <x-menu-title title="User Profile"></x-menu-title>
            <x-menu-item name="Your Profile" class="feather-user" link="{{ route('profile') }}"></x-menu-item>
            <x-menu-item name="Change Password" class="feather-refresh-cw" link="{{ route('profile.edit.password') }}">
            </x-menu-item>
            <x-menu-item name="Name & Email" class="feather-message-square"
                link="{{ route('profile.edit.name.email') }}"></x-menu-item>
            <x-menu-item name="Update photo" class="feather-image" link="{{ route('profile.edit.photo') }}">
            </x-menu-item>
            <x-menu-spacer></x-menu-spacer>

            <x-menu-spacer></x-menu-spacer>
            <li class="menu-item">
                <a class="btn btn-outline-primary btn-block" href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    logout
                </a>
            </li>
        </ul>
    </div>
</div>
