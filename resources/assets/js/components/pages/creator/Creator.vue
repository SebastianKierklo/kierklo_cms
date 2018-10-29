<template>
    <div>
        <v-layout row wrap>
            <v-flex xs12 sm8>
                <!--<v-breadcrumbs divider="/">-->
                    <!--<v-breadcrumbs-item-->
                            <!--v-for="item in items"-->
                            <!--:key="item.text"-->
                            <!--:disabled="item.disabled"-->
                    <!--&gt;-->
                        <!--{{ item.text }}-->
                    <!--</v-breadcrumbs-item>-->
                <!--</v-breadcrumbs>-->
            </v-flex>
        </v-layout>
        <div class="window">
            <div class="window-title">Kreator</div>
            <loader :loading="isLoaded" :message="loaderMessage"></loader>
            <transition name="fadeC" mode="out-in">
                <v-form v-if="!isLoaded">
                <v-text-field
                        v-model="form.name"
                        :counter="100"
                        label="Nazwa podstrony"
                        required
                ></v-text-field>
                <v-dialog
                        v-model="dialogAdd"
                        width="500"
                >
                    <v-btn
                        absolute
                        dark
                        fab
                        bottom
                        right
                        color="primary"
                        slot="activator"
                    >
                        <v-icon>add</v-icon>
                    </v-btn>

                    <v-card>
                        <v-card-title
                            class="headline"
                            primary-title
                        >
                            Dodawanie pola
                        </v-card-title>
                        <v-form>
                            <v-card-text>
                                <v-text-field
                                    v-model="newItem.name"
                                    :counter="15"
                                    label="Nazwa pola"
                                ></v-text-field>
                            </v-card-text>
                            <v-card-text>
                                <v-select
                                    v-model="newItem.type"
                                    :items="fieldsType"
                                    label="Typ pola"
                                ></v-select>
                            </v-card-text>
                            <v-card-text>
                                <v-checkbox
                                    v-model="newItem.nullable"
                                    label="Czy pole ma być wymagane?"
                                ></v-checkbox>
                            </v-card-text>

                            <v-card-text>
                                <v-spacer></v-spacer>
                                <v-btn
                                    color="primary"
                                    @click="addItem()"
                                >
                                    <!--<i class="material-icons">add</i>-->
                                    Dodaj
                                    <v-icon right>add</v-icon>
                                </v-btn>
                                <v-btn
                                    color="primary"
                                    v-on:click="dialogAdd = false"
                                >
                                    <!--<i class="material-icons">cancel</i>-->
                                    <span>Anuluj</span>
                                    <v-icon right>cancel</v-icon>
                                </v-btn>
                            </v-card-text>
                        </v-form>
                    </v-card>
                </v-dialog>
                <v-data-table
                        :headers="headers"
                        :items="form.fields"
                        hide-actions
                        class="elevation-1"
                >
                    <template slot="items" slot-scope="props">
                        <td>{{ props.item.name }}</td>
                        <td>
                            <span v-if="props.item.nullable">Wymagane</span>
                            <span v-else>Opcjonalne</span>
                        </td>
                        <td><v-icon @click="removeItem(props.item.id)">delete</v-icon></td>
                    </template>
                </v-data-table>

                <v-btn
                    color="primary"
                    @click="savePage()"
                    style="margin-top: 15px;"
                    submit
                >
                    <span>Zapisz</span>
                    <v-icon right>save</v-icon>
                </v-btn>
            </v-form>
            </transition>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                isLoaded: false,
                loaderMessage: '',
                fieldsType: [],
                form: {
                    name: '',
                    fields: []
                },
                headers:[
                    {text:'Nazwa pola', sortable:false, value:'name'},
                    {text:'Czy pole wymagane',sortable:false, value:'nullable'},
                    {text:'Usuń',sortable:false}
                ],
                dialogAdd: false,
                idSet: 0,
                newItem:{
                    id: 0,
                    type: '',
                    name: '',
                    nullable: false
                }
            }
        },
        mounted: function () {
            this.getFields();
        },
        methods: {
            getFields: function(){
                this.isLoaded = true;
                this.loaderMessage = "Pobieranie danych";
                axios.post('/admin/creator-fields')
                    .then(response => {
                        this.fieldsType = response.data.fields;
                        this.isLoaded = false;
                    })
                    .catch(r => {
                        Vue.toasted.show(e);
                    });
            },
            addItem: function(){
                var valid = this.validItem();
                if(valid.result){
                    this.newItem.id = this.idSet;
                    this.idSet++;
                    this.form.fields.push(this.newItem);
                    this.newItem  = {
                        id:0,
                        type: '',
                        name: '',
                        nullable: false
                    };
                    this.dialogAdd = false;
                }else{
                    Vue.toasted.show(valid.message);
                }

            },
            removeItem: function(id){
                var tmpLp = null;
                this.form.fields.forEach(function(val,index){
                    if(val.id == id){
                        tmpLp = index;
                    }
                });
                this.form.fields.pop(tmpLp);
            },
            savePage: function () {
                var valid = this.validForm();
                if(valid.result){
                    this.loaderMessage = "Trwa dodawanie.";
                    this.isLoaded = true;
                    axios.post('/admin/page/add',this.form)
                        .then(response => {
                            this.isLoaded = false;
                            Vue.toasted.show(response.data.message);
                            if(response.data.result){
                                this.$router.push('/admin/pages');
                            }
                        })
                        .catch(e =>{
                            Vue.toasted.show(e);
                        });
                }else{
                    Vue.toasted.show(valid.message);
                }
            },
            validItem: function(){
                var valid = {
                    result:true,
                    message: 'Dodano nowe pole.'
                };
                if(this.newItem.name == '' || this.newItem.type == ''){
                    valid.result = false;
                    valid.message = "Uzupełnij dane";
                }
                return valid;
            },
            validForm: function () {
                var valid = {
                    result:true,
                    message: 'Dodano nowe pole.'
                };
                if(this.form.name == '' || this.form.fields.length == 0){
                    valid.result = false;
                    valid.message = "Uzupełnij dane";
                }
                return valid;
            }
        }
    }
</script>
<style lang="scss" scoped>
    .v-btn--bottom{
        bottom: 0;
    }
</style>