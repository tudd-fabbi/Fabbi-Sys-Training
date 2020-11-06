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
        </div>
        
        <div class="col text-right"  >
            <input  placeholder="Name Subject" v-model="name" name='key' id = "nameSubject">
          <base-button type="primary" size="sm" v-on:click="searchSubject()">Search</base-button>
        </div>
      </div>
    </div>

    <!-- <div class="table-responsive">
      <base-table class="table align-items-center table-flush"
                  :class="type === 'dark' ? 'table-dark': ''"
                  :thead-classes="type === 'dark' ? 'thead-dark': 'thead-light'"
                  tbody-classes="list"
                  :data="tableData">
        <template slot="columns">
          <th>Name Subject</th>
          <th>Description</th>
          <th>Time</th>
          <th>Active</th>
          <th>Action</th>
          <th></th>
        </template>

            <tr v-for = "item in tableData" v-bind:key="item.id">
                <td>{{iteam.name}}</td>
                <td>{{iteam.decription}}</td>
                <th>{{iteam.name}}</th>
                <th>{{iteam.name}}</th>
                <th>{{iteam.name}}</th>
         
            </tr> -->
       
        <!-- <template slot-scope="{row}">
          <th scope="row">
            <div class="media align-items-center">
              <a href="#" class="avatar rounded-circle mr-3">
                <img alt="Image placeholder" :src="row.img">
              </a>
              <div class="media-body">
                <span class="name mb-0 text-sm">{{row.name}}</span>
              </div>
            </div>
          </th>
          <td class="budget">
            {{row.description}}
          </td>
          <td class="budget">
            {{row.time}}
          </td>
            <td>
            <badge class="badge-dot mr-4" >
              <i :class="`bg-${row.statusType}`"></i>
              <span class="status">{{row.isactive}}</span>
            </badge>
          </td>
          <td>
            <badge class="badge-dot mr-4" :type="row.statusType">
              <button id="delete" type="button" class="btn btn-primary">DELETE</button>
              <button id="show" type="button" class="btn btn-primary">SHOW</button>
              <button id ="update" type="button" class="btn btn-primary">UPDATE</button>

            </badge>
          </td>

        </template> -->

      <!-- </base-table>
    </div> -->
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
    <tr v-for = "item in tableData" v-bind:key="item.id" >
      <td>{{item.name}}</td>
      <td>{{item.description}}</td>
      <td>30 ngay</td>
      <td v-if="item.is_active == 0">An</td>
      <td v-else> Hien</td>
      <button id="delete" type="button" class="btn btn-primary" v-on:click="deleteSubject(item.id)">DELETE</button>
      <router-link class="btn btn-success" v-bind:to="'/detailSubjects/' + item.id" >SHOW</router-link>
      <!-- <button id="update" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" >UPDATE</button> 
      -->
      <router-link class="btn btn-success" v-bind:to="'/editSubjects/' + item.id" >update</router-link>
    </tr>
  </tbody>
</table>
</div>


    <base-pagination style="float: right;" total="50"></base-pagination>
   

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
         
        tableData:null,
        
        pagination: null,
        name:'',
        
            
           
      }
    },
    created(){
        this.getData();
       // this.searchSubject();
    },
    methods: {
        getData(){
            this.$store.dispatch('subject/getData',{})
            //axios.get(this.url)
            .then(response => {
           this.tableData = response.data;
           
       })
        },
  
        makePagination(data){
            let pagination = {
                current_page: data.current_page,
                last_page: data.last_page,
                next_page_url: data.next_page_url,
                prev_page_url: data.prev_page_url,
            }
            this.pagination = pagination;
        },

        fecthPagination(url){
            this.url = url;
            this.getData();
        },
        deleteSubject(id){
            if( confirm('Ban co muon xoa Mon hoc nay khong?')){
              this.$store.dispatch('subject/deleteData',id)
                //axios.delete('/api/deleteSubject/'+id)
                .then(
                ()=>{this.getData()}
            )
            } 
        },
        searchSubject(){
           this.$store.dispatch('subject/getData',{params: {
             name: this.name
           }})
            //axios.get(this.url)
            .then(response => {
           this.tableData = response.data;
       })
            
        },



       
    }

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
