<template>
    <div class="edit-address-page">
      <h2>Editar Endereço</h2>
      <form @submit.prevent="updateAddress" class="edit-form">
        <div class="form-group">
          <label for="cep">CEP:</label>
          <input v-model="editedAddress.cep" @blur="fetchAddressByCep" id="cep" name="cep" type="text" />
        </div>
        <div class="form-group">
          <label for="logradouro">Logradouro:</label>
          <input v-model="editedAddress.logradouro" id="logradouro" name="logradouro" type="text" />
        </div>
        <div class="form-group">
          <label for="bairro">Bairro:</label>
          <input v-model="editedAddress.bairro" id="bairro" name="bairro" type="text" />
        </div>
        <div class="form-group">
          <label for="localidade">Cidade:</label>
          <input v-model="editedAddress.localidade" id="localidade" name="localidade" type="text" />
        </div>
        <div class="form-group">
          <label for="uf">UF:</label>
          <input v-model="editedAddress.uf" id="uf" name="uf" type="text" />
        </div>
        <div class="form-group">
          <label for="complemento">Complemento:</label>
          <input v-model="editedAddress.complemento" id="complemento" name="complemento" type="text" />
        </div>
        <div class="form-group">
          <label for="numero_casa">Número da Casa:</label>
          <input v-model="editedAddress.numero_casa" id="numero_casa" name="numero_casa" type="text" />
        </div>
  
        <button type="submit" class="save-button">Salvar</button>
      </form>
  
      <div v-if="successMessage" class="success-message">{{ successMessage }}</div>
      <div v-if="errorMessage" class="error-message">{{ errorMessage }}</div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: 'EditAddressPage',
    data() {
      return {
        editedAddress: {
          cep: '',
          logradouro: '',
          bairro: '',
          localidade: '',
          uf: '',
          complemento: '',
          numero_casa: ''
        },
        successMessage: '',
        errorMessage: ''
      };
    },
    created() {
      this.fetchAddress();
    },
    methods: {
      async fetchAddress() {
        const id = this.$route.params.id;
        try {
          const response = await axios.get(`/api/addresses/${id}`);
          this.editedAddress = response.data;
        } catch (error) {
          console.error('Erro ao buscar endereço:', error);
        }
      },
      async updateAddress() {
        const id = this.$route.params.id;
        try {
          const response = await axios.put(`/api/addresses/${id}`, this.editedAddress);
          this.successMessage = 'Endereço atualizado com sucesso';
          this.errorMessage = ''; // Limpa a mensagem de erro, se houver
          console.log('Endereço atualizado:', response.data);
          this.$router.push('/addresses');
        } catch (error) {
          this.successMessage = ''; // Limpa a mensagem de sucesso, se houver
          this.errorMessage = 'Erro ao atualizar endereço: ' + error.response.data.message;
          console.error('Erro ao atualizar endereço:', error);
        }
      },
      async fetchAddressByCep() {
        try {
          const response = await axios.get(`https://viacep.com.br/ws/${this.editedAddress.cep}/json/`);
          const cepData = response.data;
          this.editedAddress.logradouro = cepData.logradouro;
          this.editedAddress.bairro = cepData.bairro;
          this.editedAddress.localidade = cepData.localidade;
          this.editedAddress.uf = cepData.uf;
        } catch (error) {
          console.error('Erro ao buscar CEP:', error);
        }
      }
    }
  };
  </script>
  
  <style scoped>
  .edit-address-page {
    text-align: center;
    padding: 20px;
  }
  
  .edit-form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
  }
  
  .form-group {
    margin-bottom: 15px;
    text-align: left;
  }
  
  .form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
  }
  
  .form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  
  .save-button {
    border: none;
    border-radius: 20px;
    padding: 5px 15px;
    margin-top: 15px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
    background-color: #27ae60;
    color: #fff;
  }
  
  .save-button:hover {
    background-color: #219651;
  }
  
  /* Estilos para as mensagens de sucesso e erro */
  .success-message {
    color: green;
    margin-top: 10px;
  }
  
  .error-message {
    color: red;
    margin-top: 10px;
  }
  </style>
  