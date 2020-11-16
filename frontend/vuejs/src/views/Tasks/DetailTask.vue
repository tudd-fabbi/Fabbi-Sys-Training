<template>
  <div class="main-content">
    <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8"></base-header>
    <div class="content">
      <h3>{{ $t("task_screen.label.detail_task") }}</h3>
      <div class="form-group">
        <label>{{ $t("task_screen.label.task_name") }}:</label> {{ task.name }}
      </div>
      <div class="form-group">
        <label>{{ $t("task_screen.label.task_description") }}:</label> {{ task.description }}
      </div>
      <div class="form-group">
        <label>{{ $t("task_screen.label.task_content") }}:</label>
        <p class="task-content">
          {{ task.content }}
        </p>
      </div>
      <div class="form-group">
        <label>{{ $t("task_screen.label.task_deadline") }}:</label> {{ task.deadline }}
      </div>
      <div class="form-group">
        <label>{{ $t("task_screen.label.task_isActive") }}: </label>
        <span>
          {{ task.is_active == 1 ? $t("task_screen.label.task_active") : $t("task_screen.label.task_inactive") }}
        </span>
      </div>
      <router-link class="btn btn-primary" to="/tasks">
        <i class="fas fa-undo-alt"> </i>
        {{ $t("task_screen.label.back_home") }}
      </router-link>
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
    async getTask() {
      await this.$store.dispatch("task/getTaskById", this.id)
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

.task-content {
  padding: 10px;
}
</style>
