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
            <h3
              class="mb-0"
              v-if="id"
              :class="type === 'dark' ? 'text-white' : ''"
            >
              {{ $t("list_subjects.subject.editSubject") }}
            </h3>
            <h3
              class="mb-0"
              v-else
              :class="type === 'dark' ? 'text-white' : ''"
            >
              {{ $t("list_subjects.subject.addSubject") }}
            </h3>
          </div>
        </div>
      </div>

      <form>
        <div class="form-group" style="margin-left: 10%; margin-right: 10%">
          <label for="exampleInputEmail1">{{
            $t("list_subjects.subject.name")
          }}</label>
          <input
            v-model="Subject.name"
            id="name"
            class="form-control"
            aria-describedby="emailHelp"
          />
        </div>
        <div class="form-group" style="margin-left: 10%; margin-right: 10%">
          <label for="exampleInputPassword1">{{
            $t("list_subjects.subject.description")
          }}</label>
          <textarea
            v-model="Subject.description"
            id="description"
            class="form-control"
            name=""
            cols="50"
            rows="10"
          ></textarea>
        </div>
        <label style="margin-left: 10%" for="exampleInputPassword1">{{
          $t("list_subjects.subject.is_active")
        }}</label>
        <div style="margin-left: 10%" class="radio">
          <label
            ><input
              v-if="Subject.is_active == '0'"
              type="radio"
              id="an"
              name="optradio"
              value=""
              checked
            />
            <input
              v-else
              type="radio"
              id="an"
              name="optradio"
              value=""
              checked
            />{{ $t("list_subjects.subject.unActive") }}</label
          >
        </div>
        <div style="margin-left: 10%" class="radio">
          <label
            ><input
              v-if="Subject.is_active == '1'"
              type="radio"
              id="hien"
              name="optradio"
              value=""
              checked
            />
            <input v-else type="radio" id="hien" name="optradio" value="" />{{
              $t("list_subjects.subject.active")
            }}</label
          >
        </div>
        <div class="form-group" style="margin-left: 10%; margin-right: 10%">
          <label for="exampleInputPassword1">{{
            $t("list_subjects.subject.course")
          }}</label>
          <multiselect
            v-model="value"
            :options="courseData"
            :multiple="true"
            :close-on-select="false"
            :clear-on-select="false"
            :preserve-search="true"
            :placeholder="$t('list_subjects.subject.nameCourse')"
            label="name"
            track-by="name"
            :preselect-first="true"
          >
          </multiselect>
        </div>

        <button
          v-if="id"
          type="submit"
          class="btn btn-success"
          style="float: right; margin-right: 10%"
          v-on:click="Update()"
        >
          {{ $t("list_subjects.subject.update") }}
        </button>
        <button
          v-else
          type="submit"
          class="btn btn-success"
          style="float: right; margin-right: 10%"
          v-on:click="Add()"
        >
          {{ $t("list_subjects.subject.add") }}
        </button>
        <router-link
          style="float: right; background-color: red; margin-right: 2%"
          class="btn btn-success"
          v-bind:to="'/listSubjects/'"
          >{{ $t("list_subjects.subject.cancel") }}</router-link
        >
      </form>
    </div>
  </div>
</template>

<script>
import Multiselect from "vue-multiselect";
import ProjectsTable from "@/components/HeaderCard";

export default {
  components: {
    ProjectsTable,
    Multiselect,
  },
  data() {
    return {
      Subject: {
        name: "",
        description: "",
        is_active: "",
      },
      value: [],
      course_id: [],
      courseData: [],
    };
  },
  props: ["id"],
  created() {
    this.getData();
    if (this.id) {
      this.getSubject();
    }
  },

  methods: {
    getData() {
      this.$store.dispatch("subject/getSubject").then((res) => {
        this.courseData = res.Course;
      });
    },
    getSubject() {
      this.$store.dispatch("subject/getDataById", this.id).then((response) => {
        this.Subject = response;
      });
    },
  },
};
</script>

    <style src="vue-multiselect/dist/vue-multiselect.min.css"></style> 


