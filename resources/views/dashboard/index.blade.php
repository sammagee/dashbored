@extends('layouts.app')

@section('content')
  <div class="flex flex-col h-full items-center justify-center container">
    <clock></clock>

    <div class="flex flex-wrap justify-center w-full -mx-4">
      <div class="p-4 w-full md:w-1/2 lg:w-1/3">
        <div class="bg-white p-16 rounded-lg shadow-lg">

        </div>
      </div>

      <div class="p-4 w-full md:w-1/2 lg:w-1/3">
        <div class="bg-white p-16 rounded-lg shadow-lg">

        </div>
      </div>

      <div class="p-4 w-full md:w-1/2 lg:w-1/3">
        <div class="bg-white p-16 rounded-lg shadow-lg">

        </div>
      </div>
    </div>

    {{-- <div class="flex flex-col mr-4 w-1/3">
      <h2 class="mb-2 text-xs text-black tracking-wide uppercase">Todo</h2>

      <div class="bg-white flex-1 p-4 rounded shadow">
      </div>
    </div>

    <div class="flex flex-col w-2/3">
      <h2 class="mb-2 text-xs text-black tracking-wide uppercase">Today</h2>

      <div class="bg-white flex-1 p-4 rounded shadow">
      </div>
    </div> --}}
  </div>
@endsection
