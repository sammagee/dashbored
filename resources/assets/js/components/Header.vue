<template>
  <header class="bg-white mb-6 shadow">
    <div class="flex h-16 items-center pl-5 pr-16 md:pr-5">
      <div class="flex flex-1 items-center mr-auto">
        <router-link
          :to="{ name: 'home' }"
          class="leading-0">
          <logo class="w-8" />
        </router-link>

        <h1 class="flex items-center leading-none text-black text-xl">
          <span class="mx-2 text-xs text-grey">/</span>
          <slot name="title"></slot>
        </h1>
      </div>

      <nav class="hidden md:flex flex-1 h-16 md:justify-center mx-auto">
        <slot name="nav"></slot>
      </nav>

      <div class="flex-1 ml-auto"></div>
    </div>

    <div class="flex md:hidden h-16 items-center px-5 overflow-x-scroll">
      <nav class="flex flex-1 h-16 md:justify-center mx-auto">
        <slot name="nav-mobile"></slot>
      </nav>
    </div>
  </header>
</template>

<script>
  export default {
    name: 'v-header'
  }
</script>

