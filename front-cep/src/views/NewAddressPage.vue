<template>
    <div class="new-address-page">
      <h2>Novo Endereço</h2>
      <form @submit.prevent="createAddress" class="edit-form">
        <div class="form-group">
          <label for="cep">CEP:</label>
          <input v-model="form.cep" type="text" id="cep" name="cep" @blur="fetchAddressInfo" @input="formatCep">
        </div>
        <div class="form-group">
          <label for="logradouro">Logradouro:</label>
          <input v-model="form.logradouro" type="text" id="logradouro" name="logradouro">
        </div>
        <div class="form-group">
          <label for="bairro">Bairro:</label>
          <input v-model="form.bairro" type="text" id="bairro" name="bairro">
        </div>
        <div class="form-group">
          <label for="localidade">Cidade:</label>
          <input v-model="form.localidade" type="text" id="cidade" name="cidade">
        </div>
        <div class="form-group">
          <label for="uf">UF:</label>
          <input v-model="form.uf" type="text" id="uf" name="uf">
        </div>
        <div class="form-group">
          <label for="complemento">Complemento:</label>
          <input type="text" id="complemento" v-model="form.complemento">
        </div>
        <div class="form-group">
          <label for="numero_casa">Número da Casa:</label>
          <input type="text" id="numero_casa" v-model="form.numero_casa">
        </div>
  
        <button type="submit" class="save-button">Cadastrar</button>
      </form>
  
      <div v-if="statusMessage" :class="statusClass">{{ statusMessage }}</div>
      <div v-if="createdAddress" class="success">
        <p>Endereço adicionado com sucesso:</p>
        <p>CEP: {{ createdAddress.cep }}</p>
        <p>Logradouro: {{ createdAddress.logradouro }}</p>
        <p>Bairro: {{ createdAddress.bairro }}</p>
        <p>Cidade: {{ createdAddress.localidade }}</p>
        <p>UF: {{ createdAddress.uf }}</p>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: 'NewAddressPage',
    data() {
      return {
        form: {
          cep: '',
          logradouro: '',
          bairro: '',
          localidade: '',
          uf: '',
          complemento: '',
          numero_casa: ''
        },
        statusMessage: '',
        statusClass: '',
        createdAddress: null
      };
    },
    methods: {
      async createAddress() {
        try {
          const response = await axios.post('/api/addresses', this.form);
          if (response.status === 201) {
            this.createdAddress = response.data;
            this.statusMessage = 'Endereço adicionado com sucesso.';
            this.statusClass = 'success';
            // Limpar o formulário após o sucesso
            this.form = {
              cep: '',
              logradouro: '',
              bairro: '',
              localidade: '',
              uf: '',
              complemento: '',
              numero_casa: ''
            };
          }
        } catch (error) {
          if (error.response && error.response.status === 409) {
            this.statusMessage = 'Endereço já cadastrado.';
            this.statusClass = 'error';
          } else {
            this.statusMessage = 'Erro, por favor tente novamente.';
            this.statusClass = 'error';
          }
        }
      },
      async fetchAddressInfo() {
        if (this.form.cep.length === 8) {
          try {
            const response = await axios.get(`https://viacep.com.br/ws/${this.form.cep}/json/`);
  
            if (response.data.erro) {
              // O CEP não foi encontrado na ViaCEP, limpar os campos de logradouro, bairro, cidade e UF
              this.form.logradouro = '';
              this.form.bairro = '';
              this.form.localidade = '';
              this.form.uf = '';
            } else {
              // Preencher os campos de logradouro, bairro, cidade e UF com os dados da ViaCEP
              this.form.logradouro = response.data.logradouro;
              this.form.bairro = response.data.bairro;
              this.form.localidade = response.data.localidade;
              this.form.uf = response.data.uf;
            }
          } catch (error) {
            console.error('Erro ao buscar endereço:', error);
          }
        }
      },
      // Função para formatar o CEP sem hífens
      formatCep() {
        // Remove todos os caracteres não numéricos do valor do CEP
        this.form.cep = this.form.cep.replace(/\D/g, '');
      }
    }
  };
  </script>
  
  <style scoped>
  .new-address-page {
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
  