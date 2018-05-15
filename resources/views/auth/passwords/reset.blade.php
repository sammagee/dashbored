@extends('layouts.auth')

@section('Reset Password')

@section('form')
    <form method="POST" action="{{ route('password.request') }}">
        <div class="bg-white mb-4 overflow-hidden rounded shadow">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                <input
                    id="email"
                    type="email"
                    class="h-12 px-4 text-grey-darker border-b border-grey-lighter w-full{{ $errors->has('email') ? ' pr-12' : '' }}"
                    name="email"
                    value="{{ $email ?? old('email') }}"
                    required
                    autofocus
                    placeholder="Email">

                @if ($errors->has('email'))
                    <div class="flex items-center justify-center px-4 text-red text-xs font-bold absolute pin-r pin-t leading-none cursor-pointer h-12" v-tooltip.right="'{{ $errors->first('email') }}'">
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

            <div>
                <input
                    id="password_confirmation"
                    type="password"
                    class="h-12 px-4 text-grey-darker border-b border-grey-lighter w-full{{ $errors->has('password_confirmation') ? ' pr-12' : '' }}"
                    name="password_confirmation"
                    required
                    placeholder="Confirm Password">

                @if ($errors->has('password_confirmation'))
                    <div class="flex items-center justify-center px-4 text-red text-xs font-bold absolute pin-r pin-t leading-none cursor-pointer h-12" v-tooltip.right="'{{ $errors->first('password_confirmation') }}'">
                        <span>!</span>
                    </div>
                @endif
            </div>
        </div>

        <div>
            <button type="submit" class="button w-full">
                Reset Password
            </button>
        </div>
    </form>
@endsection
