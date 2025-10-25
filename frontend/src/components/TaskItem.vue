<template>
  <div class="task-item">
    <span>{{ task.title }}</span>
    <button @click="$emit('delete', task.id)">🗑️</button>
  </div>
</template>

<script>
export default {
  props: {
    task: Object
  }
};
</script>

<style scoped>
.task-item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #222;
  color: #fff;
  padding: 8px 12px;
  border-radius: 8px;
  margin-bottom: 8px;
}
button {
  background: none;
  border: none;
  color: #ff6b6b;
  cursor: pointer;
  font-size: 1.1rem;
}
</style>
