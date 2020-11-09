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
                <label for="">Hạn</label> {{ task.deadline }}
            </div>
            <div class="form-group">
                <label for="">Trạng thái: </label>
                <span v-if="task.is_active == 1"> Hiện</span>
                <span v-else> Ẩn</span>
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
