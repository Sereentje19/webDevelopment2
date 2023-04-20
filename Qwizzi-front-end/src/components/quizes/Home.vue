<template>
            
  <headerNavigation />
  <body>
        <p>
          hallo hallo dit is een test
        </p>
  </body>
    <footerNavigation />
</template>

<script>
import headerNavigation from './Header.vue'
import footerNavigation from './Footer.vue';

export default {
    header: {
    name: "header",
    components: {
        headerNavigation
    }
  },
  footer: {
    name: "footer",
    components: {
        footerNavigation
    }
  }
};
</script>


<style>
body {
  background-color: rgb(255, 237, 237);
  min-height: 554px; 
}
</style>