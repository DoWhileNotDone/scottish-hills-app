<template>
  <header>
    <h1 data-testid="header">To Do App</h1>
  </header>

  <div></div>
</template>

<script>
export default {
  name: 'TodoAppSample',

  data() {
    return {
      todos: [
        {
          id: 1,
          text: 'Learn Vue.js 3',
          completed: false
        }
      ]
    }
  }
}
</script>