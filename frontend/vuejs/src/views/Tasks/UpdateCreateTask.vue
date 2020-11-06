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
            <h3 v-if="is_update">Cập nhật task</h3>
            <h3 v-else>Thêm mới task</h3>
            <form action="" @submit.prevent="onUpdateCreateTask()">
                <div class="form-group">
                    <label for="">Tên task</label>
                    <input type="text" v-model="task.name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <input type="text" v-model="task.content" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Đề bài</label>
                    <textarea type="text" rows="10" v-model="task.description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Hạn</label>
                    <input type="date" v-model="task.deadline" class="form-control">
                </div>
                <div class="form-group">
                    <input type="checkbox" v-model="task.is_active">
                    <p v-if="task.is_active">Hiện</p>
                    <p v-else>Ẩn</p>
                </div>
                <button class="btn btn-primary" v-if="is_update">Cập nhật</button>
                <button class="btn btn-primary" v-else>Thêm mới</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "UpdateTask",
    data() {
        return {
            task: {
                name: "",
                content: "",
                description: "",
                deadline: "",
                is_active: true,
                subject_id: Math.floor(Math.random() * 10),
            },
            is_update: 0,
        }
    },
    props: [
        'id'
    ],
    created() {
        if (this.id) {
            this.getTask();
            this.is_update = 1;
        }
    },
    methods: {
        getTask() {
            this.$store.dispatch("task/getTaskById", this.id)
                .then(response => {
                    this.task = response;
                })
        },
        open(action) {
            this.$notify({
                group: 'foo',
                title: action,
                position: 'center top',
            });
        },
        onUpdateCreateTask() {
            if (this.id) {
                this.$store.dispatch("task/update", this.task)
                    .then(response => {
                        this.$router.push('/list-task');
                        this.open(response.data);
                    })
            }else{
                this.$store.dispatch('task/create', this.task)
                    .then(response => {
                        this.open(response.data);
                        this.$router.push('/list-task');
                    })
            }
        },
    }

}
</script>

<style scoped>
.main-content {
    padding:50px
}
.content {
    width: 1000px;
    margin: auto;
}

.content h3 {
    text-align: center;
}

.content button {
    margin: auto;
    display: block;
}
</style>
