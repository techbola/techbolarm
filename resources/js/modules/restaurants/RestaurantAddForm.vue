<template>
    <div class="add_form__wrapper">
        <h3>Add new restaurant</h3>
        <div class="form-group">
            <label for="name">Name</label>
            <input
                    type="text"
                    class="form-control"
                    placeholder="Enter restaurant name"
                    v-model="restaurant.name">
            <div
                    class="validation-message"
                    v-text="validation.getMessage('name')">
            </div>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input
                    type="text"
                    class="form-control"
                    placeholder="Enter restaurant address"
                    v-model="restaurant.address">
            <div
                    class="validation-message"
                    v-text="validation.getMessage('address')">
            </div>
        </div>

        <div class="form-group">
            <label for="tables">Number of table</label>
            <input
                    type="number"
                    class="form-control"
                    placeholder="Enter restaurant tables"
                    v-model="restaurant.tables">
            <div
                    class="validation-message"
                    v-text="validation.getMessage('table_no')">
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" @click="handleAddButton">Add</button>
            <button class="btn btn-danger" @click="handleCancelButton">Cancel</button>
        </div>
    </div>
</template>

<script>

    import Multiselect from 'vue-multiselect';

    import Validation from './../../utils/validation';

    export default {
        name: "RestaurantAddForm",
        components: {
            Multiselect
        },
        data () {
            return {
                restaurant: this.emptyRestaurant(),
                validation: new Validation()
            }
        },
        methods: {

            emptyRestaurant () {

                return {
                    name: '',
                    address: '',
                    tables: 0,
                }

            },
            handleAddButton () {

                this.$emit('addRestaurantEvent', this.restaurant);

            },
            handleCancelButton () {

                this.restaurant = this.emptyRestaurant();

                this.$emit('modalCancel');

            }

        }
    }
</script>

<style scoped>

</style>