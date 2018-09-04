<template>
    <v-app>
        <v-content>
            <v-container fluid fill-height>
                <v-layout align-center justify-center>
                    <v-flex xs12 sm8 md4>
                        <v-card class="elevation-12" v-if="!isLoading">
                            <v-toolbar dark color="primary">
                                <v-toolbar-title>Login form</v-toolbar-title>
                                <v-spacer></v-spacer>
                            </v-toolbar>
                            <v-card-text>
                                <v-form>
                                    <v-text-field prepend-icon="person" v-model="form.email" label="Login" type="text"></v-text-field>
                                    <v-text-field id="password" prepend-icon="lock" v-model="form.password" label="Password" type="password"></v-text-field>
                                </v-form>
                            </v-card-text>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="primary" v-on:click="login()">Login</v-btn>
                            </v-card-actions>
                        </v-card>
                        <v-card class="elevation-12" v-if="isLoading">
                            <loader :loading="isLoading" :message="'Logowanie...'"></loader>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-content>
    </v-app>
</template>

<script>
 export default {
    data: () => ({
      drawer: null,
      isLoading: false,
      form: {
          email: "",
          password: ""
      }
    }),
    props: {
      source: String
    },
    methods: {
        login: function(){
            this.isLoading = true;
            axios.post('/login',this.form)
            .then(response => {
                Vue.toasted.show(response.data.message);
                if(response.data.result){
                    window.location.href = '/admin/dashboard';
                }
            })
            .catch(e => {
                Vue.toasted.show(e);
            }).then(r => {
                this.isLoading = false;
            });
        }
    }
  }
</script>
