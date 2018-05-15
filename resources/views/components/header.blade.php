<header>
    <div class="bg-white flex h-16 items-center justify-between select-none shadow w-full z-30">
        <div class="flex flex-1 items-stretch">
            <a href="{{ route('dashboard.index') }}" class="flex items-center justify-center h-16 mr-4 w-16" aria-label="Dashboard">
                <logo class="h-8 text-black"></logo>
            </a>
        </div>

        @isset($pageTitle)
            <div class="flex justify-center mx-auto">
                <h1 class="text-black text-lg">{{ $pageTitle }}</h1>
            </div>
        @endisset

        <div class="flex flex-1 font-bold justify-end text-grey-darker text-xs">
            <dropdown>
                <div slot-scope="{ open, toggle, hide }">
                    <click-outside :do="hide">
                        <div class="relative" @keydown.esc="hide">
                            <button
                                class="appearance-none flex h-16 items-center justify-between overflow-hidden pl-4 text-black transition-all w-full z-50"
                                :class="{ 'bg-black text-white': open,
                                          'bg-white': !open }"
                                @click="toggle">
                                <div class="mr-4">
                                    <img class="rounded-full w-8"
                                     src="{{ Gravatar::src(auth()->user()->email) }}">
                                </div>

                                <span class="font-bold mr-4 text-inherit">
                                    {{ auth()->user()->name }}
                                </span>

                                <div class="flex h-16 items-center justify-center w-16">
                                    <svg class="fill-current text-grey w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M7 10l5 5 5-5z"/>
                                        <path d="M0 0h24v24H0z" fill="none"/>
                                    </svg>
                                </div>
                            </button>

                            <transition name="slide-down" mode="out-in">
                                <div class="z-40 w-full bg-black shadow absolute rounded-bl pin-t pin-r mt-16 py-3" v-show="open" v-cloak>
                                    <a class="text-grey-light hover:text-grey-lighter focus:text-grey-lighter block no-underline font-semibold text-xs hover:bg-grey-darkest focus:bg-grey-darkest py-2 px-4" href="{{ route('settings.profile') }}">Settings</a>
                                    <a class="text-grey-light hover:text-grey-lighter focus:text-grey-lighter block no-underline font-semibold text-xs hover:bg-grey-darkest focus:bg-grey-darkest py-2 px-4"
                                       href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </div>
                            </transition>
                        </div>
                    </click-outside>
                </div>
            </dropdown>
        </div>
    </div>
</header>
