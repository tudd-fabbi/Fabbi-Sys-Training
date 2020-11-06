<template>
    <div class="main-content">
        <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <stats-card title="Total traffic"
                                type="gradient-red"
                                sub-title="350,897"
                                icon="ni ni-active-40"
                                class="mb-4 mb-xl-0"
                    >

                        <template slot="footer">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                            <span class="text-nowrap">Since last month</span>
                        </template>
                    </stats-card>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <stats-card title="Total traffic"
                                type="gradient-orange"
                                sub-title="2,356"
                                icon="ni ni-chart-pie-35"
                                class="mb-4 mb-xl-0"
                    >

                        <template slot="footer">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 12.18%</span>
                            <span class="text-nowrap">Since last month</span>
                        </template>
                    </stats-card>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <stats-card title="Sales"
                                type="gradient-green"
                                sub-title="924"
                                icon="ni ni-money-coins"
                                class="mb-4 mb-xl-0"
                    >

                        <template slot="footer">
                            <span class="text-danger mr-2"><i class="fa fa-arrow-down"></i> 5.72%</span>
                            <span class="text-nowrap">Since last month</span>
                        </template>
                    </stats-card>

                </div>
                <div class="col-xl-3 col-lg-6">
                    <stats-card title="Performance"
                                type="gradient-info"
                                sub-title="49,65%"
                                icon="ni ni-chart-bar-32"
                                class="mb-4 mb-xl-0"
                    >

                        <template slot="footer">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 54.8%</span>
                            <span class="text-nowrap">Since last month</span>
                        </template>
                    </stats-card>
                </div>
            </div>
        </base-header>
        <div class="content">
            <router-link to="/create-task" class="btn btn-primary">
                Thêm mới
            </router-link>
            <form class="form-inline d-flex justify-content-center md-form form-sm mt-0 col-4"
                  @submit.prevent="getData()">
                <label>Tìm kiếm theo tên</label>
                <input class="form-control form-control-sm ml-3 w-75" type="text" v-model="paginate.name"
                       placeholder="Search"
                       aria-label="Search">
                <button class="btn">Tìm kiếm</button>
            </form>
            <br>
            <b-table
                show-empty
                small
                stacked="md"
                :items="tasks"
                :fields="fields"
            >
                <template slot="actions" slot-scope="row">
                    <b-button class="btn btn-danger" @click="onDeleteTask(row.item.id)">delete</b-button>
                    <router-link class="btn btn-success" v-bind:to="'update-task/' + row.item.id">update</router-link>
                    <router-link class="btn btn-primary" v-bind:to="'detail-task/' + row.item.id">Detail</router-link>
                </template>
                <template slot="user_task" slot-scope="row">

                </template>
            </b-table>
            <div class="pagination">
                <b-pagination
                    v-model="paginate.page"
                    :total-rows="paginate.total"
                    :per-page="paginate.perPage"
                    aria-controls="my-table"
                    @change="changePage"
                ></b-pagination>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    name: "Tasks",
    data() {
        return {
            tasks: [],
            paginate: {
                page: 1,
                perPage: 5,
                total: 0,
                name: ''
            },
            fields: [
                {key: 'name', label: 'Tên task', sortable: true, sortDirection: 'desc'},
                {key: 'content', label: 'Nội dung', sortable: true, sortDirection: 'desc'},
                {key: 'description', label: 'Đề bài', sortable: true, sortDirection: 'desc'},
                {key: 'deadline', label: 'deadline', sortable: true, sortDirection: 'desc'},
                {key: 'user_task', label: 'Danh sách nộp bài', sortable: true, sortDirection: 'desc'},
                {key: 'actions', label: 'Actions'}
            ],
        }
    },
    created() {
        this.getData();
    },
    methods: {
        changePage(page) {
            this.paginate.page = page;
            this.getData();
        },
        getData() {
            this.$store.dispatch("task/getTasks", {params: this.paginate})
                .then(response => {
                    this.tasks = response.data;
                    this.paginate.perPage = response.per_page;
                    this.paginate.total = response.total;
                })
        },
        open(action) {
            this.$notify({
                group: 'foo',
                title: action,
                position: 'center top',
            });
        },
        onDeleteTask(id) {
            this.$store.dispatch("task/delete", id)
                .then(response => {
                    this.open(response);
                    this.getData();
                })
                .catch(() => {
                })
        },
    }
}
</script>

<style scoped>
.content {
    padding: 50px;
}
</style>
