<template>
  <div>
    <v-layout row wrap>
      <v-flex xs12 sm8>
        <v-breadcrumbs divider="/">
          <v-breadcrumbs-item
            v-for="item in items"
            :key="item.text"
            :disabled="item.disabled"
          >
            {{ item.text }}
          </v-breadcrumbs-item>
        </v-breadcrumbs>        
      </v-flex>
      <v-flex xs12 sm1>
        <div class="text-xs-center">
          <p style="margin-top:7px;">Język</p>
        </div>
      </v-flex>
      <v-flex xs12 sm3>
        <v-select
          :items="items"
          box
          hide-details
          class="lang-select"
        ></v-select>
      </v-flex>
    </v-layout>  
    <div class="window">
      <div class="window-title">Strony</div>
      
    </div>
  </div>
</template>
<script>
export default {
  data () {
    return {
      items: [
        {
          text: 'Dashboard',
          disabled: false
        },
        {
          text: 'Link 1',
          disabled: false
        },
        {
          text: 'Link 2',
          disabled: true
        }
      ]
    }
  }
}
</script>