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
                    <template slot="body">Form Will Come here</template>
                </card-component>
            </div>
        </div>
    </div>
</template>

<script>

    import _ from 'lodash';

    import Multiselect from 'vue-multiselect';

    import MenuGroup from './MenuGroups';

    export default {
        name: "MenuContainer",
        components: {
            Multiselect, MenuGroup
        },
        props: [
            'items'
        ],
        data () {
            return {
                menuCategory: '',
                categories: [],
            }
        },
        created () {

            _.forEach(this.items, (item, key) => {

                this.categories.push(key);

            });

            this.menuCategory = this.categories[0];

        },
        computed: {

            currentMenuItems () {

                return this.items[this.menuCategory]

            }

        }

    }
</script>

<style scoped>

</style>