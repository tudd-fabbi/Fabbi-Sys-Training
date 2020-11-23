<template>
  <div>
    <div class="node">
      <div>
        <span class="action">
          <td v-if="!input">
            <span @click="change()" @dblclick="changeInput()">{{
              node.name
            }}</span>
            <span
              ><div class="icon">
                <span>{{ $t("categories.button.button_add_all_parent") }}</span>
                <b-button @click="addAllParent(node.parent_id, node.id)">
                  <b-icon icon="chevron-up"></b-icon>
                </b-button>
              </div>
              <div class="icon">
                <span>{{ $t("categories.button.button_add_one_parent") }}</span>
                <b-button @click="addOneParent(node.parent_id, node.id)">
                  <b-icon icon="triangle"></b-icon>
                </b-button>
              </div>
              <div class="icon">
                <span>{{ $t("categories.button.button_add_friend") }}</span>
                <b-button @click="addCategoryChildrenOrFriend(node.parent_id)">
                  <b-icon icon="reception0"></b-icon>
                </b-button>
              </div>
              <div class="icon">
                <span>{{ $t("categories.button.button_add_children") }}</span>
                <b-button @click="addCategoryChildrenOrFriend(node.id)">
                  <b-icon icon="chevron-down"></b-icon>
                </b-button>
              </div>
              <div class="icon">
                <span>{{ $t("categories.button.button_delete") }}</span>
                <b-button @click="deleteCategory(node.id)">
                  <b-icon icon="x-circle"></b-icon>
                </b-button></div
            ></span>
          </td>
          <span v-else>
            <input type="text" v-model="node.name" />
            <button class="btn btn-primary" @click="update(node.name, node.id)">
              {{ $t("categories.button.button_update") }}
            </button>
          </span>
        </span>
      </div>
    </div>
    <template v-if="children">
      <tree-brower
        id="children"
        v-for="child in node.children"
        :key="child.id"
        :node="child"
        @reload="$emit('reload')"
      />
    </template>
  </div>
</template>
<script>
export default {
  name: "tree-brower",
  props: {
    type: {
      type: String,
    },
    title: String,
    node: Object,
  },
  data() {
    return {
      children: false,
      input: false,
      data: {
        name: "",
        parent_id: "",
      },
    };
  },
  methods: {
    change() {
      this.children = !this.children;
    },
    changePage() {
      this.$router.push({ name: "category.update" });
    },
    async deleteCategory(id) {
      if (confirm(this.$i18n.t("categories.label.category_delete_confirm"))) {
        await this.$store.dispatch("category/deleteData", id),
          this.$emit("reload");
      }
    },
    changeInput() {
      this.input = !this.input;
    },
    async update(name, id) {
      this.input = false;
      this.data.name = name;
      await this.$store.dispatch("category/updateData", {
        id: id,
        name: this.data,
      });
      this.$emit("reload");
    },
    async addCategoryChildrenOrFriend(id) {
      this.children = true;
      this.data.name = "new category";
      this.data.parent_id = id;
      await this.$store.dispatch("category/addChildrenData", this.data);
      this.$emit("reload");
    },
    async addAllParent(parent_id, id) {
      this.children = true;
      this.data.name = "new category";
      this.data.parent_id = parent_id;
      await this.$store.dispatch("category/addAllParentData", {
        data: this.data,
        id: id,
      });
      this.$emit("reload");
    },
    async addOneParent(parent_id, id) {
      this.children = true;
      this.data.name = "new category";
      this.data.parent_id = parent_id;
      await this.$store.dispatch("category/addOneParentData", {
        data: this.data,
        id: id,
      });
      this.$emit("reload");
    },
  },
};
</script>

<style>
#delete-category {
  background-color: red;
}
#children {
  margin-left: 10%;
}
.icon {
  display: inline-block;
  margin-left: 5%;
}
.icon span {
  display: block;
  opacity: 0;
}
.icon:hover > span {
  opacity: 1;
}
</style>