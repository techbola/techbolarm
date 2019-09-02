<template>
    <div class="add_form__wrapper">
        <form v-on:submit.prevent="handleSubmit">
            <div class="form-group">
                <label for="name">Food item</label>
                <input
                        type="text"
                        class="form-control"
                        placeholder="Enter food item name"
                        v-model="food.item">
            </div>

            <div class="form-group">
                <label for="category">Select category</label>
                <multiselect
                        v-model="food.category"
                        :options="categories">

                </multiselect>
            </div>

            <div class="form-group">
                <label for="price">Food item</label>
                <input
                        type="number"
                        class="form-control"
                        placeholder="Enter food item price"
                        v-model="food.price">
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</template>

<script>

    import Multiselect from 'vue-multiselect';

    export default {
        name: "MenuAddForm",
        props: [
            'categories'
        ],
        components: {
            Multiselect
        },
        data () {
            return {
                food: {
                    item: '',
                    price: 100,
                    category: ''
                },
            }
        },
        methods: {

            handleSubmit () {

            }

        }
    }
</script>

<style scoped>

</style>