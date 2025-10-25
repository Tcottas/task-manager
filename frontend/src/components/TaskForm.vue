<template>
  <form @submit.prevent="submitTask">
    <input v-model="title" type="text" placeholder="Nova tarefa..." />
    <button type="submit">Adicionar</button>
  </form>
</template>

<script>
export default {
  data() {
    return { title: "" };
  },
  emits: ["add"],
  methods: {
    submitTask() {
      if (this.title.trim() !== "") {
        this.$emit("add", this.title.trim());
        this.title = "";
      }
    },
  },
};
</script>

<style scoped>
form {
  display: flex;
  gap: 10px;
  margin-bottom: 16px;
}
input {
  flex: 1;
  padding: 8px;
  border-radius: 8px;
  border: 1px solid #444;
  background: #222;
  color: #fff;
}
button {
  background: #3b82f6;
  border: none;
  padding: 8px 16px;
  border-radius: 8px;
  color: white;
  cursor: pointer;
}
</style>
