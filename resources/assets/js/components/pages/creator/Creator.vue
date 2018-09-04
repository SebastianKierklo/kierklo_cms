<template>
    <div>
        <h2>Kreator</h2>
        <v-flex xs12 sm4 offset-sm8 d-flex justify-end>
            <div class="text-xs-center">
                <p style="margin-top:7px;">Język</p>
            </div>
            <v-select
                    :items="items"
                    box
                    class="lang-select"
            ></v-select>
        </v-flex>
        <div class="window">
            <div class="window-title">Tytuł</div>
            <v-row>
                <v-btn color="success">Success</v-btn>
                <v-btn color="error">Error</v-btn>
                <v-btn color="warning">Warning</v-btn>
                <v-btn color="info">Info</v-btn>
            </v-row>
            <v-row>
                <v-form v-model="valid">
                    <v-text-field
                            v-model="name"
                            :rules="nameRules"
                            :counter="10"
                            label="Name"
                            required
                    ></v-text-field>
                    <v-text-field
                            v-model="email"
                            :rules="emailRules"
                            label="E-mail"
                            required
                    ></v-text-field>
                    <v-flex xs12 sm6 d-flex>
                        <v-select
                                :items="items"
                                label="Standard"
                        ></v-select>
                    </v-flex>
                    <v-btn color="info" >Info</v-btn>
                </v-form>
            </v-row>
            <v-row>
                <v-data-table
                        :headers="headers"
                        :items="desserts"
                        hide-actions
                        class="elevation-1"
                >
                    <template slot="items" slot-scope="props">
                        <td>{{ props.item.name }}</td>
                        <td class="text-xs-right">{{ props.item.calories }}</td>
                        <td class="text-xs-right">{{ props.item.fat }}</td>
                        <td class="text-xs-right">{{ props.item.carbs }}</td>
                        <td class="text-xs-right">{{ props.item.protein }}</td>
                        <td class="text-xs-right">{{ props.item.iron }}</td>
                    </template>
                </v-data-table>
            </v-row>
            <v-row>
                <v-dialog
                        v-model="dialog"
                        width="500"
                >
                    <v-btn
                            slot="activator"
                            primary
                    >
                        Click Me
                    </v-btn>

                    <v-card>
                        <v-card-title
                                class="headline"
                                primary-title
                        >
                            Privacy Policy
                        </v-card-title>

                        <v-card-text>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </v-card-text>

                        <v-divider></v-divider>

                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn
                                    color="primary"
                                    flat
                                    @click="dialog = false"
                            >
                                I accept
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </v-row>
            <v-row>
                <v-alert
                        v-model="success"
                        type="success"
                        dismissible
                >
                    This is a success alert.
                </v-alert>

                <v-alert
                        :value="true"
                        type="info"
                >
                    This is a info alert.
                </v-alert>

                <v-alert
                        :value="true"
                        type="warning"
                >
                    This is a warning alert.
                </v-alert>

                <v-alert
                        :value="true"
                        type="error"
                >
                    This is a error alert.
                </v-alert>
            </v-row>
        </div>
        <v-tabs
                v-model="active"
                color="tabs"
                slider-color="accent"
        >
            <v-tab
                    v-for="n in 3"
                    :key="n"
                    ripple
            >
                Item {{ n }}

            </v-tab>
            <v-tab-item
                    v-for="n in 3"
                    :key="n"
            >
                <v-card flat>
                    <v-card-text>DUPA {{n}}</v-card-text>
                </v-card>
            </v-tab-item>
        </v-tabs>
    </div>
</template>
<script>
    export default {

    }
</script>