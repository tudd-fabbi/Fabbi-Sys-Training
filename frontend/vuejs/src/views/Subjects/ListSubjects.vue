<template>
  <div>
    <div>
      <projects-table></projects-table>
    </div>

    <div class="card shadow" :class="type === 'dark' ? 'bg-default' : ''">
      <div
        class="card-header border-0"
        :class="type === 'dark' ? 'bg-transparent' : ''"
      >
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0" :class="type === 'dark' ? 'text-white' : ''">
              {{ $t("list_subjects.subject.list_subjects") }}
            </h3>
            <router-link
              id="add"
              class="btn btn-success"
              v-bind:to="'/addSubjects/'"
              >{{ $t("list_subjects.subject.add_new_subject") }}</router-link
            >
          </div>

          <div class="col text-right">
            <input
              :placeholder="$t('list_subjects.subject.name')"
              v-model="paginate.name"
              name="key"
              id="nameSubject"
            />
            <base-button type="primary" size="sm" v-on:click="searchSubject()"
              >{{ $t("list_subjects.subject.search") }}</base-button
            >
          </div>
        </div>
      </div>

      <div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">{{ $t("list_subjects.subject.name") }}</th>
              <th scope="col">{{ $t("list_subjects.subject.description") }}</th>
              <th scope="col">{{ $t("list_subjects.subject.time") }}</th>
              <th scope="col">{{ $t("list_subjects.subject.is_active") }}</th>
              <th scope="col">{{ $t("list_subjects.subject.action") }}</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="sub in tableData" v-bind:key="sub.id">
              <td>{{ sub.name }}</td>
              <td>{{ sub.description }}</td>
              <td>{{ sub.time }}</td>
              <td v-if="sub.is_active == 0">
                <base-button
                  icon="ni ni-check-bold"
                  style="background-color: white"
                ></base-button>
              </td>
              <td v-else>
                <base-button
                  icon="ni ni-fat-remove"
                  style="background-color: yellow"
                ></base-button>
              </td>
              <b-button
                id="delete"
                type="button"
                class="btn btn-primary"
                v-on:click="deleteSubject(sub.id)"
              >
                {{ $t("list_subjects.subject.delete") }}
              </b-button>
              <router-link
                id="show"
                class="btn btn-success"
                v-bind:to="'/detailSubjects/' + sub.id"
                >{{ $t("list_subjects.subject.show") }}</router-link
              >
              <router-link
                id="update"
                class="btn btn-success"
                v-bind:to="'/editSubjects/' + sub.id"
                >{{ $t("list_subjects.subject.update") }}</router-link
              >
            </tr>
          </tbody>
        </table>
        <b-table> </b-table>
        <div class="overflow-auto">
          <b-pagination
            v-model="paginate.page"
            :total-rows="paginate.total"
            :per-page="paginate.perPage"
            aria-controls="my-table"
            @change="changePage"
            style="float: right; margin-right: 10%"
          ></b-pagination>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { DEFAULT_PAGE, DEFAULT_PERPAGE } from "@/definition/constants";
import ProjectsTable from "@/components/HeaderCard";
export default {
  components: {
    ProjectsTable,
  },
  data() {
    return {
      paginate: {
        page: DEFAULT_PAGE,
        perPage: DEFAULT_PERPAGE,
        total: "",
        name: "",
      },

      tableData: null,
    };
  },
  created() {
    this.getData();
  },
  methods: {
    getData() {
      this.$store.dispatch("subject/getSubject").then((response) => {
        this.tableData = response.test;
      });
    },
  },
};
</script>
<style>
#delete {
  background-color: red;
  margin-top: 2%;
}
#show {
  background-color: blue;
  color: white;
  margin-top: 2%;
}
#add {
  background-color: blue;
}
#update {
  background-color: green;
  margin-top: 2%;
}
</style>