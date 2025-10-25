<template>
  <div class="home">
    <h1>Gerenciador de Tarefas</h1>
    <input v-model="newTask" placeholder="Nova tarefa..." />
    <button @click="addTask">Adicionar</button>

    <div v-if="tasks.length === 0">Nenhuma tarefa encontrada.</div>

    <ul>
      <li v-for="task in tasks" :key="task.id">
        {{ task.title }}
        <button @click="deleteTask(task.id)">🗑️</button>
      </li>
    </ul>
  </div>
</template>

<script>
import taskApi from "../api/taskApi.js";

export default {
  data() {
    return {
      tasks: [],
      newTask: "",
    };
  },
  async mounted() {
    await this.loadTasks();
  },
  methods: {
    async loadTasks() {
      const res = await taskApi.getTasks();
      if (res.success) this.tasks = res.data;
    },
    async addTask() {
      if (this.newTask.trim() === "") return;
      await taskApi.addTask(this.newTask.trim());
      this.newTask = "";
      await this.loadTasks();
    },
    async deleteTask(id) {
      await taskApi.deleteTask(id);
      await this.loadTasks();
    },
  },
};
</script>

<style scoped>
.home {
  max-width: 600px;
  margin: 40px auto;
  background: #111;
  color: #fff;
  padding: 24px;
  border-radius: 12px;
}
input {
  flex: 1;
  padding: 8px;
  border-radius: 8px;
  border: 1px solid #444;
  background: #222;
  color: #fff;
  margin-right: 8px;
}
button {
  background: #3b82f6;
  border: none;
  padding: 8px 16px;
  border-radius: 8px;
  color: white;
  cursor: pointer;
}
ul {
  margin-top: 16px;
  list-style: none;
  padding: 0;
}
li {
  background: #222;
  padding: 8px 12px;
  margin-bottom: 8px;
  border-radius: 8px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
li button {
  background: none;
  border: none;
  color: #ff6b6b;
  cursor: pointer;
}
</style>
