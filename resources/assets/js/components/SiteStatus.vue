<script>
  import _ from 'lodash'
  import axios from 'axios'

  export default {
    name: 'site-status',

    data() {
      return {
        sites: [
          {
            url: 'sammagee.me',
            status: '',
          },
          {
            url: 'db.sammagee.me',
            status: '',
          }
        ]
      }
    },

    mounted() {
      // this.refresh();
      // setTimeout(this.refresh, 5000);
      this.open();
    },

    methods: {
      open() {
      }
    },

    render() {
      return this.$scopedSlots.default({
        sites: this.sites
      })
    }
  };
</script>
