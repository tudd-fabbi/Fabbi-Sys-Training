<template>
  <div class="main-content">
    <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8">
    </base-header>
    <div class="content">
      <h3>{{ id ? $t("task_screen.label.update_title") : $t("task_screen.label.create_title") }}</h3>
      <form action="" @submit.prevent="onUpdateCreateTask()">
        <div class="form-group">
          <label>{{ $t("task_screen.label.task_name") }}</label>
          <input type="text" v-model="task.name" class="form-control">
        </div>
        <div class="form-group">
          <label>{{ $t("task_screen.label.task_content") }}</label>
          <input type="text" v-model="task.content" class="form-control">
        </div>
        <div class="form-group">
          <label>{{ $t("task_screen.label.task_description") }}</label>
          <textarea type="text" rows="10" v-model="task.description" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label class="typo__label">{{ $t("task_screen.label.pick_subject") }}</label>
          <multiselect
            v-model="multi.value"
            v-bind:placeholder="$t('task_screen.label.subject_placeholder')"
            label="name"
            track-by="id"
            :options="multi.subjects"
            :multiple="true"
            :taggable="true"
          >
          </multiselect>
        </div>
        <div class="form-group">
          <label>{{ $t("task_screen.label.task_deadline") }}</label>
          <input type="date" v-model="task.deadline" class="form-control">
        </div>
        <div class="form-group">
          <input type="checkbox" v-model="task.is_active">
          <p>{{ task.is_active == 1 ? $t("task_screen.label.task_active") : $t("task_screen.label.task_inactive") }}</p>
        </div>
        <button class="btn btn-primary">
          {{ id ? $t("task_screen.button.update_btn") : $t("task_screen.button.create_btn") }}
        </button>
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
      },
      multi: {
        value: [],
        subjects: []
      }
    }
  },
  props: [
    'id'
  ],
  created() {
    this.getAllSubject();
    if (this.id) {
      this.getTask();
      this.getSubjectOfTask();
    }
  },
  methods: {
    async getSubjectOfTask() {
      await this.$store.dispatch("task/getSubjectOfTask", this.id)
        .then(response => {
          response.forEach(subject => {
            this.multi.value.push(subject)
          })
        })
    },
    async getTask() {
      await this.$store.dispatch("task/getTaskById", this.id)
        .then(response => {
          this.task = response;
        })
    },
    async getAllSubject() {
      await this.$store.dispatch('subject/getAllSubject')
        .then(res => {
          this.multi.subjects = res
        })
    },
    makeToast(message, variant) {
      this.$bvToast.toast(message, {
        variant: variant,
        solid: true
      })
    },
    async onUpdateCreateTask() {
      let subject_id = [];
      this.multi.value.forEach(subject => {
        subject_id.push(subject.id);
      })
      if (this.id) {
        await this.$store.dispatch("task/update", {task: this.task, subject_id: subject_id})
          .then(() => {
            this.$router.push({ name: 'task.list'});
            this.makeToast(this.$i18n.t("task_screen.message.task_msgUpdate"), 'success');
          })
      } else {
        await this.$store.dispatch('task/store', {task: this.task, subject: subject_id})
          .then(() => {
            this.$router.push({ name: 'task.list'});
            this.makeToast(this.$i18n.t("task_screen.message.task_msgCreate"), 'success');
          })
      }
    }
  }

}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>
.main-content {
  padding: 50px
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
