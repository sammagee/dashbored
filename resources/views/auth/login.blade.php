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
                    <div class="flex items-center justify-center px-4 text-secondary text-xs font-bold absolute pin-r pin-t leading-none cursor-pointer h-12" v-tooltip.right="'{{ $errors->first('username') }}'">
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
                    <div class="flex items-center justify-center px-4 text-secondary text-xs font-bold absolute pin-r pin-t leading-none cursor-pointer h-12" v-tooltip.right="'{{ $errors->first('password') }}'">
                        <span>!</span>
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <button type="submit" class="button w-full">
                Login
            </button>
        </div>
    </form>
@endsection
