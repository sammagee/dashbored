@extends('layouts.app')

@section('content')
  {{-- <site-status>
    <div
      class="bg-white p-4 rounded shadow w-1/3"
      slot-scope="{ sites }">
      <ul class="list-reset">
        <li v-for="site in sites" v-text="site"></li>
      </ul>
    </div>
  </site-status> --}}
  <div class="flex h-full">
    <div class="flex flex-col mr-4 w-1/3">
      <h2 class="mb-2 text-xs text-black tracking-wide uppercase">Todo</h2>

      <div class="bg-white flex-1 p-4 rounded shadow">
      </div>
    </div>

    <div class="flex flex-col w-2/3">
      <h2 class="mb-2 text-xs text-black tracking-wide uppercase">Today</h2>

      <div class="bg-white flex-1 p-4 rounded shadow">
      </div>
    </div>
  </div>
@endsection
