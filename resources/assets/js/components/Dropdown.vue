<script>
  export default {
    name: 'dropdown',

    data() {
      return {
        open: false,
      }
    },

    methods: {
      toggle() {
        this.open = !this.open;
      },

      hide() {
        if (this.open) {
          this.open = false;
        }
      }
    },

    render() {
      return this.$scopedSlots.default({
        open: this.open,
        toggle: this.toggle,
        hide: this.hide,
      })
    }
  };
</script>
