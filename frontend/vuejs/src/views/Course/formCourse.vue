<template>
    <div>
        <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8">

        </base-header>

        <div class="container-fluid mt-4">
            <b-form @submit="onSubmit">
                <b-form-group
                    id="input-group-1"
                    label="Name Course:"
                    label-for="input-1">
                    <b-form-input
                        id="input-1"
                        v-model="course.name"
                        type="text"
                        required
                        placeholder="Enter Name Course"
                    ></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-2" label="Description:" label-for="input-2">
                    <b-form-input
                        id="input-2"
                        v-model="course.description"
                        required
                        placeholder="Enter Description"
                    ></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-3" label="Activate:" label-for="input-3">
                    <b-form-select
                        id="input-3"
                        v-model="selected"
                        :options="activate"
                        required
                    ></b-form-select>
                </b-form-group>
                <b-button type="submit" variant="primary">Submit</b-button>
                <b-button type="reset" variant="danger">Reset</b-button>
            </b-form>
        </div>

    </div>
</template>
<script>
export default {
    props: ['id'],
    data() {
        return {
            course: [
                {
                    name: '',
                    description: '',
                    is_active: '',
                }
            ],
            activate: [
                { text: 'Please select an option', value: '', disabled: true },
                'Activate',
                'Inactivate'
            ],
            selected: '',
        }

    },
    created() {
        if(this.id){
            this.getData();

        }
    },
    methods: {
        onSubmit() {

        },
        getData(){
            this.$store.dispatch('course/getData',this.id).then(
                res =>{
                    this.course = res;
                    this.selected = this.course.is_active;
                }
            )
        }

    }
}
</script>
