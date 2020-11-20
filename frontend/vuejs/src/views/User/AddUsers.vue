<template>
  <div class="add_users">
    <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8">
      <div class="row">
          <div class="col-xl-3 col-lg-6">
              <stats-card title="Total traffic"
                          type="gradient-red"
                          sub-title="350,897"
                          icon="ni ni-active-40"
                          class="mb-4 mb-xl-0"
              >

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
                          class="mb-4 mb-xl-0"
              >

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
                          class="mb-4 mb-xl-0"
              >

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
                          class="mb-4 mb-xl-0"
              >

                  <template slot="footer">
                      <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 54.8%</span>
                      <span class="text-nowrap">Since last month</span>
                  </template>
              </stats-card>
          </div>
      </div>
    </base-header>
    <header>
      <h1>{{ $t("user_screen.title.user_screen") }}</h1>
    </header>
    <div class="content">
      <ValidationObserver ref="form">
        <form action="">
          <div class="container">
            <div class="form-group">
              <label for="name">{{ $t("user_screen.label.name") }}</label><br/>
              <ValidationProvider rules="required" v-slot="{ errors }">
                <input v-model="name" type="text" class="form-control" id="name">
                <span class="span-error">{{ errors[0] }}</span>
                <!-- <span class="span-error" v-if="error.name">{{ error.name }}</span> -->
              </ValidationProvider>
            </div>

            <div class="form-group">
              <label for="img">{{ $t("user_screen.label.upload_image") }}</label><br/>
              <ValidationProvider name="img" rules="required" v-slot="{ errors }">
                <input type="file" name="img" accept="images/*">
                <span class="span-error">{{ errors[0] }}</span>
              </ValidationProvider>
            </div>

            <div class="form-group">
              <label for="birthday">{{ $t("user_screen.label.birth_day") }}</label><br/>
              <ValidationProvider name="birthday" rules="required" v-slot="{ errors }">
                <input v-model="birthday" type="date" class="form-control" id="birthday">
                <span class="span-error">{{ errors[0] }}</span>
              </ValidationProvider>
            </div>

            <div class="form-group">
              <label for="phone">{{ $t("user_screen.label.phone_number") }}</label><br/>
              <ValidationProvider name="phone" rules="required|min:10|max:10" v-slot="{ errors }">
                <input v-model="phone" type="tel" class="form-control" name="phone" placeholder="123-45-678">
                <span class="span-error">{{ errors[0] }}</span>
                <span class="span-error" v-if="error.phone">{{ error.phone }}</span>
              </ValidationProvider>
            </div>

            <div class="form-group">
              <label for="address">{{ $t("user_screen.label.address") }}</label><br/>
              <ValidationProvider name="address" rules="required" v-slot="{ errors }">
                <input v-model="address" type="text" class="form-control" name="address">
                <span class="span-error">{{ errors[0] }}</span>
              </ValidationProvider>
            </div>

            <div class="form-group">
              <label for="email">{{ $t("user_screen.label.email") }}</label><br/>
              <ValidationProvider name="email" rules="required" v-slot="{ errors }">
                <input v-model="email" type="email" class="form-control">
                <span class="span-error">{{ errors[0] }}</span>
                <span class="span-error" v-if="error.email">{{ error.email }}</span>
              </ValidationProvider>
            </div>

            <div class="form-group">
              <label for="password">{{ $t("user_screen.label.password") }}</label><br/>
              <ValidationProvider name="password" rules="required|min:8" v-slot="{ errors }">
                <input v-model="password" type="password" class="form-control">
                <span class="span-error">{{ errors[0] }}</span>
              </ValidationProvider>
            </div>

            <div class="form-group">
              <label for="course">{{ $t("user_screen.label.course") }}</label><br/>
                <multiselect
                  v-validate="'required'"
                  v-model="value"
                  :options="options"
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
            <br/><br/>
            <div class="form-group button">
              <b-button @click="submit" type="button" class="btn btn-success">{{ $t("user_screen.button.submit") }}</b-button>
            </div>

          </div>
        </form>
      </ValidationObserver>
    </div>
  </div>
</template>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<script>
import { ValidationObserver, ValidationProvider } from "vee-validate/dist/vee-validate.full.esm";
import { mapGetter, mapGetters } from "vuex";

export default {
    components: {
      ValidationProvider,
      ValidationObserver
    },
    data () {
      return {
        value: [],
        options: [
          { name: 'Course1', id: 1 },
          { name: 'Course2', id: 2 },
          { name: 'Course3', id: 3 },
          { name: 'Course4', id: 4 },
          { name: 'Course5', id: 5 },
          { name: 'Course6', id: 6}
        ],
        name: "",
        birthday: "",
        phone: "",
        address: "",
        email: "",
        password: "",
        courseId: [],
        img_path: ""
      }
    },
    methods: {
      makeToast(message, variant) {
        this.$bvToast.toast(message, {
          variant: variant,
          solid: true
        })
      },
      async submit() {
        var i;
        for(i=0;i < this.value.length;i ++ )
        {
          this.courseId[i] = this.value[i].id;
        }

        await this.$store.dispatch('user/ADD_USER', {
          params: {
            name: this.name,
            birthday: this.birthday,
            phone: this.phone,
            address: this.address,
            email: this.email,
            password: this.password,
            course_id: this.courseId,
            img_path: this.img_path
           }
         })

        .then((response) => {
          if(response.data)
            this.makeToast("Add User Success","success");
        })
      }
    },
    computed: {
      ...mapGetters({
        error: "user/errors"
      })
    }
}
</script>
<style scoped>
  header {
    text-align: center;
  }
  .content .container{
    width: 600px;
  }
  .container .button {
    text-align: center;
  }

  form .span-error {
    color: red;
  }
</style>
