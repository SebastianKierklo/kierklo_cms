<template>
  <div>

    <div class="window">
      <div class="window-title">Dashboard</div>
      
    </div>
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