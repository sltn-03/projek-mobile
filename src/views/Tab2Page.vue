<template>
      <!-- Menu -->
      <ion-menu content-id="main-content">
        <ion-header>
          <ion-toolbar>
             <ion-title>My App</ion-title>
          </ion-toolbar>
        </ion-header>

      </ion-menu>
      
      <ion-page id="main-content">
        <ion-header>
          <ion-title>My App</ion-title>
        </ion-header>
        <ion-content class="ion-padding">

          <ion-refresher slot="fixed" @ionRefresh="handleRefresh">
            <ion-refresher-content></ion-refresher-content>
          </ion-refresher>

        </ion-content>
      </ion-page>

      <!-- <ExploreContainer name="Tab 2 page" /> -->
</template>

<script setup lang="ts">
import { 
  IonPage, 
  IonHeader, 
  IonToolbar, 
  IonTitle, 
  IonContent, 
  IonToggle, 
  IonItem, 
  IonLabel, 
  IonButton, 
  IonButtons, 
  IonIcon, 
  IonSearchbar, 
  IonFab, 
  IonRefresher, 
  IonRefresherContent
} from '@ionic/vue';
import type { RefresherCustomEvent } from '@ionic/vue';
import { ref, onMounted } from 'vue';
import {defineComponent} from 'vue';
import ExploreContainer from '@/components/ExploreContainer.vue';
import { arrowBackOutline, personCircle, searchOutline, addOutline, colorPalette, globe, settingsSharp, save } from 'ionicons/icons';


const handleRefresh = (event: RefresherCustomEvent) => {
  setTimeout(() => {
    // lastUpdate.value = new Date().toLocaleTimeString(); // Update data
    event.target.complete(); // Selesai refresh
  }, 1500); // Simulasi delay 1,5 detik
};
</script>