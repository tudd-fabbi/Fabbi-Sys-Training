<template>
    <div class="main-content">
        <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8"></base-header>
        <div class="content">
            <h3>Chi tiết bài tập</h3>
            <div class="form-group">
                <label for="">Tên task: </label> {{ task.name }}
            </div>
            <div class="form-group">
                <label for="">Mô tả: </label> {{ task.description }}
            </div>
            <div class="form-group">
                <label for="">Đề bài: </label><textarea class="form-control" rows="10">{{ task.content }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Hạn: </label> {{ task.deadline }}
            </div>
            <div class="form-group">
                <label for="">Trạng thái: </label>
                <span v-if="task.is_active == 1">Đang iện</span>
                <span v-else>Đang ẩn</span>
            </div>
            <router-link class="btn btn-primary" to="/list-task"><i class="fas fa-undo-alt"> Quay về</i></router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "DetailTask",
    data() {
        return {
            task: [],
        }
    },
    props: [
        'id'
    ],
    created() {
        this.getTask();
    },
    methods: {
        getTask() {
            this.$store.dispatch("task/getTaskById", this.id)
                .then(response => {
                    this.task = response;
                })
        },
    }
}
</script>

<style scoped>
.content {
    width: 1000px;
    margin: 10px auto;
    padding: 50px;
    box-shadow: 0 0 4px #665252;
}
</style>
