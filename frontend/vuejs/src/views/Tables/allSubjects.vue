<template>
  <div class="card shadow" :class="type === 'dark' ? 'bg-default' : ''">
    <div
      class="card-header border-0"
      :class="type === 'dark' ? 'bg-transparent' : ''"
    >
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0" :class="type === 'dark' ? 'text-white' : ''">
            List Subjects
          </h3>
          <!-- <router-link id="show" class="btn btn-success" v-bind:to="'/addSubjects/'" >ADD</router-link> -->
        </div>

        <div class="col text-right">
          <input
            placeholder="Name Subject"
            v-model="paginate.name"
            name="key"
            id="nameSubject"
          />
          <base-button type="primary" size="sm" v-on:click="searchSubject()"
            >Search</base-button
          >
        </div>
      </div>
    </div>

    <div>
      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Ten Mon Hoc</th>
            <th scope="col">Mo Ta</th>
            <th scope="col">Time</th>
            <th scope="col">Tinh Trang</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="sub in tableData" v-bind:key="sub.id">
            <td>{{ sub.name }}</td>
            <td>{{ sub.description }}</td>
            <td>{{ sub.time }}</td>
            <td v-if="sub.is_active == 0">An</td>
            <td v-else>Hien</td>
            <b-button
              id="delete"
              type="button"
              class="btn btn-primary"
              v-on:click="deleteSubject(sub.id)"
            >
              DELETE
            </b-button>
            <router-link
              id="show"
              class="btn btn-success"
              v-bind:to="'/detailSubjects/' + sub.id"
              >SHOW</router-link
            >
            <router-link
              class="btn btn-success"
              v-bind:to="'/editSubjects/' + sub.id"
              >UPDATE</router-link
            >
          </tr>
        </tbody>
      </table>
      <b-table>

      </b-table>
      <div class="overflow-auto">
        <b-pagination
          v-model="paginate.page"
          :total-rows="paginate.total"
          :per-page="paginate.perPage"
          aria-controls="my-table"
          @change="changePage"
        ></b-pagination>
      </div>
    </div>
  </div>
</template>
<script>

import { mapGetters } from "vuex"
export default {
  name: "projects-table",
  props: {
    type: {
      type: String,
    },
    title: String,
  },
  data() {
    return {
      paginate: {
        page: 1,
        perPage: 5,
        total: 3,
        name: "",
      },
       
      tableData:null      
    };
  },
created(){
        this.getData();
       
    },
    methods: {
        getData(){
           this.$store.dispatch('subject/getSubject').then(response => {
           this.tableData = response.test;
           })
           
          
        },
    }
  
};
</script>
<style>
#delete {
  background-color: red;
}
#show {
  background-color: blue;
  color: white;
}
#update {
  background-color: green;
}
#currentPage {
  text-align: center;
  margin: 2%;
}
#prevPage {
  margin: 1%;
}
#nextPage {
  margin: 1%;
}
</style>