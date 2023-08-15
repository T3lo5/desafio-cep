<template>
  <div class="address-page">
    <h1>Endereços</h1>
    <div class="address-links">
      <router-link to="/addresses/new">Novo Endereço</router-link>
      <router-link to="/addresses">Listar Endereços</router-link>
    </div>
    <AddressList />
    <div class="home-content">
      <h1>Bem-vindo ao Sistema de Busca de CEP</h1>
      <p>Desenvolvido com Laravel e Vue.js</p>
      <p>Aqui você pode cadastrar, editar, excluir e buscar endereços por CEP e Logradouro.</p>
    </div>
    <div class="author-info">
      <p class="author-name">Sistema criado por Anderson Franciscato</p>
      <div class="author-social">
        <a href="https://www.linkedin.com/in/andersonwsf" target="_blank" rel="noopener noreferrer">
          <i class="fab fa-linkedin"></i>
          <span>LinkedIn</span>
        </a>
        <a href="https://github.com/T3lo5" target="_blank" rel="noopener noreferrer">
          <i class="fab fa-github"></i>
          <span>GitHub</span>
        </a>
      </div>
    </div>
  </div>
</template>

<script>
import AddressList from '@/components/AddressList.vue';

export default {
  components: {
    AddressList,
  },
};
</script>

<style scoped>
.address-page {
  text-align: center;
  padding: 20px;
}

.address-links {
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
}

.address-links a {
  color: #333;
  text-decoration: none;
  font-size: 18px;
  padding: 10px;
}

.address-links a:hover {
  color: #ffc107;
}

.home-content {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 10px;
  background-color: #fff;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
  text-align: left;
}

.home-content h1 {
  font-size: 28px;
  margin-bottom: 10px;
}

.home-content p {
  font-size: 18px;
  margin-bottom: 20px;
}

.author-info {
  margin-top: 40px;
  text-align: center;
}

.author-social {
  margin-top: 10px;
  display: flex;
  justify-content: center;
}

.author-social a {
  display: flex;
  align-items: center;
  margin: 0 10px;
  font-size: 18px;
  color: #333;
  text-decoration: none;
}

.author-social a i {
  margin-right: 5px;
}

.author-social a:hover {
  color: #ffc107;
}
</style>
