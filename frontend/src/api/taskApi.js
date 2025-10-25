const API_URL = "http://localhost:8000/backend/index.php/tasks";

export default {
  async getTasks() {
    const response = await fetch(API_URL);
    return response.json();
  },

  async addTask(title) {
    const response = await fetch(API_URL, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ title, completed: 0 }),
    });
    return response.json();
  },

  async deleteTask(id) {
    const response = await fetch(`${API_URL}?id=${id}`, {
      method: "DELETE",
    });
    return response.json();
  },
};
