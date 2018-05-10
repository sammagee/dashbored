<script>
  export default {
    name: 'click-outside',

    props: ["do"],

    mounted() {
      const listener = e => {
        if (e.target !== this.$el && !this.$el.contains(e.target)) {
          this.do()
        }
      }

      document.addEventListener("click", listener)
      document.addEventListener("touchstart", listener)

      this.$once("hook:destroyed", () => {
        document.removeEventListener("click", listener)
        document.removeEventListener("touchstart", listener)
      })
    },

    render() {
      return this.$slots.default[0]
    }
  };
</script>
