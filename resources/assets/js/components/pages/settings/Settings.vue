<template>
    <div>
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
  data () {
    return {
        success:true,
      headers: [
        {
          text: 'Dessert (100g serving)',
          align: 'left',
          sortable: false,
          value: 'name'
        },
        { text: 'Calories', value: 'calories' },
        { text: 'Fat (g)', value: 'fat' },
        { text: 'Carbs (g)', value: 'carbs' },
        { text: 'Protein (g)', value: 'protein' },
        { text: 'Iron (%)', value: 'iron' }
      ],
      items: [
        'item1','item2','item3'
      ],
      desserts: [
        {
          value: false,
          name: 'Frozen Yogurt',
          calories: 159,
          fat: 6.0,
          carbs: 24,
          protein: 4.0,
          iron: '1%'
        },
        {
          value: false,
          name: 'Ice cream sandwich',
          calories: 237,
          fat: 9.0,
          carbs: 37,
          protein: 4.3,
          iron: '1%'
        },
        {
          value: false,
          name: 'Eclair',
          calories: 262,
          fat: 16.0,
          carbs: 23,
          protein: 6.0,
          iron: '7%'
        },
        {
          value: false,
          name: 'Cupcake',
          calories: 305,
          fat: 3.7,
          carbs: 67,
          protein: 4.3,
          iron: '8%'
        },
        {
          value: false,
          name: 'Gingerbread',
          calories: 356,
          fat: 16.0,
          carbs: 49,
          protein: 3.9,
          iron: '16%'
        },
        {
          value: false,
          name: 'Jelly bean',
          calories: 375,
          fat: 0.0,
          carbs: 94,
          protein: 0.0,
          iron: '0%'
        },
        {
          value: false,
          name: 'Lollipop',
          calories: 392,
          fat: 0.2,
          carbs: 98,
          protein: 0,
          iron: '2%'
        },
        {
          value: false,
          name: 'Honeycomb',
          calories: 408,
          fat: 3.2,
          carbs: 87,
          protein: 6.5,
          iron: '45%'
        },
        {
          value: false,
          name: 'Donut',
          calories: 452,
          fat: 25.0,
          carbs: 51,
          protein: 4.9,
          iron: '22%'
        },
        {
          value: false,
          name: 'KitKat',
          calories: 518,
          fat: 26.0,
          carbs: 65,
          protein: 7,
          iron: '6%'
        }
      ]
    }
  }
}
</script>