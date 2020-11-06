<template>
    <div>
        <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <stats-card title="Total traffic"
                                type="gradient-red"
                                sub-title="350,897"
                                icon="ni ni-active-40"
                                class="mb-4 mb-xl-0">

                        <template slot="footer">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                            <span class="text-nowrap">Since last month</span>
                        </template>
                    </stats-card>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <stats-card title="Total traffic"
                                type="gradient-orange"
                                sub-title="2,356"
                                icon="ni ni-chart-pie-35"
                                class="mb-4 mb-xl-0">

                        <template slot="footer">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 12.18%</span>
                            <span class="text-nowrap">Since last month</span>
                        </template>
                    </stats-card>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <stats-card title="Sales"
                                type="gradient-green"
                                sub-title="924"
                                icon="ni ni-money-coins"
                                class="mb-4 mb-xl-0">

                        <template slot="footer">
                            <span class="text-danger mr-2"><i class="fa fa-arrow-down"></i> 5.72%</span>
                            <span class="text-nowrap">Since last month</span>
                        </template>
                    </stats-card>

                </div>
                <div class="col-xl-3 col-lg-6">
                    <stats-card title="Performance"
                                type="gradient-info"
                                sub-title="49,65%"
                                icon="ni ni-chart-bar-32"
                                class="mb-4 mb-xl-0">

                        <template slot="footer">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 54.8%</span>
                            <span class="text-nowrap">Since last month</span>
                        </template>
                    </stats-card>
                </div>
            </div>
        </base-header>

        <div class="container-fluid mt--7">
            <div class="row">
                
                <div class="col">
                    <div class="card shadow border-0">
                    <h3 class="mb-0" :class="type === 'dark' ? 'text-white': ''" style="text-align:center;">
            Detail Subjects
          </h3>
          
          <div style="text-align:center;">
              <h3>Subject Name: <span>{{Subject.name}}</span> </h3>
              <h3>Description: <span>{{Subject.description}}</span> </h3>
              <h3>So luong cac Course: <span>{{Course}}</span></h3>
             
              
              <h3>So luong cac Task:  <span>{{this.Task}}</span></h3>
             
              <h3>So luong cac User tham gia: <span>{{User}}</span> </h3>
              

          </div>
                    
                </div>
            </div>
            
        </div>
        </div>
    </div>
</template>
<script>

  
  export default {
    name: 'tables',
   
  data(){
      return {
        Subject:[],
        Task: '',
        Course:'',
        User: '',
      }
  },
  props: [
        'id'
    ],

    created() {
        this.getTask(),
        this.countTask()
       this.countCourse(),
       this.countUser()
       


    },
    methods: {
        getTask(){
            
            this.$store.dispatch("subject/getSubjectById",this.id)
            //axios.get('/api/getsubjectbyid/'+ this.id)
            .then(response => {
                this.Subject = response.data; 
                //this.Task = response.data.name;
           });
        },

        countTask(){
          this.$store.dispatch("subject/countTaskbyId",this.id)
          .then(response => {
           this.Task = response.data;
       })

        },
        countCourse(){
          this.$store.dispatch("subject/countCoursebyId",this.id)
          .then(response => {
           this.Course = response.data;
       })

        },
        countUser(){
          this.$store.dispatch("subject/countUserbyId",this.id)
          .then(response => {
           this.User = response.data;
       })

        },

    }
  };
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style></style>
