<template>
    <div>
        <v-flex class="window">
            <div class="window-title">Galerie</div>
            <loader :loading="isLoaded" :message="messageLoaded"></loader>
            <transition name="fadeC" mode="out-in">
                <v-flex v-if="!isLoaded" xs12 sm12>
                    <v-dialog
                            v-model="dialogAdd"
                            width="500"
                    >
                        <v-btn
                                slot="activator"
                                primary
                        >
                            Dodaj galerie
                        </v-btn>

                        <v-card>
                            <v-card-title
                                    class="headline"
                                    primary-title
                            >
                                Dodawanie galerii
                            </v-card-title>
                            <loader :loading="isAdded" :message="'Trwa zapisywanie...'"></loader>
                            <transition name="fadeC" mode="out-in">
                                <v-form v-if="!isAdded">
                                    <v-card-text>
                                        <v-text-field
                                                v-model="newGalery.name"
                                                :counter="10"
                                                label="Nazwa"
                                                required
                                        ></v-text-field>
                                        <v-select
                                                :items="pages"
                                                v-model="newGalery.pageId"
                                                label="Standard"
                                        ></v-select>
                                    </v-card-text>
                                    <v-card-actions>
                                        <v-spacer></v-spacer>
                                        <v-btn
                                                color="primary"
                                                flat
                                                @click="addGaleries()"
                                        >
                                            Dodaj
                                        </v-btn>
                                    </v-card-actions>
                                </v-form>
                            </transition>
                        </v-card>
                    </v-dialog>
                    <v-data-table
                            :headers="headers"
                            :items="galeries"
                            hide-actions
                            class="elevation-1"
                    >
                        <template slot="items" slot-scope="props">
                            <td>{{ props.item.name }}</td>
                            <td>
                                <i class="material-icons">build</i>
                            </td>
                            <td> <i v-confirm="{
                                ok: dialog => removeSetting(props.item),
                                message: 'Czy na pewno chcesz skasować ten element?'}"
                                    class="material-icons m-pointer">delete</i> </td>
                        </template>
                    </v-data-table>

                </v-flex>
            </transition>
        </v-flex>
    </div>
</template>
<script>
    export default {
        created: function(){
            this.getData();
        },
        data () {
            return {
                isLoaded: true,
                loaderMessage: '',
                pages: [],
                galeries: [],
                isAdded: false,
                dialogAdd: false,
                newGalery:{
                    name: '',
                    pageId: ''
                },
                headers: [
                    { text: 'Nazwa', value: 'name' },
                    { text: 'Edycja', sortable: false},
                    { text: 'Kasuj', sortable: false},
                ]
            }
        },
        methods:{
            addGaleries: function () {
                axios.post('/admin/galeries/add',this.newGalery)
                    .then(response => {
                        if(response.data.result){

                        }
                        this.isLoaded = false;
                        Vue.toasted.show(response.data.message)
                    })
                    .catch(e => {
                        this.isLoaded = false;
                        Vue.toasted.show(e);
                    });
            },
            getData: function(){
                this.messageLoaded = 'Pobiernie danych...';
                axios.post('/admin/galeries/list')
                    .then(response => {
                        if(response.data.result){
                            this.pages = response.data.data.pages;
                            this.galeries = response.data.data.galeries;
                        }
                        this.isLoaded = false;
                    })
                    .catch(e => {
                        this.isLoaded = false;
                        Vue.toasted.show(e);
                    });
            }
        }
    }
</script>