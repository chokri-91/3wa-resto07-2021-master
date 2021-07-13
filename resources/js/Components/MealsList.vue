<template>
    <div>
        <h2>Meals List</h2>
        <div v-if="loading" class="d-flex justify-content-center">
        <img src="https://thumbs.gfycat.com/LoneDetailedFairybluebird-max-1mb.gif">
        </div>
        <div v-else>
            <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <div v-for="meal in meals" :key="meal.id" class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img v-if="meal.photo.includes('uploads')" :src="'/storage/'+meal.photo" class="bd-placeholder-img card-img-top" width="100%" height="225" role="img" aria-label="Placeholder: Thumbnail">
                <img v-else :src="meal.photo" class="bd-placeholder-img card-img-top" width="100%" height="225" role="img" aria-label="Placeholder: Thumbnail">
                <div class="card-body">
                    <h4 class="card-title">{{ meal.name }}</h4>
                    <p class="card-text">{{ meal.description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <router-link :to="'/order/meal/' + meal.id">
                          <button type="button" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-search-plus"></i> View
                          </button>
                        </router-link>
                          <button v-on:click="$emit('send-to-cart', meal.id)" type="button" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-cart-plus"></i> Add to cart
                          </button>
                      </div>
                      <p class="text-primary"><strong>{{ meal.sale_price }} $</strong></p>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'MealsList',
    data() {
        return {
            meals: Array
        }
    },
    mounted() {
        this.getMealsList();
    },
    methods: {
        getMealsList: function() {
            fetch('/api/meals')
            .then(res => res.json())
            .then(data => this.meals = data)
            .then(console.log(data))
            .catch(err => console.log(err))
        }
    }
}
</script>

<style>
    img{
        width: 70%;
    }
    td,th{
        text-align: center;
    }
    #image
    {
        width: 25%;
    }

</style>