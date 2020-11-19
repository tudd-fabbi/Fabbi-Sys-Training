<template>
  <div class="add_users">
    <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8">
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
        <h1>{{ $t("list_users.title.list_user") }}</h1>
      </header>
      <div id="content">
        <div class="search">
          <form action="">
            <div class="form-row">
              <div class="form-group col-md-6">
                <button
                type="button"
                class="btn btn-success"
                >
                {{ $t("list_users.label.search") }}
                </button>
                <input
                  type="text"
                  placeholder="Enter username"
                >
              </div>
            </div>
          </form>
        </div>
        <div>
          <table id="my-table" border="2px solid">
            <tr class="text-center">
              <th>{{ $t("list_users.label.no") }}</th>
              <th>{{ $t("list_users.label.name") }}</th>
              <th>{{ $t("list_users.label.phone_number") }}</th>
              <th>{{ $t("list_users.label.gmail") }}</th>
              <th>{{ $t("list_users.label.action") }}</th>
            </tr>
            <tr
              v-for="(item,index) in fakeData"
              :key="index"
              class="text-center"
            >
              <td>{{ index + 1 }}</td>
              <td>{{ item.name }}</td>
              <td>{{ item.phoneNumber }}</td>
              <td>{{ item.email }}</td>
              <td>
                <button type="button" class="btn btn-danger">
                  {{ $t("list_users.button.delete") }}
                </button>
                <router-link class="btn btn-primary" :to="{ name: 'users.detail'}">
                  {{ $t("list_users.button.show") }}
                </router-link>
                <button type="btuton" class="btn btn-success">
                  {{ $t("list_users.button.update") }}
                </button>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { mapGetters } from "vuex";

export default {
  data() {
    return {
      fakeData: null
    }
  },
  created() {
    this.getFakeData();
  },
  methods: {
    getFakeData() {
      this.$store.dispatch("user/GEN_FAKEDATA").then((response) => {
        this.fakeData = response.info;
      })
    }
  }
}
</script>
<style scoped>
.list-users {
  margin-left: 50px;
}

header {
  margin-left: 500px;
  margin-bottom: 50px;
}

.text-center {
  text-align: center;
}

#content .search {
  margin-left: 900px;
}

table {
  margin-top: 30px;
  width: 80%;
  border: 1px solid;
}

#content table td {
  text-align: center;
}

#content button {
  margin-right: 20px;
}
</style>
