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

    export default {
        name: "RestaurantGroup",
        props: ['restaurants'],
        components: {
            RestaurantAddForm
        },
        created () {
            console.log('restaurant length', this.restaurants.length);
        },
        computed: {

            showAddForm () {
                return (this.restaurants.length < 5) ? true : false;
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

                console.log('restaurant', restaurant);

            }

        }
    }
</script>

<style scoped>

</style>