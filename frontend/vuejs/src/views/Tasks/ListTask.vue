<template>
    <div class="main-content">
        <div class="content">
            <form class="form-inline d-flex justify-content-center md-form form-sm mt-0 col-4"
                  @submit.prevent="search()">
                <label>Tìm kiếm theo tên</label>
                <input class="form-control form-control-sm ml-3 w-75" type="text" v-model="searchkey"
                       placeholder="Search"
                       aria-label="Search">
                <button class="btn">Tìm kiếm</button>
            </form>
            <br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên task</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Đề bài</th>
                    <th scope="col">Danh sách nộp bài</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(task, index) in tasks">
                    <th scope="row">{{ ++index }}</th>
                    <td>{{ task.name }}</td>
                    <td>{{ task.description }}</td>
                    <td>{{ task.content }}</td>
                    <td>
                        <a class="btn btn-primary user-task" v-bind:href="'/user-task/' + task.id">xem</a>
                    </td>
                    <td>
                        <button class="btn btn-danger" @click="deleteTask(task.id)">delete</button>
                        <button class="btn btn-success">update</button>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="pagination">
                <button class="btn" @click="fetchPagnate(pagination.prev_page_url)"
                        :disabled="!pagination.prev_page_url">
                    <<
                </button>
                <button class="btn" disabled>{{ pagination.current_page }}</button>
                <button class="btn" @click="fetchPagnate(pagination.next_page_url)"
                        :disabled="!pagination.next_page_url">
                    >>
                </button>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    name: "Tasks",
    data() {
        return {
            // Note 'isActive' is left out and will not appear in the rendered table
            tasks: [],
            pagination: [],
            url: '/api/auth/list-task',
            searchkey: '',
        }
    },
    created() {
        this.getData();
    },
    methods: {
        getData() {
            axios.get(this.url).then((res) => {
                if (res.status == 200) {
                    this.tasks = res.data.data;
                    this.makePaginate(res.data);
                }
            }).catch((e) => {

            });
        },
        makePaginate(data) {
            let pagination = {
                current_page: data.current_page,
                last_page: data.last_page,
                next_page_url: data.next_page_url,
                prev_page_url: data.prev_page_url,
            };
            this.pagination = pagination;
        },
        fetchPagnate(url) {
            this.url = url;
            this.getData();
        },
        open(action) {
            this.$notify({
                group: 'foo',
                title: action,
                position: 'center top',
            });
        },
        deleteTask(id) {
            if (!confirm("Xóa?")) {
                return;
            }
            axios.get('/api/auth/delete-task/' + id).then((res) => {
                if (res.status == 200) {
                    this.getData();
                    this.open('Xoá thành công');
                }
            }).catch((e) => {

            });
        },
        search() {
            if (this.searchkey.trim() != '') {
                axios.get('/api/auth/search/'+ this.searchkey.trim()).then((res) => {
                    if (res.status == 200) {
                        if (res.data != '') {
                            this.tasks = res.data.data;
                            this.makePaginate(res.data);
                        } else {
                            this.tasks = this.getData();
                        }
                    }
                }).catch((e) => {

                });
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
