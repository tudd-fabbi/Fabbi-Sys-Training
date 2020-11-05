<template>
    <div class="main-content">
        <div class="content">
            <form class="form-inline d-flex justify-content-center md-form form-sm mt-0 col-4"
                  @submit.prevent="search()">
                <label>Tìm kiếm theo tên</label>
                <input class="form-control form-control-sm ml-3 w-75" type="text" v-model="searchKey"
                       placeholder="Search"
                       aria-label="Search">
                <button class="btn">Tìm kiếm</button>
            </form>
            <br>
<!--            <table class="table table-striped">-->
<!--                <thead>-->
<!--                <tr>-->
<!--                    <th scope="col">STT</th>-->
<!--                    <th scope="col">Tên task</th>-->
<!--                    <th scope="col">Mô tả</th>-->
<!--                    <th scope="col">Đề bài</th>-->
<!--                    <th scope="col">Danh sách nộp bài</th>-->
<!--                    <th scope="col">Action</th>-->
<!--                </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
<!--                <tr v-for="(task, index) in tasks" :key="task.id">-->
<!--                    <th scope="row">{{ ++index }}</th>-->
<!--                    <td>{{ task.name }}</td>-->
<!--                    <td>{{ task.description }}</td>-->
<!--                    <td>{{ task.content }}</td>-->
<!--                    <td>-->
<!--                        <a class="btn btn-primary user-task">xem</a>-->
<!--                    </td>-->
<!--                    <td>-->
<!--                        <button class="btn btn-danger" @click="onDeleteTask(task.id)">delete</button>-->
<!--                        <button class="btn btn-success">update</button>-->
<!--                    </td>-->
<!--                </tr>-->
<!--                </tbody>-->
<!--            </table>-->
            <b-table
                id="my-table"
                :items="tasks"
                :per-page="paginate.perPage"
                :current-page="paginate.page"
                small
            ></b-table>
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
                total: 0
            },
            searchKey: '',
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
            this.$store.dispatch("task/getTasks", {params :this.paginate})
                .then(response => {
                    this.tasks = response.data;
                    console.log(this.tasks);
                    this.paginate.page = response.current_page;
                    this.paginate.total = response.total;
                    // console.log(this.paginate)
                    // this.makePaginate(response);
                })
        },
        // makePaginate(data) {
        //     let pagination = {
        //         current_page: data.current_page,
        //         last_page: data.last_page,
        //         next_page_url: data.next_page_url,
        //         prev_page_url: data.prev_page_url,
        //     };
        //     this.pagination = pagination;
        // },
        // fetchPagnate(url) {
        //     this.url = url;
        //     this.getData();
        // },
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
        search() {
            if (this.searchKey.trim() != '') {
                this.$store.dispatch("task/search", this.searchKey.trim())
                    .then(response => {
                        this.tasks = response.data;
                    })
            }
        }
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
