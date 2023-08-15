<template>
    <div class="address-list">
      <div v-for="address in addresses" :key="address.id" class="address-card">
        <h2>{{ address.logradouro }}</h2>
        <p>{{ address.bairro }}</p>
        <p>{{ address.localidade }}, {{ address.uf }}</p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      addresses: Array 
    }
  };
  </script>
  
  <style scoped>
  .address-list {
    display: flex;
    flex-wrap: wrap;
  }
  
  .address-card {
    border: 1px solid #ccc;
    padding: 10px;
    margin: 10px;
  }
  </style>
  