<template>
  <div class="card shadow"
       :class="type === 'dark' ? 'bg-default': ''">
    <div class="card-header border-0"
         :class="type === 'dark' ? 'bg-transparent': ''">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0" :class="type === 'dark' ? 'text-white': ''">
            Add Subjects
          </h3>
        </div>
        
        
      </div>
    </div>

    <form>
    <div class="form-group" style="margin-left: 10%; margin-right:10%">
      <label for="exampleInputEmail1">Name Subject</label>
      <input  v-model="nameSubject" id='name' class="form-control"  aria-describedby="emailHelp">
    </div>
    <div class="form-group" style="margin-left: 10%; margin-right:10%">
      <label for="exampleInputPassword1">Description</label>
      <textarea  v-model="description" id="description" class="form-control" name=""  cols="50" rows="10"></textarea>
    </div>
     <label style="margin-left: 10%; " for="exampleInputPassword1">Tinh trang</label>
    <div style="margin-left: 10%; " class="radio">
      
      <label><input type="radio" id='an' name="optradio" value="" checked>An</label>
    </div>
    <div style="margin-left: 10%; " class="radio">
      <label><input type="radio" id='hien' name="optradio" value="">Hien</label>
    </div>
    <div class="form-group" style="margin-left: 10%; margin-right:10%">
      <label for="exampleInputPassword1">Courses</label>
      <multiselect v-model="value" :options="tableData" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Pick some" label="name" track-by="name" :preselect-first="true">
    </multiselect>
    </div>
    
    <button type="submit"  style="float: right; margin-right:10%"  v-on:click="searchSubject()">Submit</button>
  
  </form>
</div>
</template>

<script>
 import Multiselect from 'vue-multiselect'
  import axios from 'axios'

export default {
  components: {
    Multiselect
  },
 data() {
      return {
        nameSubject: '',
        description: '',
        check:null,
        value: [],
        course_id: [],
        tableData:[],
        url:'/api/allcourses',
   
      }
    },
    created(){
        this.getData();
    },
   
    methods: {
        getData(){
           axios.get(this.url).then(response => {
           this.tableData = response.data;
       })
        },
         searchSubject(){
           if(document.getElementById("an").checked){
             this.check = '0'
           }else(
             this.check = '1'
           )
           for (let index = 0; index < this.value.length; index++) {
             this.course_id[index] = this.value[index].id
             
           }
           this.$store.dispatch('subject/addData',{params: {
             name: this.nameSubject,
             description: this.description,
             is_active: this.check,
             value: this.course_id,

           }})
           
          },
        
    }
}
</script>

     

<!-- New step!
     Add Multiselect CSS. Can be added as a static asset or inside a component. -->
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

