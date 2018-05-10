<aside class="bg-white flex w-16 h-full shadow select-none">
  <div class="flex-1 py-6">
    <a
      href="{{ route('settings.profile') }}"
      class="py-4 flex justify-center hover:bg-grey-lightest border-l-2 border-transparent {{ is_active('settings.profile') ? 'border-black text-black hover:text-black focus:text-black bg-grey-lightest': 'text-grey hover:text-grey-dark focus:bg-grey-lightest focus:text-grey-dark' }}"
      v-tooltip.left="'Profile'">
      <svg class="fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
        <path d="M0 0h24v24H0z" fill="none"/>
      </svg>
    </a>

    <a
      href="{{ route('settings.security') }}"
      class="py-4 flex justify-center hover:bg-grey-lightest border-l-2 border-transparent {{ is_active('settings.security') ? 'border-black text-black hover:text-black focus:text-black bg-grey-lightest': 'text-grey hover:text-grey-dark focus:bg-grey-lightest focus:text-grey-dark' }}"
      v-tooltip.left="'Security'">
      <svg class="fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
        <path d="M0 0h24v24H0z" fill="none"/>
      </svg>
    </a>
  </div>
</aside>
