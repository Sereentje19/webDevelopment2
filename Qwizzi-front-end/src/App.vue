<template>
  <navigation />
  <router-view />
</template>

<script>
import Navigation from './components/quizes/Navigation.vue'

export default {
  name: "app",
  components: {
    Navigation
  }
};
</script>

<style>
</style>
