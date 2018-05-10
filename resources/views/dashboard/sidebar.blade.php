<aside class="bg-white flex w-16 h-full shadow select-none">
  <div class="flex-1 py-6">
    <a
      href="{{ route('dashboard.index') }}"
      class="py-4 flex justify-center hover:bg-grey-lightest border-l-2 border-transparent {{ is_active('dashboard.index') ? 'border-black text-black hover:text-black focus:text-black bg-grey-lightest': 'text-grey hover:text-grey-dark focus:bg-grey-lightest focus:text-grey-dark' }}"
      v-tooltip.left="'Dashboard'">
      <svg class="fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M0 0h24v24H0z" fill="none"/>
        <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
      </svg>
    </a>

    <a
      href="{{ route('dashboard.portfolio') }}"
      class="py-4 flex justify-center hover:bg-grey-lightest border-l-2 border-transparent {{ is_active('dashboard.portfolio') ? 'border-black text-black hover:text-black focus:text-black bg-grey-lightest': 'text-grey hover:text-grey-dark focus:bg-grey-lightest focus:text-grey-dark' }}"
      v-tooltip.left="'Portfolio'">
      <svg class="fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M0 0h24v24H0z" fill="none"/>
        <path d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z"/>
      </svg>
    </a>
  </div>
</aside>
