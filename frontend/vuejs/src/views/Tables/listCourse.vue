<template>
    <div class="card shadow"
         :class="type === 'dark' ? 'bg-default': ''">
        <div class="card-header border-0"
             :class="type === 'dark' ? 'bg-transparent': ''">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0" :class="type === 'dark' ? 'text-white': ''">
                        List Course
                    </h3>
                </div>
                <div class="col text-right">
                    <base-button type="primary" size="sm">See all</base-button>
                </div>
            </div>
        </div>
        <div>
            <b-row>
                <b-col>
                    <b-button class="my-1"  size="sm" variant="primary">
                        Add Course
                    </b-button>
                </b-col>
                <b-col lg="5" class="my-1" style="float: right">
                    <b-form-group
                        label="Filter"
                        label-cols-sm="3"
                        label-align-sm="right"
                        label-size="sm"
                        label-for="filterInput"
                        class="mb-2"
                    >
                        <b-input-group size="sm">
                            <b-form-input
                                v-model="filter"
                                type="search"
                                id="filterInput"
                                placeholder="Search by name"
                            ></b-form-input>
                            <b-input-group-append>
                                <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form-group>
                </b-col>
            </b-row>
        </div>
        <div>
            <b-table striped hover :items="data" :fields="fields">

                    <template slot="actions" slot-scope="row">
                        <b-button class="btn btn-danger" @click="onDeleteTask(row.item.id)">delete</b-button>
                        <router-link class="btn btn-success" v-bind:to="'updateCourse/' + row.item.id">update
                        </router-link>
                        <router-link class="btn btn-primary" v-bind:to="'detailCourse/' + row.item.id">Detail
                        </router-link>
                    </template>

            </b-table>
        </div>

<!--                <div class="card-footer d-flex justify-content-end"-->
<!--                     :class="type === 'dark' ? 'bg-transparent': ''">-->
<!--                    <base-pagination total="30"></base-pagination>-->
<!--                </div>-->

    </div>
</template>
<script>
export default {
    name: 'projects-table',
    data() {
        return {
            fields: ['name', 'description', 'is_active',  'actions'],
            data: null,
            type: '',
            filter: ''
        }
    },
    created() {
        this.getTask();
    },
    methods: {
        getTask() {
            this.$store.dispatch('course/getCourse')
                .then(res => {
                    this.data = res;
                })
        }
    },
    computed: {
        rows() {
            return this.tableData.length
        }
    }
}
</script>
<style>
</style>
