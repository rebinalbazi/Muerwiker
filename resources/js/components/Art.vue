<template>
  <div class="row">
    <div class="col-md-4" style="padding: 12px" v-for="art in arten" :key="art.id">
        <router-link style="text-decoration: none" :to="`/${art.urlName}`">
        <n-list hoverable bordered>
          <n-list-item style="padding: 12px">
            <div class="row">
              <div class="col-md-3">
                <img v-bind:src="art.iconPath" style="max-width: 100%" />
              </div>
              <div class="col-md-9" style="margin: auto; vertical-align: middle">
                <h1 style="text-transform: none">
                  <strong>{{ art.bezeichnung }}</strong>
                </h1>
              </div>
            </div>
          </n-list-item>
        </n-list>
      </router-link>
    </div>
  </div>
</template>

<script setup>
import axios from "axios";
import { ref } from "vue";

let arten = ref([
  {
    id: "1",
    bezeichnung: "Wohnen",
    iconPath: "https://cdn-icons-png.flaticon.com/512/4956/4956574.png",
    urlName: "wohnen"
  },
  {
    id: "2",
    bezeichnung: "Arbeit",
    iconPath: "https://cdn-icons-png.flaticon.com/512/658/658120.png",
    urlName: "arbeiten"
  },
  {
    id: "3",
    bezeichnung: "Tagesstätte",
    iconPath: "https://cdn-icons-png.flaticon.com/512/4506/4506184.png",
    urlName: "tagesstaette"
  },
  {
    id: "4",
    bezeichnung: "Verwaltung",
    iconPath: "https://cdn-icons-png.flaticon.com/512/1570/1570139.png",
    urlName: "verwaltung"
  },
  {
    id: "5",
    bezeichnung: "Sonstige",
    iconPath: "https://cdn-icons-png.flaticon.com/512/60/60492.png",
    urlName: "sonstige"
  }
]);
</script>
  
<style lang="scss">

</style>
  