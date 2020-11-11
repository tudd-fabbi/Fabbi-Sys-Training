<template>
    <div class="main-content">
        <base-header type="gradient-success" class="pb-6 pb-8 pt-5 pt-md-8">
        </base-header>
        <div class="content">
            <h3 v-if="id">{{ $t("task_screen.update_title") }}</h3>
            <h3 v-else>{{ $t("task_screen.create_title") }}</h3>
            <form action="" @submit.prevent="onUpdateCreateTask()">
                <div class="form-group">
                    <label>{{ $t("task.task_name") }}</label>
                    <input type="text" v-model="task.name" class="form-control">
                </div>
                <div class="form-group">
                    <label>{{ $t("task.task_content") }}</label>
                    <input type="text" v-model="task.content" class="form-control">
                </div>
                <div class="form-group">
                    <label>{{ $t("task.task_description") }}</label>
                    <textarea type="text" rows="10" v-model="task.description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label class="typo__label">Chọn subject</label>
                    <multiselect v-model="multi.value"
                                 tag-placeholder="Add this as new tag"
                                 placeholder="Search or add a tag"
                                 label="name"
                                 track-by="code"
                                 :options="multi.subjects"
                                 :multiple="true"
                                 :taggable="true"
                                 @tag="addTag"
                    >
                    </multiselect>
                </div>
                <div class="form-group">
                    <label>{{ $t("task.task_deadline") }}</label>
                    <input type="date" v-model="task.deadline" class="form-control">
                </div>
                <div class="form-group">
                    <input type="checkbox" v-model="task.is_active">
                    <p v-if="task.is_active">Hiện</p>
                    <p v-else>Ẩn</p>
                </div>
                <button class="btn btn-primary" v-if="id">Cập nhật</button>
                <button class="btn btn-primary" v-else>Thêm mới</button>
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
                value: [
                    {name: 'Javascript', code: 'js'}
                ],
                subjects: [
                    {name: 'Vue.js', code: 'vu'},
                    {name: 'Javascript', code: 'js'},
                    {name: 'Open Source', code: 'os'}
                ]
            }
        }
    },
    props: [
        'id'
    ],
    created() {
        if (this.id) {
            this.getTask();
        }
    },
    methods: {
        getTask() {
            this.$store.dispatch("task/getTaskById", this.id)
                .then(response => {
                    this.task = response;
                })
        },
        addTag(newTag) {
            const tag = {
                name: newTag,
                code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
            }
            this.multi.subjects.push(tag)
            this.multi.value.push(tag)
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
