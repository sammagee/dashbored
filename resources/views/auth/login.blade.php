@extends('layouts.auth')

@section('title', 'Login')

@section('form')
    <form method="POST" action="{{ route('login') }}">
        <div class="bg-white mb-4 overflow-hidden rounded shadow">
            @csrf

            <div>
                <input
                    id="username"
                    type="text"
                    class="h-12 px-4 text-grey-darker border-b border-grey-lighter w-full{{ $errors->has('username') ? ' pr-12' : '' }}"
                    name="username"
                    value="{{ old('username') }}"
                    required
                    autofocus
                    placeholder="Username">

                @if ($errors->has('username'))
                    <div class="flex items-center justify-center px-4 text-red text-xs font-bold absolute pin-r pin-t leading-none cursor-pointer h-12" v-tooltip.right="'{{ $errors->first('username') }}'">
                        <span>!</span>
                    </div>
                @endif
            </div>

            <div>
                <input
                    id="password"
                    type="password"
                    class="h-12 px-4 text-grey-darker border-b border-grey-lighter w-full{{ $errors->has('password') ? ' pr-12' : '' }}"
                    name="password"
                    required
                    placeholder="Password">

                @if ($errors->has('password'))
                    <div class="flex items-center justify-center px-4 text-red text-xs font-bold absolute pin-r pin-t leading-none cursor-pointer h-12" v-tooltip.right="'{{ $errors->first('password') }}'">
                        <span>!</span>
                    </div>
                @endif
            </div>
        </div>

        <div class="mb-2">
            <button type="submit" class="button w-full">
                Login
            </button>
        </div>

        <div class="text-center">
            <a class="font-bold no-underline text-black text-xs hover:text-grey-darker focus:text-grey-darker active:text-grey-darkest transition-all" href="{{ route('password.request') }}">
                Forgot your info?
            </a>
        </div>
    </form>
@endsection
