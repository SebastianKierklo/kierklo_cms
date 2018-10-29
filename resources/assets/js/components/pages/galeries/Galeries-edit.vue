<template>
    <div>
        <v-dialog
                v-model="dialogAdd"
                full-width="true"
        >
            <v-btn
                slot="activator"
                color="primary"
                v-if="btn"
            >
                Dodaj galerie
            </v-btn>
            <i
                v-if="!btn"
                slot="activator"
                class="material-icons"
            >
                build
            </i>

            <v-card>
                <v-card-title
                        class="headline"
                        primary-title
                >
                    Edycja galerii
                </v-card-title>
                <!--<loader :loading="isAdded" :message="'Trwa zapisywanie...'"></loader>-->
                <!--<transition name="fadeC" mode="out-in">-->
                    <!--<v-form v-if="!isAdded">-->
                        <!--<v-card-text>-->
                            <!--<v-text-field-->
                                    <!--v-model="newGalery.name"-->
                                    <!--:counter="10"-->
                                    <!--label="Nazwa"-->
                                    <!--required-->
                            <!--&gt;</v-text-field>-->
                            <!--<v-select-->
                                    <!--:items="pages"-->
                                    <!--v-model="newGalery.pageId"-->
                                    <!--label="Strona"-->
                            <!--&gt;</v-select>-->
                        <!--</v-card-text>-->
                        <!--<v-card-actions>-->
                            <!--<v-spacer></v-spacer>-->
                            <!--<v-btn-->
                                    <!--color="primary"-->
                                    <!--@click="addGaleries()"-->
                            <!--&gt;-->
                                <!--Dodaj-->
                            <!--</v-btn>-->
                        <!--</v-card-actions>-->
                    <!--</v-form>-->
                <!--</transition>-->
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
    export default {
        props:{
            btn: Boolean
        },

        data () {
            return {
                dialogAdd: false,
                loading: true
            }
        },
        created: function(){
            this.getData();
        },
        methods:{
            getData(){

            }
        }
    }
</script>

<style scoped>

</style>