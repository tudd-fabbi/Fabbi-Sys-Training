<template>
    <div class="main-content">
        <div class="content">
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
                :current-page="paginate.page"
                :per-page="paginate.perPage"
            >
                <template slot="actions" slot-scope="row">
                    <b-button class="btn btn-danger" @click="onDeleteTask(row.item.id)">delete</b-button>
                    <router-link class="btn btn-success" v-bind:to="'update-task/' + row.item.id" >update</router-link>
                </template>
            </b-table>


            <div class="pagination">
                <b-pagination
                    v-model="paginate.page"
                    :total-rows="paginate.total"
                    :per-page="paginate.perPage"
                    aria-controls="my-table"
                    @input="getData"
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
    computed: {
        rows() {
            return this.tasks.length
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
                    this.paginate.page = response.current_page;
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
    padding-top: 250px;
    margin-bottom: 300px;
}

.user-task {
    margin-left: 50px;
}
</style>
