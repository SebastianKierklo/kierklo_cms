<template>
  <v-app id="inspire">
    <v-navigation-drawer
      :clipped="$vuetify.breakpoint.lgAndUp"
      v-model="drawer"
      fixed
      app
    >
      <side-nav></side-nav>
    </v-navigation-drawer>
    <v-toolbar
      :clipped-left="$vuetify.breakpoint.lgAndUp"
      dark
      app
      fixed
    >
      <v-toolbar-title style="width: 300px" class="ml-0 pl-3">
        <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
        <span class="hidden-sm-and-down">KierkloCMS</span>
      </v-toolbar-title>
      
      <v-spacer></v-spacer>
       <v-avatar
          :size="36"
          color="grey lighten-4"
        >
          <img src="/images/avatar.png" alt="avatar">
        </v-avatar>
        <span class="hidden-sm-and-down">admin@admin.com</span>
        <v-btn class="logout" v-on:click="logout()" color="primary">Wyloguj</v-btn>
    </v-toolbar>
    <v-content style="padding-top:40px;">
      <v-container>
        <transition name="fade" mode="out-in">
          <router-view></router-view>
        </transition>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
  export default {
    data: () => ({
      dialog: false,
      drawer: true,
      valid: false,
      name: '',
      nameRules: [
        v => !!v || 'Name is required',
        v => v.length <= 10 || 'Name must be less than 10 characters'
      ],
      email: '',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
      ]
    }),
    methods: {
      logout: function(){
        axios.post('/logout')
            .then(response => {
                Vue.toasted.show(response.data.message, { 
                    theme: "primary", 
                    position: "top-right", 
                    duration : 5000
                });   
                location.reload();        
            })
            .catch(e => {
                Vue.toasted.show(e);
            });
      }
    }
  }
</script>
<style lang="scss" scoped>
  .v-toolbar{
    box-shadow: none;
  }
  .logout{
    margin-bottom: 0;
    margin-left: 10px;
  }
  .v-avatar{
    margin-left: 10px;
    margin-right: 10px;
  }
</style>
