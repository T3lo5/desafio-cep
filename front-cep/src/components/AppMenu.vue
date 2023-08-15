<template>
  <nav id="appmenu">
    <div class="menu-links">
      <router-link to="/">Home</router-link>
      <router-link to="/addresses">Listar Endereços</router-link>
      <router-link to="/addresses/new">Cadastrar Endereço</router-link>
    </div>
  </nav>
</template>

<style>
.menu {
  display: flex;
  justify-content: space-around;
  padding: 20px;
  background-color: #f0f0f0;
  
}
</style>
