<template>
  <ion-page>
    <!-- <ion-header>
      <ion-toolbar>
        <ion-title style="text-align: center;">LOGIN</ion-title>
      </ion-toolbar>
    </ion-header> -->

    <ion-content class="ion-padding">
      <ion-card style="box-shadow: 10px;">
        <ion-card-header>
          <ion-card-title style="text-align: center;">LOGIN</ion-card-title>
        </ion-card-header>
        <ion-card-content>
  <ion-list>
    <ion-item>
      <ion-input v-model="email" label-placement="floating">
        <div slot="label">Email</div>
      </ion-input>
    </ion-item>
  </ion-list>
    <ion-list>
    <ion-item>
      <ion-input v-model="password" label-placement="floating">
        <div slot="label">Password</div>
      </ion-input>
    </ion-item>
  </ion-list>
          <!-- <ion-button expand="block" @click="login" color="dark">LOGIN</ion-button> -->
        </ion-card-content>
      </ion-card>
      
    </ion-content>
  </ion-page>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import axios from "axios";
import {
  IonPage,
  IonHeader,
  IonToolbar,
  IonTitle,
  IonContent,
  IonCard,
  IonCardHeader,
  IonCardTitle,
  IonCardContent,
  IonInput,
  IonButton,
} from "@ionic/vue";

const email = ref("");
const password = ref("");
const errorMsg = ref("");
</script>