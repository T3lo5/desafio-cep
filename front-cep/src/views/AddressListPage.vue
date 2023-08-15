<template>
    <div class="address-list-page">
      <h2>Lista de Endereços</h2>
      <ul class="address-list">
        <li v-for="address in addresses" :key="address.id" class="address-item">
          <p>CEP: {{ address.cep }}</p>
          <p>Logradouro: {{ address.logradouro }}</p>
          <p>Bairro: {{ address.bairro }}</p>
          <p>Cidade: {{ address.localidade }}</p>
          <p>UF: {{ address.uf }}</p>
          <p>Número: {{ address.numero_casa }}</p>
          <p v-if="address.complemento">Complemento: {{ address.complemento }}</p>
          <div class="button-group">
            <button @click="editAddress(address)" class="edit-button">Editar</button>
            <button @click="confirmDelete(address)" class="delete-button">Excluir</button>
          </div>
        </li>
      </ul>
      <div v-if="lastPage > 1" class="pagination">
        <button @click="fetchPage(prevPage)" :disabled="currentPage === 1">Anterior</button>
        <span>Página {{ currentPage }} de {{ lastPage }}</span>
        <button @click="fetchPage(nextPage)" :disabled="currentPage === lastPage">Próxima</button>
      </div>
      <div v-if="message" class="message">
        {{ message }}
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: 'AddressListPage',
    data() {
      return {
        addresses: [],
        currentPage: 1,
        lastPage: 1,
        prevPage: null,
        nextPage: null,
        message: ''
      };
    },
    created() {
      this.fetchAddresses();
    },
    methods: {
      async fetchAddresses(page = 1) {
        try {
          const response = await axios.get(`/api/addresses?page=${page}`);
          this.addresses = response.data.data;
          this.currentPage = response.data.current_page;
          this.lastPage = response.data.last_page;
          this.prevPage = response.data.prev_page_url
            ? Number(response.data.prev_page_url.match(/page=(\d+)/)[1])
            : null;
          this.nextPage = response.data.next_page_url
            ? Number(response.data.next_page_url.match(/page=(\d+)/)[1])
            : null;
        } catch (error) {
          console.error('Erro ao buscar endereços:', error);
        }
      },
      async fetchPage(page) {
        if (page) {
          this.fetchAddresses(page);
        }
      },
      editAddress(address) {
        this.$router.push(`/addresses/${address.id}/edit`);
      },
      async deleteAddress(id) {
        try {
          const response = await axios.delete(`/api/addresses/${id}`);
          console.log('Endereço excluído:', response.data);
          this.fetchAddresses(this.currentPage);
        } catch (error) {
          console.error('Erro ao excluir endereço:', error);
        }
      },
      confirmDelete(address) {
        const confirmed = window.confirm('Tem certeza de que deseja excluir este endereço?');
        if (confirmed) {
          this.deleteAddress(address.id);
        }
      },
      showMessage(text) {
        this.message = text;
        setTimeout(() => {
          this.message = '';
        }, 3000);
      }
    }
  };
  </script>
  
  <style scoped>
  .address-list-page {
    text-align: center;
    padding: 20px;
  }
  
  .address-list {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  
  .address-item {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 10px;
  }
  
  .button-group {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 10px;
  }
  
  .edit-button,
  .delete-button {
    border: none;
    border-radius: 20px;
    padding: 5px 10px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
  }
  
  .edit-button {
    margin-right: 2vw;
    background-color: #3498db;
    color: #fff;
  }
  
  .delete-button {
    background-color: #e74c3c;
    color: #fff;
  }
  
  .edit-button:hover,
  .delete-button:hover {
    background-color: #2980b9;
  }
  
  .pagination {
    margin-top: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  .pagination button {
    margin: 0 10px;
    padding: 5px 10px;
  }
  
  .message {
    margin-top: 20px;
    color: green;
  }
  </style>