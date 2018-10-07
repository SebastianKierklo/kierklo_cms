<template>
    <div>
        <div class="window">
            <div class="window-title">Dodawanie nowej galerii</div>
            <input type="file" @change="onFileChange" multiple>
            <hr>
            <v-list two-line>
                <template v-for="(item, index) in items">

                    <v-list-tile
                            :key="item.title"
                            avatar
                            @click=""
                    >
                        <v-list-tile-avatar>
                            <img :src="item.avatar">
                        </v-list-tile-avatar>

                        <v-list-tile-content>
                            <v-list-tile-title v-html="item.title"></v-list-tile-title>
                            <v-list-tile-sub-title v-html="item.subtitle"></v-list-tile-sub-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </template>
            </v-list>
        </div>

    </div>
</template>
<script>

    export default {

        data: function () {
            return {
                files: [],
                items: [
                    {
                        avatar: 'https://cdn.vuetifyjs.com/images/lists/1.jpg',
                        title: 'Brunch this weekend?',
                        subtitle: "<span class='text--primary'>Ali Connors</span> &mdash; I'll be in your neighborhood doing errands this weekend. Do you want to hang out?"
                    },
                    {
                        avatar: 'https://cdn.vuetifyjs.com/images/lists/2.jpg',
                        title: 'Summer BBQ <span class="grey--text text--lighten-1">4</span>',
                        subtitle: "<span class='text--primary'>to Alex, Scott, Jennifer</span> &mdash; Wish I could come, but I'm out of town this weekend."
                    },
                    {
                        avatar: 'https://cdn.vuetifyjs.com/images/lists/3.jpg',
                        title: 'Oui oui',
                        subtitle: "<span class='text--primary'>Sandra Adams</span> &mdash; Do you have Paris recommendations? Have you ever been?"
                    }
                ]
            }
        },
        methods: {
            onFileChange(e){
                var files = e.target.files;
                console.log(files);
                // if(files){
                //     var files_count = files.length;
                //     for (let i=0; i<files_count; i++){
                //         var reader = new FileReader();
                //         reader.onload = function(e){
                //             this.selectedFile = e.target.result;
                //         }
                //         reader.readAsDataURL(files[i]);
                //     }
                // }
            }
        }
    }
</script>