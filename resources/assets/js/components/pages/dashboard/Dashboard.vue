<template>
  <div>
    <v-flex class="window">
      <div class="window-title">Dashboard</div>
      <v-flex class="cont-w">
        <v-flex xs6 class="dash-m">
          <v-card>
            <v-card-title class="dashboard-box" primary-title>
              <div class="dashboard-icon">
                <v-icon>pages</v-icon>
              </div>
              <div class="dashboard-div">
                <p class="dashboard-title">
                  Strony
                </p>
                <p class="dashboard-count">
                  0
                </p>
              </div>
            </v-card-title>
          </v-card>
        </v-flex>
        <v-flex xs6 class="dash-m">
          <v-card>
            <v-card-title class="dashboard-box" primary-title>
              <div class="dashboard-icon">
                <v-icon>burst_mode</v-icon>
              </div>
              <div class="dashboard-div">
                <p class="dashboard-title">
                  Galerie
                </p>
                <p class="dashboard-count">
                  0
                </p>
              </div>
            </v-card-title>
          </v-card>
        </v-flex>
        <v-flex xs6 class="dash-m">
          <v-card>
            <v-card-title class="dashboard-box" primary-title>
              <div class="dashboard-icon">
                <v-icon>file_copy</v-icon>
              </div>
              <div class="dashboard-div">
                <p class="dashboard-title">
                  Pliki
                </p>
                <p class="dashboard-count">
                  0
                </p>
              </div>
            </v-card-title>
          </v-card>
        </v-flex>
        <v-flex xs6 class="dash-m">
          <v-card>
            <v-card-title class="dashboard-box" primary-title>
              <div class="dashboard-icon">
                <v-icon>account_balance</v-icon>
              </div>
              <div class="dashboard-div">
                <p class="dashboard-title">
                  Oferty
                </p>
                <p class="dashboard-count">
                  0
                </p>
              </div>
            </v-card-title>
          </v-card>
        </v-flex>

      </v-flex>

    </v-flex>
  </div>
</template>
<script>
export default {
  data () {
    return {
      items: [
        {
          text: 'Dashboard',
          disabled: false
        },
        {
          text: 'Link 1',
          disabled: false
        },
        {
          text: 'Link 2',
          disabled: true
        }
      ]
    }
  }
}
</script>