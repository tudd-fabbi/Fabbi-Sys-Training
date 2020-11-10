<template>
  <div>
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
              <span class="text-success mr-2"
                ><i class="fa fa-arrow-up"></i> 3.48%</span
              >
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
              <span class="text-success mr-2"
                ><i class="fa fa-arrow-up"></i> 12.18%</span
              >
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
              <span class="text-danger mr-2"
                ><i class="fa fa-arrow-down"></i> 5.72%</span
              >
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
              <span class="text-success mr-2"
                ><i class="fa fa-arrow-up"></i> 54.8%</span
              >
              <span class="text-nowrap">Since last month</span>
            </template>
          </stats-card>
        </div>
      </div>
    </base-header>

    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col">
          <div class="card shadow" :class="type === 'dark' ? 'bg-default' : ''">
            <div
              class="card-header border-0"
              :class="type === 'dark' ? 'bg-transparent' : ''"
            >
              <div class="row align-items-center">
                <div class="col">
                  <h3
                    v-if="is_id"
                    class="mb-0"
                    :class="type === 'dark' ? 'text-white' : ''"
                  >
                    Edit Subjects
                  </h3>
                  <h3
                    v-else
                    class="mb-0"
                    :class="type === 'dark' ? 'text-white' : ''"
                  >
                    Add Subjects
                  </h3>
                </div>
              </div>
            </div>

            <form>
              <div
                class="form-group"
                style="margin-left: 10%; margin-right: 10%"
              >
                <label for="exampleInputEmail1">Name Subject</label>
                <input
                  v-model="nameSubject"
                  id="name"
                  class="form-control"
                  aria-describedby="emailHelp"
                />
              </div>
              <div
                class="form-group"
                style="margin-left: 10%; margin-right: 10%"
              >
                <label for="exampleInputPassword1">Description</label>
                <textarea
                  v-model="description"
                  id="description"
                  class="form-control"
                  name=""
                  cols="50"
                  rows="10"
                ></textarea>
              </div>
              <label style="margin-left: 10%" for="exampleInputPassword1"
                >Tinh trang</label
              >
              <div style="margin-left: 10%" class="radio">
                <label v-if="is_active == '0'"
                  ><input
                    type="radio"
                    id="an"
                    name="optradio"
                    value=""
                    checked
                  />An</label
                >
                <label v-else
                  ><input
                    type="radio"
                    id="an"
                    name="optradio"
                    value=""
                  />An</label
                >
              </div>
              <div style="margin-left: 10%" class="radio">
                <label v-if="is_active == '1'"
                  ><input
                    type="radio"
                    id="hien"
                    name="optradio"
                    value=""
                    checked
                  />Hien</label
                >
                <label v-else
                  ><input
                    type="radio"
                    id="hien"
                    name="optradio"
                    value=""
                  />Hien</label
                >
              </div>
              <div
                class="form-group"
                style="margin-left: 10%; margin-right: 10%"
              >
                <label for="exampleInputPassword1">Courses</label>
                <multiselect
                  v-model="value"
                  :options="tableData"
                  :multiple="true"
                  :close-on-select="false"
                  :clear-on-select="false"
                  :preserve-search="true"
                  placeholder="Pick some"
                  label="name"
                  track-by="name"
                  :preselect-first="true"
                >
                </multiselect>
              </div>
              <button
                type="submit"
                style="float: right; margin-right: 10%"
                v-on:click="searchSubject()"
              >
                Submit
              </button>
                <router-link id="delete" style="float: right" class="btn btn-success" v-bind:to="'/listSubjects'" >Cancel</router-link>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Multiselect from "vue-multiselect";
import axios from "axios";

export default {
  components: {
    Multiselect,
  },
  data() {
    return {
      is_id: "",
      nameSubject: "",
      description: "",
      check: null,
      value: [],
      is_active: '',
      course_id: [],
      tableData: [],
      url: "/api/allcourses",
    };
  },
  props: ["id"],

  created() {
    this.getCourse();
    this.getId();
  },

  methods: {
    getCourse() {
      this.$store.dispatch("subject/getCourse").then((response) => {
        this.tableData = response.course;
      });
    },
    getId() {
      if (this.id) {
        this.is_id = true;
        this.$store
          .dispatch("subject/getSubjectById_Test", this.id)
          .then((response) => {
            this.nameSubject = response.name;
            this.description = response.description;
            this.is_active = response.is_active;
          });
      } else {
        this.is_id = false;
      }
    },
  },
};
</script>

     

<!-- New step!
     Add Multiselect CSS. Can be added as a static asset or inside a component. -->
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
