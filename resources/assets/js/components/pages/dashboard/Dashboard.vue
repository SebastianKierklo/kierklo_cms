<template>
    <div>
        <v-jumbotron>
            <v-layout align-center>
                <v-flex>
                <h3 class="display-3">Witaj w systemie KierkloCMS.</h3>

                <span class="subheading">Lorem ipsum dolor sit amet, pri veniam forensibus id. Vis maluisset molestiae id, ad semper lobortis cum. At impetus detraxit incorrupte usu, repudiare assueverit ex eum, ne nam essent vocent admodum.</span>

                <v-divider class="my-3"></v-divider>

                <div class="title mb-3">Check out our newest features!</div>

                <v-btn
                    class="mx-0"
                    color="primary"
                    large
                >
                    See more
                </v-btn>
                </v-flex>
            </v-layout>
        </v-jumbotron>

        <v-speed-dial
        v-model="fab"
        bottom
        right
        :open-on-hover="hover"
        :transition="transition"
      >
        <v-btn
          slot="activator"
          v-model="fab"
          color="blue darken-2"
          dark
        >
            <v-icon>apps</v-icon>
            <v-icon>close</v-icon>
        </v-btn>
        <v-btn
          dark
          small
          color="green"
        >
            <v-icon>edit</v-icon>
        </v-btn>
        <v-btn
          dark
          small
          color="indigo"
        >
            <v-icon>add</v-icon>
        </v-btn>
        <v-btn
          dark
          small
          color="red"
        >
            <v-icon>delete</v-icon>
        </v-btn>
      </v-speed-dial>

    </div>
</template>
<script>
export default {
  data: () => ({
    fling: false,
    hover: false,
    tabs: null,
    transition: 'slide-y-reverse-transition'
  }),

  computed: {
    activeFab () {
      switch (this.tabs) {
        case 'one': return { 'class': 'purple', icon: 'account_circle' }
        case 'two': return { 'class': 'red', icon: 'edit' }
        case 'three': return { 'class': 'green', icon: 'keyboard_arrow_up' }
        default: return {}
      }
    }
  },

  watch: {
    top (val) {
      this.bottom = !val
    },
    right (val) {
      this.left = !val
    },
    bottom (val) {
      this.top = !val
    },
    left (val) {
      this.right = !val
    }
  }
}
</script>