<template>
    <backButton />
    <span class="history" v-if="route.params.art == 'wohnen' || route.params.art == 'arbeiten'">{{ route.params.art.charAt(0).toUpperCase() + route.params.art.slice(1) }} / </span>
    <span class="history" v-if="route.params.art == 'tagesstaette' || route.params.art == 'verwaltung' || route.params.art == 'sonstige'">{{ route.params.art.charAt(0).toUpperCase() + route.params.art.slice(1) }} / </span>
    <div class="row" v-if="route.params.art == 'wohnen' || route.params.art == 'arbeiten'">
      <div class="col col-lg-3" style="padding: 12px;" v-for="ort in orte" :key="ort.id">
        <router-link style="text-decoration: none" :to="`/${route.params.art}/${ort.name}`">
          <n-list hoverable bordered>
            <n-list-item style="padding: 12px">
              <img v-bind:src="ort.iconPath" style="max-width: 100%" />
            </n-list-item>
          </n-list>
        </router-link>
        <h1 style="text-transform: none; text-align: center">
          <strong>{{ ort.name }}</strong>
        </h1>
      </div>
    </div>
  
    <div class="row" v-if="route.params.art == 'tagesstaette'">
      <div class="col col-lg-3" style="padding: 12px" v-for="ort in orte" :key="ort.id">
        <router-link style="text-decoration: none" :to="`/${route.params.art}/null/${ort.id}`">
          <n-list hoverable bordered>
            <n-list-item style="padding: 12px">
              <img v-bind:src="ort.iconPath" style="max-width: 100%" />
            </n-list-item>
          </n-list>
        </router-link>
        <h1 style="text-transform: none; text-align: center">
          <strong>{{ ort.name }}</strong>
        </h1>
      </div>
    </div>
  
    <div class="row" v-if="route.params.art == 'verwaltung' || route.params.art == 'sonstige'">
      <div class="col-md-3" style="padding: 12px" v-for="v in data" :key="v.id">
        <router-link style="text-decoration: none" :to="`/${route.params.art}/null/${v.id}`">
          <n-list hoverable bordered>
            <n-list-item style="padding: 12px">
              <img v-bind:src="v.iconPath" style="max-width: 100%; max-height: 200px; margin-left: auto; margin-right: auto; display: block;"/>
            </n-list-item>
          </n-list>
        </router-link>
        <h1 style="text-transform: none; text-align: center">
          <strong style="font-size: 20px">{{ v.bereich }}</strong>
        </h1>
      </div>
    </div>
  </template>
  
  <script setup>
    import BackButton from "../layouts/BackButton.vue";
    import axios from "axios";
    import { ref } from "vue";
    import { useRoute } from 'vue-router'
  
    const route = useRoute()
    let data = ref({});
  
    const orte = [
      {
        id: "1",
        name: "Flensburg",
        iconPath:
          "https://i.postimg.cc/MKK7ps5y/csm-2010-05-21-1192-1-71acf82654-Cropped-1.jpg"
      },
      {
        id: "2",
        name: "Niebüll",
        iconPath: "https://i.postimg.cc/k4m83wDR/2435-210-1-g-Cropped.jpg"
      },
      {
        id: "3",
        name: "Schleswig",
        iconPath: "https://i.postimg.cc/BvJ3xvdG/5815c901-18a0-4f90-ac0b-1a4b0a0a916c-l.jpg"
      },
    ];
  
    if (route.params.art == 'verwaltung') {
      axios.get("/api/verwaltung").then((response) => {
        data.value = response.data;
      });
    }
  
    if (route.params.art == 'sonstige') {
      axios.get("/api/sonstige").then((response) => {
        data.value = response.data;
      });
    }
  
  </script>
  
  <style lang="scss">
  .history{
    font-size: 17px;
    padding-left: 30px;
  }
  </style>