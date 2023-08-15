<template>
  <div id="app">
    <AppMenu />
    <router-view />
  </div>
</template>

<script>
import AppMenu from "@/components/AppMenu.vue";

export default {
  components: {
    AppMenu,
  },
  watch: {
    $route(to) {
      // Define o título da página com base na rota atual
      const pageTitle = to.meta.title || 'Sistema de Busca de CEP'; // Título padrão
      document.title = pageTitle;
    },
  },
};
</script>

<style>
/* Importar os estilos CSS globais */
@import "./assets/style.css";
</style>
