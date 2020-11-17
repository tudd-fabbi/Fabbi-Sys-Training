<template>
  <div class="main-content">
    <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8"></base-header>
    <div class="content">
      <h3 class="title">{{ $t("report_screen.label.title") }}</h3>
      <ul class="nav nav-pills switch-btn">
        <li class="nav-item" @click="switchTable(true)">
          <button :class="['btn nav-link ', { active: status }]">{{ $t("report_screen.label.done") }}</button>
        </li>
        <li class="nav-item" @click="switchTable(false)">
          <button :class="['btn nav-link', { active: !status }]">{{ $t("report_screen.label.todo") }}</button>
        </li>
      </ul>
      <div class="overflow-auto">
        <b-table
          id="my-table"
          :items="user_task"
          :fields="customFields"
          small
        >
          <template #cell(index)="row">
            {{ ++row.index }}
          </template>
          <template #cell(actions)="row" v-show="status">
            <button class="btn btn-primary">{{ $t("report_screen.label.pass") }}</button>
            <button class="btn btn-danger">{{ $t("report_screen.label.redo") }}</button>
          </template>
        </b-table>
        <b-pagination
          v-model="paginate.page"
          :total-rows="paginate.total"
          :per-page="paginate.perPage"
          aria-controls="my-table"
        ></b-pagination>
      </div>
    </div>
  </div>
</template>

<script>
import {DEFAULT_OPTION, DEFAULT_PERPAGE} from "../../definition/constants";

export default {
  name: "ListReport",
  data() {
    return {
      user_task: [],
      status: true,
      options: DEFAULT_OPTION,
      paginate: {
        page: 1,
        perPage: DEFAULT_PERPAGE,
        total: 0,
        name: '',
      },
      fields: [
        {key: 'index', label: this.$i18n.t("task_screen.label.task_index")},
        {key: 'user_name', label: this.$i18n.t("report_screen.label.username"), sortable: true, sortDirection: 'desc'},
        {key: 'report', label: this.$i18n.t("report_screen.label.report")},
        {key: 'comment', label: 'comment'},
        {key: 'actions', label: 'Actions', status: true}
      ],
      customFields: []
    }
  },
  props: [
    'id'
  ],
  created() {
    this.getUserTask();
  },
  methods: {
    async getUserTask() {
      await this.$store.dispatch('user_task/getUserTask')
        .then(res => {
          if (this.status) {
            this.customFields = this.fields.filter(field => !field.status)
            this.user_task = res.state.user_task.filter(item => {
              if (item.status === 1) {
                return item;
              }
            });
          } else {
            this.customFields = this.fields;
            this.user_task = res.state.user_task.filter(item => {
              if (item.status === 0) {
                return item;
              }
            })
          }
        })
    },
    switchTable(status) {
      this.status = status;
      this.getUserTask();
    }
  }
}
</script>

<style scoped>
.content {
  padding: 50px;
}

.custom-paginate {
  float: right;
  margin-right: 50px;
  width: 200px;
}

.title {
  text-align: center;
}

.switch-btn {
  margin: 10px;
}
</style>
