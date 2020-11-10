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
            <form class="form-inline d-flex justify-content-center md-form form-sm mt-0 col-4">
                <label>Tìm kiếm theo tên</label>
                <input class="form-control form-control-sm ml-3 w-75" type="text"
                       placeholder="Search"
                       aria-label="Search"
                >
                <button class="btn">Tìm kiếm</button>
            </form>
            <br>
            <div class="overflow-auto">
                <b-table
                    id="my-table"
                    :items="items"
                    :per-page="perPage"
                    :current-page="currentPage"
                    :fields="field"
                    small
                >
                    <template slot="is_active" slot-scope="row">
                        <p v-if="row.item.is_active == 1">Đang hiện</p>
                        <p v-else>Đang ẩn</p>
                    </template>
                    <template slot="user_task" slot-scope="row">
                        <router-link class="btn btn-primary custombtn" v-bind:to="'user-task/' + row.item.id">Xem
                        </router-link>
                    </template>
                    <template slot="actions" slot-scope="row">
                        <b-button class="btn btn-danger" @click="onDeleteTask(row.item.id)">delete</b-button>
                        <router-link class="btn btn-success" v-bind:to="'update-task/' + row.item.id">update
                        </router-link>
                        <router-link class="btn btn-primary" v-bind:to="'detail-task/' + row.item.id">Detail
                        </router-link>
                    </template>
                </b-table>
                <b-pagination
                    v-model="currentPage"
                    :total-rows="rows"
                    :per-page="perPage"
                    aria-controls="my-table"
                ></b-pagination>
            </div>
        </div>
    </div>
</template>
