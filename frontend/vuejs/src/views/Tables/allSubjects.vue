<template>
  <div class="card shadow"
       :class="type === 'dark' ? 'bg-default': ''">
    <div class="card-header border-0"
         :class="type === 'dark' ? 'bg-transparent': ''">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0" :class="type === 'dark' ? 'text-white': ''">
            List Subjects
          </h3>
          <!-- <router-link id="show" class="btn btn-success" v-bind:to="'/addSubjects/'" >ADD</router-link> -->
        </div>
        
        
        <div class="col text-right"  >
            <input  placeholder="Name Subject" v-model="paginate.name" name='key' id = "nameSubject">
          <base-button type="primary" size="sm" v-on:click="searchSubject()">Search</base-button>
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
    <tr v-for = "sub in tableData" v-bind:key="sub.id" >
      <td>{{sub.name}}</td>
      <td>{{sub.description}}</td>
      <td>{{sub.time}}</td>
      <td v-if="sub.is_active == 0">An</td>
      <td v-else> Hien</td>
      <button id="delete" type="button" class="btn btn-primary" v-on:click="deleteSubject(sub.id)">DELETE</button>
      <router-link id="show" class="btn btn-success" v-bind:to="'/detailSubjects/' + sub.id" >SHOW</router-link>
      <router-link class="btn btn-success" v-bind:to="'/editSubjects/' + sub.id" >UPDATE</router-link>
    </tr>
  </tbody>
</table>
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


    <!-- <base-pagination style="float: right;" total="50"></base-pagination> -->
   
   

  </div>
</template>
<script>

//import axios from 'axios'
  export default {
  
    name: 'projects-table',
    props: {
      type: {
        type: String
      },
      title: String
    },
    data() {
      return {
         paginate: {
                page: 1,
                perPage: 5,
                total: 3,
                name: ''
            },
        tableData:[
          {name: 'PHP cơ bản', description: 'Hướng dẫn bạn học PHP cơ bản nhất', time: '30', is_active: '1'},
          {name: 'PHP nâng cao', description: 'Hướng dẫn bạn học các kiến thức PHP nâng cao', time: '30', is_active: '0'},
          {name: 'Vuejs cơ bản', description: 'Hướng dẫn bạn học Vuejs cơ bản nhất', time: '30', is_active: '1'},
          {name: 'Vuejs nâng cao', description: 'Hướng dẫn bạn học các kiến thức vuejs nâng cao', time: '30', is_active: '0'},
          {name: 'OOP' , description: 'Hướng dẫn bạn học các kiến thức vế OOP', time: '20', is_active: '1'},
          {name: 'ReactNative cơ bản', description: 'Hướng dẫn bạn học ReactNative cơ bản nhất', time: '40', is_active: '1'},
          {name: 'ReactJs cơ bản ', description: 'Hướng dẫn bạn học ReactJs cơ bản nhất', time: '30', is_active: '1'},
          {name: 'Laravel cơ bản', description: 'Hướng dẫn bạn học Laravel cơ bản nhất', time: '30', is_active: '1'},
          {name: 'SQL cơ bản', description: 'Hướng dẫn bạn học SQL cơ bản nhất', time: '30', is_active: '0'},
          {name: 'Javascript cơ bản', description: 'Hướng dẫn bạn học Javascript cơ bản nhất', time: '30', is_active: '0'},
          {name: 'Java cơ bản', description: 'Hướng dẫn bạn học Java cơ bản nhất', time: '30', is_active: '1'},

        ], 
           
      }
    },
   
    // created(){
    //     this.getData();
       
    // },
    // methods: {
    //   changePage(page) {
    //         this.paginate.page = page;
    //         this.getData();
    //     },
    //     getData(){
    //         this.$store.dispatch('subject/getData',{params: this.paginate})
    //         .then(response => {
    //        this.tableData = response.data;
    //        //this.paginate.page = response.page;
    //        this.paginate.perPage = response.per_page;
    //        this.paginate.total = response.total;
           
    //    })
    //     },

    //     deleteSubject(id){
    //         if( confirm('Ban co muon xoa Mon hoc nay khong?')){
    //           this.$store.dispatch('subject/deleteData',id)
    //             //axios.delete('/api/deleteSubject/'+id)
    //             .then(
    //             ()=>{this.getData()}
    //         )
    //         } 
    //     },
    //     searchSubject(){
    //        this.getData();
    //     },



       
   // }

  }
</script>
<style>
    #delete{
        background-color: red;
    }
    #show{
        background-color: blue;
        color: white;
    }
    #update{
        background-color: green;
    }
    #currentPage{
        text-align: center;
        margin: 2%;
    }
    #prevPage{
        margin: 1%;
    }
    #nextPage{
        margin: 1%;
    }
</style>
