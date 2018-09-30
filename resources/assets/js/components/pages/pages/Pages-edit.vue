<template>
    <div>
        <v-flex class="window">
            <div class="window-title">Edycja podstrony - treść</div>
            <loader :loading="isLoaded" :message="messageLoaded"></loader>
            <transition name="fadeC" mode="out-in">
                <v-form v-if="!isLoaded">
                    <v-card-text>
                        <v-text-field
                            v-model="page.name"
                            :counter="100"
                            label="Nazwa"
                            required
                        ></v-text-field>
                        <v-tabs
                            v-model="selectLang"
                            class="tabs-custom"
                            color="tabs"
                            slider-color="accent"
                        >
                            <v-tab
                                v-for="lang in langs"
                                :key="lang.id"
                                ripple
                            >
                                {{lang.text}}
                            </v-tab>
                            <v-tab-item
                                v-for="lang in langs"
                                :key="lang.id"
                            >
                                <v-card flat v-for="field in page.fields" :key="field.id">
                                    <v-card-actions>
                                        <!--String-->
                                        <v-text-field
                                            v-for="meta in field.metas"
                                            v-if="field.type == 'varchar' && meta.lang == lang.value"
                                            v-model="meta.value"
                                            :counter="255"
                                            :label="field.name"
                                            required
                                            :key="meta.id"
                                        ></v-text-field>

                                        <!--Text-->
                                        <quill-editor v-for="meta in field.metas"
                                                      v-if="field.type == 'text' && meta.lang == lang.value"
                                                      v-model="meta.value"
                                                      :key="meta.id">
                                        </quill-editor>

                                        <!--Plik-->

                                    </v-card-actions>
                                </v-card>
                            </v-tab-item>
                        </v-tabs>
                        <v-btn
                            color="primary"
                            @click="savePage()"
                            style="margin-top: 15px;"

                            submit
                        >
                            <span>Zapisz</span>
                            <v-icon right>save</v-icon>
                        </v-btn>
                    </v-card-text>
                </v-form>
            </transition>
        </v-flex>
    </div>
</template>
<script>
    export default {
        mounted: function(){
            this.getData();
        },
        data () {
            return {
                isLoaded: true,
                messageLoaded: '',
                langs: [],
                selectLang: null,
                page: {},
                someData: []
            }
        },
        methods: {
            getData: function() {
                this.messageLoaded = "Pobieranie danych...";
                this.isLoaded = true;
                axios.post('/admin/page/get/'+this.$route.params.id)
                    .then(response => {
                        if(response.data.result){
                            this.langs = response.data.data.langs;
                            this.selectLang = response.data.data.langs[0];
                            this.page = response.data.data.pages;
                        }
                    })
                    .catch(e => {
                        Vue.toasted.show(e);
                    })
                    .then(r => {
                        this.isLoaded = false;
                    });
            },
            savePage: function () {
                this.messageLoaded = "Zapisywanie danych...";
                this.isLoaded = true;
                axios.post('/admin/page/set-content/',{page:this.page})
                    .then(response => {
                        console.log(response);
                        if(response.data.result){
                            Vue.toasted.show(response.data.message)
                            this.isLoaded = false;
                        }
                    })
                    .catch(e => {
                        Vue.toasted.show(e);
                        this.isLoaded = false;
                    });
            }
        }
    }
</script>
<style lang="scss" scoped>
    .form-boreder{
        margin-top: 15px;
        border: 1px solid rgba(0, 0, 0, 0.05);
        border-radius: 4px;
        padding: 15px;
    }
    .fields-label{
        border-bottom: 1px solid rgba(0,0,0,0.05);
        width:100%;
        display: block;
        padding-bottom: 8px;
    }
    .tabs-custom{
        margin-top: 15px;
    }
</style>