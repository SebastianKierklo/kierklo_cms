<template>
    <div>
        <div class="window">
            <div class="window-title">Ustawienia</div>
            <loader :loading="isLoaded" :message="'Pobiernie danych...'"></loader>
            <transition name="fade" mode="out-in">
                <v-flex v-if="!isLoaded" xs12 sm12>
                    <v-dialog
                            v-model="dialogAdd"
                            width="500"
                    >
                        <v-btn
                                slot="activator"
                                primary
                        >
                            Dodaj nowy
                        </v-btn>

                        <v-card>
                            <v-card-title
                                    class="headline"
                                    primary-title
                            >
                                Dodawanie ustawienia
                            </v-card-title>
                            <loader :loading="isAdded" :message="'Trwa zapisywanie...'"></loader>
                            <v-form v-if="!isAdded">
                                <v-card-text>
                                    <v-text-field
                                            v-model="newSetting.name"
                                            :counter="10"
                                            label="Nazwa"
                                            required
                                    ></v-text-field>
                                    <v-text-field
                                            v-model="newSetting.value"
                                            label="Wartość"
                                            required
                                    ></v-text-field>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn
                                            color="primary"
                                            flat
                                            @click="addSetting()"
                                    >
                                        Dodaj
                                    </v-btn>
                                </v-card-actions>
                            </v-form>
                        </v-card>
                    </v-dialog>
                    <v-data-table
                            :headers="headers"
                            :items="settings"
                            hide-actions
                            class="elevation-1"
                    >
                        <template slot="items" slot-scope="props">
                            <td>{{ props.item.id }}</td>
                            <td>{{ props.item.name }}</td>
                            <td>{{ props.item.value }}</td>
                            <td>
                                <!--Edycja-->
                                <v-dialog
                                        v-model="dialogEdit"
                                        width="500"
                                >
                                    <i class="material-icons" slot="activator">build</i>


                                    <v-card>
                                        <v-card-title
                                                class="headline"
                                                primary-title
                                        >
                                            Edycja ustawienia
                                        </v-card-title>
                                        <loader :loading="isEdited" :message="'Trwa zapisywanie...'"></loader>
                                        <v-form v-if="!isEdited">
                                            <v-card-text>
                                                <v-text-field
                                                        v-model="props.item.name"
                                                        :counter="10"
                                                        label="Nazwa"
                                                        required
                                                ></v-text-field>
                                                <v-text-field
                                                        v-model="props.item.value"
                                                        label="Wartość"
                                                        required
                                                ></v-text-field>
                                            </v-card-text>
                                            <v-card-actions>
                                                <v-spacer></v-spacer>
                                                <v-btn
                                                        color="primary"
                                                        flat
                                                        @click="editSetting(props.item)"
                                                >
                                                    Zapisz
                                                </v-btn>
                                            </v-card-actions>
                                        </v-form>
                                    </v-card>
                                </v-dialog>
                                <!--Koniec edycji-->
                            </td>
                            <td> <i v-confirm="{
                                ok: dialog => removeSetting(props.item),
                                message: 'Czy na pewno chcesz skasować ten element?'}"
                                    class="material-icons">delete</i> </td>
                        </template>
                    </v-data-table>
                </v-flex>
            </transition>

        </div>
    </div>
</template>
<script>
export default {
    created: function(){
        this.getData();
    },
    data () {
        return {
            isLoaded : true,
            isAdded: false,
            isEdited: false,
            dialogAdd :false,
            dialogEdit :false,
            settings : [],
            headers: [
                {
                    text: 'Id.',
                    align: 'left',
                    sortable: false,
                    value: 'name'
                },
                { text: 'Nazwa', value: 'name' },
                { text: 'Wartość', value: 'value' },
                { text: 'Edycja', sortable: false},
                { text: 'Kasuj', sortable: false},
            ],
            newSetting: {
                name: '',
                value: ''
            }
        }
    },
    methods: {
        getData: function(){
            this.isLoaded = true;
            axios.post('/admin/settings')
                .then(response => {
                    this.settings = response.data.settings;
                })
                .catch(e => {
                    Vue.toasted.show(e);
                })
                .then(r => {
                    this.isLoaded = false;
                });
        },
        addSetting: function () {
            this.isAdded = true;
            axios.post('/admin/settings/add',this.newSetting)
                .then(response => {
                    if(response.data.result){
                        this.getData();
                        this.dialogAdd = false;
                        this.newSetting.name = '';
                        this.newSetting.value = '';
                    }
                    Vue.toasted.show(response.data.message);
                })
                .catch(e => {
                    Vue.toasted.show(e);
                })
                .then(r => {
                    this.isAdded = false;
                });
        },
        editSetting: function(item){

        },
        removeSetting: function (item){
            axios.post('/admin/settings/remove',{id:item.id})
                .then(response => {
                    if(response.data.result){
                        this.getData();
                    }
                    Vue.toasted.show(response.data.message);
                })
                .catch(e => {
                    Vue.toasted.show(e);
                });
        }
    }
}
</script>