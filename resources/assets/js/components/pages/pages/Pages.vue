<template>
  <div>
    <div class="window">
      <div class="window-title">Strony</div>
        <loader :loading="isLoaded" :message="messageLoaded"></loader>
        <transition name="fadeC" mode="out-in">
          <v-data-table
                  :headers="headers"
                  :items="pages"
                  :rowsPerPageText="'Wierszy na stronie'"
                  class="elevation-1"
                  v-if="!isLoaded"
          >
            <template slot="items" slot-scope="props">
              <td>{{ props.item.name }}</td>
              <td><v-icon @click="$router.push('/admin/creator/edit/'+props.item.id)">table_chart</v-icon></td>
              <td><v-icon @click="$router.push('/admin/pages/edit/'+props.item.id)">edit</v-icon></td>
              <td>
                <v-icon
                    class="m-pointer"
                    v-confirm="{ok: dialog => removePage(props.item.id), message: 'Czy na pewno chcesz skasować ten element?'}"
                >delete</v-icon>
              </td>
            </template>
          </v-data-table>
        </transition>

    </div>
  </div>
</template>
<script>
export default {
  data () {
    return {
        isLoaded:false,
        messageLoaded: 'Pobiernie danych...',
        selectedLang: null,
        pages: [],
        headers: [
            {text:'Nazwa',value:'name'},
            {text:'Edycja(kreator)',sortable:false},
            {text:'Edycja(treść)',sortable:false},
            {text:'Usuń',sortable:false}
        ]
    }
  },
  mounted: function () {
      this.getData();
  },
  methods:{
      getData: function () {
          this.messageLoaded = 'Pobiernie danych...';
          this.isLoaded = true;
          axios.post('/admin/page/list')
              .then(response => {
                  this.pages = response.data.data.pages;
                  this.isLoaded = false;
              })
              .catch(e => {
                  Vue.toasted.show(e);
              });
      },
      removePage: function (id) {
          this.messageLoaded = 'Kasowanie...';
          this.isLoaded = true;
          axios.post('/admin/page/delete/'+id)
              .then(response => {
                  if(response.data.result){
                      this.getData();
                  }
                  Vue.toasted.show(response.data.message);
              })
              .catch(e =>{
                  Vue.toasted.show(e);
              });
      },
      goToEdit: function (id) {
          this.$router.push('/admin/pages');
      }
  }
}
</script>