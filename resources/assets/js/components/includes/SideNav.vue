<template>
    <v-list dense>
        <template v-for="item in items">
          <router-link :to="item.link" :key="item.heading">
            <v-layout
              v-if="item.heading"
              :key="item.heading"
              row
              align-center
            >
              <v-flex xs6>
                <v-subheader v-if="item.heading">
                  {{ item.heading }}
                </v-subheader>
              </v-flex>
              <v-flex xs6 class="text-xs-center">
                <a href="#!" class="body-2 black--text">EDIT</a>
              </v-flex>
            </v-layout>
            <v-list-group
              v-else-if="item.children"
              v-model="item.model"
              :key="item.text"
              :prepend-icon="item.model ? item.icon : item['icon-alt']"
              append-icon=""
            >
              <v-list-tile slot="activator">
                <v-list-tile-content>
                  <v-list-tile-title>
                    {{ item.text }}
                  </v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
              <v-list-tile
                v-for="(child, i) in item.children"
                :key="i"
              >
                <v-list-tile-action v-if="child.icon">
                  <v-icon>{{ child.icon }}</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title>
                    {{ child.text }}
                  </v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
            </v-list-group>
            <v-list-tile v-else :key="item.text">
              <v-list-tile-action>
                <v-icon>{{ item.icon }}</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                <v-list-tile-title>
                  {{ item.text }}
                </v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
          </router-link>
        </template>
      </v-list>
</template>
<script>
export default {
data: () => ({
      items: [
        { icon: 'dashboard', text: 'Dashboard', link:'/' },
        { icon: 'laptop', text: 'Podstrony', link: '/pages' },
        { icon: 'perm_identity' , text: 'Użytkownicy', link: '/users'},
        { icon: 'verified_user', text: 'Uprawnienia', link: '/permissions'},
        { icon: 'view_quilt', text: 'Kreator', link: '/creator'},

        { icon: 'file_copy', text: 'Pliki', link: '/files'},
        { icon: 'settings', text: 'Ustawienia', link: '/settings'},

        // {
        //   icon: 'keyboard_arrow_up',
        //   'icon-alt': 'keyboard_arrow_down',
        //   text: 'More',
        //   model: false,
        //   children: [
        //     { text: 'Import' },
        //     { text: 'Export' },
        //     { text: 'Print' },
        //     { text: 'Undo changes' },
        //     { text: 'Other contacts' }
        //   ]
        // }
      ]
    })
  }
</script>
<style lang="scss" scoped>
.application.theme--light a{
  text-decoration: none;
}
.router-link-active div{
  background-color: #FAFAFA;
}
</style>
