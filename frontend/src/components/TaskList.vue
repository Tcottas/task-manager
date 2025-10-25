<template>
  <div>
    <TaskForm @add="addTask" />
    <div v-if="tasks.length === 0">Nenhuma tarefa encontrada.</div>
    <TaskItem
      v-for="task in tasks"
      :key="task.id"
      :task="task"
      @delete="deleteTask"
    />
  </div>
</template>

<script>
import taskApi from "../api/taskApi";
import TaskItem from "./TaskItem.vue";
import TaskForm from "./TaskForm.vue";

export default {
  components: { TaskItem, TaskForm },
  data() {
    return { tasks: [] };
  },
  async mounted() {
    await this.loadTasks();
  },
  methods: {
    async loadTasks() {
      const res = await taskApi.getTasks();
      if (res.success) this.tasks = res.data;
    },
    async addTask(title) {
      await taskApi.addTask(title);
      await this.loadTasks();
    },
    async deleteTask(id) {
      await taskApi.deleteTask(id);
      await this.loadTasks();
    },
  },
};
</script>
