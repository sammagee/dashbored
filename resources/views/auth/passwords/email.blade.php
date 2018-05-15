@extends('layouts.auth')

@section('title', 'Reset Password')

@section('form')
    <form method="POST" action="{{ route('password.email') }}">
        <div class="bg-white mb-4 overflow-hidden rounded shadow">
            @csrf

            <div>
                <input
                    id="email"
                    type="email"
                    class="h-12 px-4 text-grey-darker border-b border-grey-lighter w-full{{ $errors->has('email') ? ' pr-12' : '' }}"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
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
                Request Reset
            </button>
        </div>
    </form>
@endsection
