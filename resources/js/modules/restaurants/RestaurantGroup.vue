<template>
    <div class="restaurant_group__wrapper mb-5">

        <div class="row">
            <div class="col-md-4 mb-4" v-for="restaurant in localRestaurants" :key="restaurant.id">
                <card-component>
                    <template slot="title">{{ restaurant.name }}</template>
                    <template slot="body">{{ restaurant.location }}</template>
                </card-component>
            </div>
            <div class="col-md-4" v-if="showAddForm">
                <card-component>
                    <template slot="title">Add new restaurant</template>
                    <template slot="body">
                        <span @click="handleAddNewRestaurant">+</span>
                    </template>
                </card-component>

                <modal name="add-new-restaurant" height="50%">
                    <div class="container-padding">
                        <restaurant-add-form
                                @modalCancel="handleCancelRestaurant"
                                @addRestaurantEvent="handleSaveRestaurant"></restaurant-add-form>
                    </div>
                </modal>

            </div>
        </div>

    </div>
</template>

<script>

    import RestaurantAddForm from './RestaurantAddForm';

    import axios from 'axios';

    export default {
        name: "RestaurantGroup",
        props: ['restaurants'],
        components: {
            RestaurantAddForm
        },
        data () {
            return {
                localRestaurants: []
            }
        },
        created () {
            this.localRestaurants = this.restaurants;
        },
        computed: {

            showAddForm () {
                return (this.localRestaurants.length < 6) ? true : false;
            }

        },
        methods: {

            handleAddNewRestaurant () {

                this.$modal.show('add-new-restaurant');

            },
            handleCancelRestaurant () {

                this.$modal.hide('add-new-restaurant');

            },
            handleSaveRestaurant (restaurant) {

                axios.post('/api/restaurant', restaurant)
                    .then(response => {

                        this.localRestaurants.unshift(response.data);

                        this.$modal.hide('add-new-restaurant');

                    })
                    .catch(error => {
                        console.log('error', error.response)
                    });

            }

        }
    }
</script>

<style scoped>

</style>