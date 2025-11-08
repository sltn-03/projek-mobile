<template>
  <ion-page class="">
    <ion-content class="ion-display-flex ion-justify-items-center">
    <!-- <ion-header>
      <ion-toolbar>
        <ion-title>Login Akun</ion-title>
      </ion-toolbar>
    </ion-header> -->

    <!-- <div v-if="message" class="message" :class="{ error: isError }">
      {{ message }}
    </div>

    <form @submit.prevent="handleLogin" class="login-form">
      <ion-input
        v-model="form.email"
        type="email"
        placeholder="Email"
        class="input"
        :disabled="loading"
      ></ion-input>
      <ion-input
        v-model="form.password"
        type="password"
        placeholder="Password"
        class="input"
        :disabled="loading"
      >
    <ion-input-password-toggle slot="end"></ion-input-password-toggle>
    </ion-input>

      <ion-button type="submit" class="btn-primary" :disabled="loading">
        {{ loading ? "Memproses..." : "Login" }}
      </ion-button>
    </form> -->

    <ion-card style="max-width: 400px; margin: 150px auto; box-shadow: none;">
      <ion-card-header>
        <h2 class="ion-text-center" style="color: black;">Login Akun</h2>
      </ion-card-header>
      <ion-card-content>
    
        <ion-text color="danger" class="ion-text-center" v-if="errorMessage">
          <p style="font-size: 17px;">{{ errorMessage }}</p>
        </ion-text>
    
        <ion-input
          v-model="email"
          type="email"
          placeholder="Email"
          style="margin-bottom: 10px;"
        ></ion-input>
        <ion-input
          v-model="password"
          type="password"
          placeholder="Password"
          style="margin-bottom: 10px;"
        >
        <ion-input-password-toggle slot="end"></ion-input-password-toggle>
        </ion-input>

    <ion-input v-model="token" label="Masukkan token Anda" label-placement="floating"></ion-input>
    
        <ion-button expand="block" @click="loginUser" style="margin-top: 20px;">Login</ion-button>
      </ion-card-content>
    </ion-card>

    </ion-content>
  </ion-page>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";
import {
  IonPage,
  IonContent,
  IonHeader,
  IonTitle,
  IonToolbar,
  IonInput,
  IonInputPasswordToggle,
  IonButton,
  IonText,
  IonCard,
  IonCardContent,
  IonCardHeader
} from "@ionic/vue";
import {useRoute} from 'vue-router';

const email = ref("");
const password = ref("");
const token = ref("");
const errorMessage = ref("");

const loginUser = async () => {
  if(token.value === ""){
    errorMessage.value = "Token tidak boleh kosong!"
    return
  }
  try{
    const res = await axios.post("http://localhost/crudDataIonic/server/login.php", {
      email: email.value,
      password: password.value,
      token: token.value
    });
    if(res.data.success){
      alert("Login berhasil");
      window.location.href = "/UserTable";
    } else {
      errorMessage.value = res.data.message;
    }
  } catch(error) {
    errorMessage.value = "Gagal menghubungi server!";
    console.error(error);
  }
}

// import { IonInput, ionInputPasswordToggle } from "@ionic/vue";
// import { loginUser } from "../api"; // pastikan fungsi loginUser sudah dibuat di file api.js
// export default {
//   name: "LoginForm",
//   data() {
//     return {
//       form: { email: "", password: "" },
//       loading: false,
//       message: "",
//       isError: false,
//     };
//   },
//   methods: {
//     async handleLogin() {
//       if (!this.form.email || !this.form.password) {
//         this.message = "Email dan Password wajib diisi!";
//         this.isError = true;
//         return;
//       }

//       this.loading = true;
//       this.message = "";
//       this.isError = false;

//       try {
//         const response = await loginUser(this.form);
//         if (response && response.token) {
//           localStorage.setItem("token", response.token);
//           this.message = "Login berhasil! Mengalihkan...";
//           this.isError = false;

//           // arahkan ke halaman utama atau dashboard
//           setTimeout(() => {
//             this.$router.push("/UserTable");
//           }, 1200);
//         } else {
//           this.message = "Email atau password salah!";
//           this.isError = true;
//         }
//       } catch (error) {
//         this.message = "Gagal login: " + error.message;
//         this.isError = true;
//       } finally {
//         this.loading = false;
//       }
//     },
//   },
// };
</script>

<style scoped>
ion-input{
  font-size: 17px;
  color: black;
}
/* ion-content{
  --background: #1370ce;
} */
.login-container {
  max-width: 400px;
  margin: 150px auto;
  padding: 30px;
  border-radius: 10px;
  /* background: #f9f9f9; */
  /* box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); */
  font-family: Arial, sans-serif;
}
.login-title {
  text-align: center;
  color: #333;
  margin-bottom: 25px;
}
.message {
  padding: 10px;
  border-radius: 5px;
  margin-bottom: 20px;
  border: 1px solid #c3e6cb;
  background: #d4edda;
  color: #155724;
}
.message.error {
  background: #f8d7da;
  color: #721c24;
  border-color: #f5c6cb;
}
.login-form {
  display: flex;
  flex-direction: column;
  gap: 15px;
}
/* .input {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
} */
/* .btn-primary {
  background: #007bff;
  color: white;
  border: none;
  padding: 10px;
  border-radius: 5px;
  cursor: pointer;
} */
.btn-primary:disabled {
  background: #6c757d;
  cursor: not-allowed;
}
</style>