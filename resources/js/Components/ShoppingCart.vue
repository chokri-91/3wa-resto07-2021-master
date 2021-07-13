<template>
  <div>
    <!-- <router-link to="/order/cart"> -->
      <i class="fas fa-shopping-cart" size="2x"></i>
      <span class="badge badge-pill badge-danger">{{ cartLength }}</span>
    <!-- </router-link> -->
  </div>
</template>

<script>
export default {
    name: 'ShoppingCart',
    props: [
        'cartLength'
    ]
}
</script>

<style scoped>
</style>