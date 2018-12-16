<template>
    <div>
        <multiselect
                v-model="selected"
                :options="options"
                placeholder="Kies een school"
                :show-labels="true"
                :close-on-select="true"
        >
        </multiselect>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    import axios from 'axios'

    export default {
        components: {Multiselect},
        data() {
            return {
                selected: null,
                value: null,
                options: [
                    {
                        name: 'Gerrit Rietveld College',
                        id: 2,
                    },
                    {
                        name: 'Globe College',
                        id: 1,
                    },
                    {
                        name: 'Orion College',
                        id: 3,
                    },
                ]
            }
        },
        mounted() {
            axios
                .get('/api/v1/schools')
                .then(response => console.log(response.data)
                    //this.options = response.data
                )
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>