<template>

    <div>
        
        <MealsList></MealsList>
    </div>
    
</template>

<script>
import MealsList from './../Components/MealsList.vue'
import ShoppingCart from './../Components/ShoppingCart.vue'

export default {
    name: 'OrderIndex',
    components: {MealsList,ShoppingCart}
}
</script>

<style>

</style>