<template>
    <div class="wrapper menu__container">
        <div class="row">
            <div class="col-md-8">
                <card-component>
                    <template slot="title">My Menu Items</template>
                    <template slot="body">
                        <div class="section">
                            <multiselect v-model="menuCategory" :options="categories"></multiselect>
                        </div>

                        <menu-group :items="currentMenuItems"></menu-group>

                    </template>
                </card-component>
            </div>
            <div class="col-md-4">
                <card-component>
                    <template slot="title">Add Menu Items</template>
                    <template slot="body">
                        <menu-add-form
                                :categories="categories"
                                :restaurant-id="restaurantId"
                                v-on:newMenuItemAdded="handleNewMenuItem"
                        >
                        </menu-add-form>
                    </template>
                </card-component>
            </div>
        </div>
    </div>
</template>

<script>

    import _ from 'lodash';

    import Multiselect from 'vue-multiselect';

    import MenuGroup from './MenuGroups';

    import MenuAddForm from './MenuAddForm';

    export default {
        name: "MenuContainer",
        components: {
            Multiselect, MenuGroup, MenuAddForm
        },
        props: [
            'items',
            'restaurantId'
        ],
        data () {
            return {
                menuCategory: '',
                categories: [],
                localItems: ''
            }
        },
        created () {

            _.forEach(this.items, (item, key) => {

                this.categories.push(key);

            });

            this.menuCategory = this.categories[0];
            this.localItems = this.items;

        },
        computed: {

            currentMenuItems () {

                return this.localItems[this.menuCategory]

            }

        },
        methods: {

            handleNewMenuItem (item, category) {

                // console.log('item', item);

                this.localItems[category].unshift(item);

            }

        }

    }
</script>

<style scoped>

</style>