@extends('layouts.settings')

@section('title', 'Profile Settings')

@section('form')
    <h2 class="mb-2 text-xs text-black tracking-wide uppercase">Profile</h2>

    <form method="POST" action="{{ route('settings.profile') }}">
        <div class="bg-white mb-4 overflow-hidden rounded shadow">
            @method('PATCH')
            @csrf

            <div>
                <input
                    id="name"
                    type="text"
                    class="h-12 px-4 text-grey-darker border-b border-grey-lighter w-full{{ $errors->has('name') ? ' pr-12' : '' }}"
                    name="name"
                    value="{{ $user->name }}"
                    required
                    autofocus
                    placeholder="Name">

                @if ($errors->has('name'))
                    <div class="flex items-center justify-center px-4 text-red text-xs font-bold absolute pin-r pin-t leading-none cursor-pointer h-12" v-tooltip.right="'{{ $errors->first('name') }}'">
                        <span>!</span>
                    </div>
                @endif
            </div>

            <div>
                <input
                    id="username"
                    text="text"
                    class="h-12 px-4 text-grey-darker border-b border-grey-lighter w-full{{ $errors->has('username') ? ' pr-12' : '' }}"
                    name="username"
                    value="{{ $user->username }}"
                    required
                    placeholder="Username">

                @if ($errors->has('username'))
                    <div class="flex items-center justify-center px-4 text-red text-xs font-bold absolute pin-r pin-t leading-none cursor-pointer h-12" v-tooltip.right="'{{ $errors->first('username') }}'">
                        <span>!</span>
                    </div>
                @endif
            </div>

            <div>
                <input
                    id="email"
                    text="email"
                    class="h-12 px-4 text-grey-darker border-b border-grey-lighter w-full{{ $errors->has('email') ? ' pr-12' : '' }}"
                    name="email"
                    value="{{ $user->email }}"
                    required
                    placeholder="Email">

                @if ($errors->has('email'))
                    <div class="flex items-center justify-center px-4 text-red text-xs font-bold absolute pin-r pin-t leading-none cursor-pointer h-12" v-tooltip.right="'{{ $errors->first('email') }}'">
                        <span>!</span>
                    </div>
                @endif
            </div>
        </div>

        <div>
            <button type="submit" class="button w-full">
                Save
            </button>
        </div>
    </form>
@endsection
