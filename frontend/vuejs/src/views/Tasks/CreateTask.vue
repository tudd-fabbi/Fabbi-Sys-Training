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
            <h3>Create task</h3>
            <form action="" @submit.prevent="onCreateTask">
                <div class="form-group">
                    <label for="">Tên task</label>
                    <input type="text" v-model="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <input type="text" v-model="content" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Đề bài</label>
                    <textarea type="text" rows="10" v-model="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Hạn</label>
                    <input type="date" v-model="deadline" class="form-control">
                </div>
                <div class="form-group">
                    <input type="checkbox" v-model="is_active">
                    <p v-if="is_active">Hiện</p>
                    <p v-else>Ẩn</p>
                </div>
                <button class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "CreateTask",
    data() {
        return {
            name: "",
            content: "",
            description: "",
            deadline: "",
            is_active: true,
        }
    },
    methods: {
        onCreateTask() {
            let task = {
                name: this.name,
                content: this.content,
                description: this.description,
                deadline: this.deadline,
                is_active: this.is_active,
                subject_id: Math.floor(Math.random() * 10)  // Lấy id subject sau khi a c xong subject
            };
            this.$store.dispatch('task/create', task)
                .then(response => {
                    this.open(response.data);
                    this.$router.push('/list-task');
                })
        },
        open(action) {
            this.$notify({
                group: 'foo',
                title: action,
                position: 'center top',
            });
        },
    }
}
</script>

<style scoped>
.content {
    width: 1000px;
    margin: auto;
    padding: 50px;

}

.content h3 {
    text-align: center;
}

.content button {
    margin: auto;
    display: block;
}
</style>
