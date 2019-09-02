<template>
    <div class="restaurant_group__wrapper mb-5">
        <div class="row">
            <div class="col-md-4 mb-4" v-for="restaurant in restaurants" :key="restaurant.id">
                <card-component>
                    <template slot="title">{{ restaurant.name }}</template>
                    <template slot="body">{{ restaurant.location }}</template>
                </card-component>
            </div>
            <div class="col-md-4" v-if="showAddForm">
                <card-component>
                    <template slot="title">Add new restaurant</template>
                    <template slot="body">+</template>
                </card-component>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "RestaurantGroup",
        props: ['restaurants'],
        created () {
            console.log('restaurant length', this.restaurants.length);
        },
        computed: {

            showAddForm () {
                return (this.restaurants.length < 5) ? true : false;
            }

        }
    }
</script>

<style scoped>

</style>