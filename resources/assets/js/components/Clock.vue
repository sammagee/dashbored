<template>
  <div class="flex flex-col items-center justify-center mb-4 w-full">
    <h1 class="font-black font-mono text-grey-black text-4xl md:text-6xl">
      {{ time }}<span class="font-semibold text-grey-dark text-xl"> {{ meridiem }}</span>
    </h1>

    <h2 class="font-mono font-semibold text-grey-dark text-xl">{{ date }}</h2>
  </div>
</template>

<script>
  import moment from 'moment'

  export default {
    name: 'Clock',

    data () {
      return {
        time: null,
        meridiem: null,
        date: null
      }
    },

    created () {
      this.refreshTime()

      setInterval(this.refreshTime, 1000)
    },

    methods: {
      refreshTime () {
        this.time = moment().format('hh:mm:ss')
        this.meridiem = moment().format('A')
        this.date = moment().format('dddd D MMMM')
      }
    }
  };
</script>

