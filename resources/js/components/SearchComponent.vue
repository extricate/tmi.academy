<template>
    <ais-index
            app-id="AFZR039UTL"
            api-key="252d5ed3aa0834a4b02321727ccdb4a3"
            index-name="students"
            v-bind:auto-search=false
    >
        <form class="form-group">
            <ais-search-box placeholder="Leerling zoeken">
                <div class="input-group input-group-lg">
                    <ais-input
                            placeholder="Leerling zoeken"
                            :classNames="{
                            'ais-input': 'form-control search-form'
                        }"
                    />
                    <span class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fal fa-search"></i>
                        </button>
                    </span>
                </div>
            </ais-search-box>
        </form>
        <div class="search-results">
            <ais-results inline-template :results-per-page="4">
                <div class="row card-columns">
                    <div class="col-md-6" v-for="result in results" :key="result.objectID">
                        <div class="card mt-3">
                            <div class="card-body">
                                <a v-bind:href="'/studenten/'+ result.id">
                                    <h1 class="card-title" :title="result.name">
                                        <ais-highlight :result="result" attribute-name="name"></ais-highlight>
                                    </h1>
                                </a>
                                <p class="card-text card-truncated" v-html="result.description"></p>
                                <p class="text-center">
                                    <a v-bind:href="'/studenten/'+ result.id" class="btn btn-primary">
                                        Bekijk <i class="fal fa-arrow-right"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </ais-results>
            <ais-no-results>
                <template slot-scope="props">
                    <div class="row">
                        <div class="col text-center" v-if="props.query !== ''">
                            <div class="alert alert-warning" role="alert">
                                No results were found for <strong>"<i>{{ props.query }}</i>"</strong>.
                            </div>
                        </div>
                    </div>
                </template>
            </ais-no-results>
        </div>
        <div class="text-center">
            <ais-pagination class="pagination" :classNames="{
                                        'ais-pagination': 'pagination',
                                        'ais-pagination__item': 'page-item',
                                        'ais-pagination__link': 'page-link',
                                        'ais-pagination__item--active': 'active',
                                        'ais-pagination__item--disabled': 'disabled'
                                    }" v-on:page-change="onPageChange"/>
        </div>
    </ais-index>
</template>

<script>
    export default {
        props: ['appId', 'apiKey', 'index', 'query'],
        methods: {
            /*searchFunction: function (helper) {
                let searchResults = $('.search-results');
                if (this.searchStore.query === '') {
                    searchResults.hide();
                    return;
                }
                helper.search();
                searchResults.show();
            },*/
            onPageChange() {
                window.scrollTo(0, 0);
            },
        },
        /*mounted: function () {
            this.searchFunction();
        }*/
    }
</script>

<style>
    .ais-highlight > em {
        font-weight: bold;
    }
</style>