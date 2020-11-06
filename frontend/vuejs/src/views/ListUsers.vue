<template>
    <div class="wrapper">
        <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                  <stats-card
                    title="Total traffic"
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
                  <stats-card
                    title="Total traffic"
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
                  <stats-card
                    title="Sales"
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
                  <stats-card
                    title="Performance"
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
        <div class="list-users">
          <header>
            <h1>{{ $t("listUsers.listUsers") }}</h1>
          </header>
          <div id="content">
            <div class="search">
              <form>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <button
                      @click="getListUsers"
                      type="button"
                      class="btn btn-success"
                    >
                    {{ $t("listUsers.search") }}
                    </button>
                    <input
                      v-model="input_data"
                      type="text"
                      placeholder="Enter user name"
                    />
                  </div>
                </div>
              </form>
            </div>

            <div>
              <table
                :current-page="currentPage"
                :per-page="perPage"
                id="my-table"
                width="80%"
                border="1px solid"
                foot-clone
              >
                <tr class="text-center">
                  <th>{{ $t("listUsers.no") }}</th>
                  <th>{{ $t("listUsers.name") }}</th>
                  <th>{{ $t("listUsers.phoneNumber") }}</th>
                  <th>{{ $t("listUsers.gmail") }}</th>
                  <th>{{ $t("listUsers.action") }}</th>
                </tr>
                <tr
                  v-for="(item, index) in list_user"
                  v-bind:key="index"
                  class="text-center"
                >
                  <td>{{ index + 1 }}</td>
                  <td>{{ item.name }}</td>
                  <td>{{ item.phone }}</td>
                  <td>{{ item.email }}</td>
                  <td>
                    <button type="button" class="btn btn-danger">
                      {{ $t("listUsers.delete") }}
                    </button>
                    <button type="button" class="btn btn-primary">
                      {{ $t("listUsers.show") }}
                      <router-link to="/users/detailUser"></router-link>
                    </button>
                    <button type="btuton" class="btn btn-success">
                      {{ $t("listUsers.update") }}
                    </button>
                  </td>
                </tr>
              </table>
              <!-- <b-pagination
                v-model="currentPage"
                aria-controls="my-table"
                class="mt-4"
                :total-rows="totalBorrow"
                :per-page="perPage"
                @change="change"
              >
              </b-pagination> -->
            </div>
          </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  name: "ListUsers",
  data() {
    return {
      input_data: "",
      currentPage: 1,
      perPage: 2
    };
  },
  computed: {
    ...mapGetters({
      list_user: "user/GET_LIST_USER_STATE",
      totalBorrow: "user/GET_TOTAL_BORROW_STATE",
    }),
  },
  methods: {
    async getListUsers() {
      await this.$store.dispatch("user/getListUser", {
        params: {
          search: this.input_data,
        },
      });
    },
    async change(page) {
      await this.$store.dispatch("user/getListUser", {
        params: {
          search: this.input_data,
          page: page,
        },
      });
    },
  },
  created() {
    this.getListUsers();
  },
};
</script>

<style>
.list-users {
    margin-left: 50px;
}

.text-center {
    text-align: center;
}

#content .search {
    margin-left: 900px;
}

#content table {
    margin-top: 30px;
}

#content button {
    margin-right: 30px;
}
</style>
