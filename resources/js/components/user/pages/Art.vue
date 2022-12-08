<template>
    <div class="search" >
      <input class="searchField" type="text" placeholder="Suche" v-model="searchKey"/>
      <router-link style="text-decoration: none;" :to="`/suche/${searchKey}`">
      <button class="searchButton">
        <img src="https://cdn-icons-png.flaticon.com/512/3031/3031293.png" style="max-width: 15px"/>
      </button>
    </router-link>
    </div>
  
    <div class="row">
      <div class="col-md-4" style="padding: 12px;" v-for="art in arten" :key="art.id">
        <router-link style="text-decoration: none;" :to="`/${art.urlName}`">
          <n-list hoverable bordered style="margin:0px; overflow:hidden">
            <n-list-item style="padding: 12px">
              <img v-bind:src="art.iconPath" style="max-width: 100%; max-height: 150px; float: left; padding: 10px;"/>
              <h1 style="text-transform: none; text-align: center; max-width: 100%; float: left;">
                <strong style="font-size: 25px">{{ art.bezeichnung }}</strong>
              </h1>
              <div style="position: relative">
                <n-popover trigger="hover">
                  <template #trigger>
                      <img style="position:absolute; right: 0; border-radius: 50%; max-width: 20px;" src="https://cdn-icons-png.flaticon.com/512/84/84264.png"/>
                  </template>
                  <span>{{ art.infoText }}</span>
                </n-popover>
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

  let searchKey = ref("");
  let arten = ref([
    {
      id: "1",
      bezeichnung: "Wohnen",
      iconPath: "https://cdn-icons-png.flaticon.com/512/4956/4956574.png",
      urlName: "wohnen",
      infoText: "In diesem Abschnitt finden Sie alle Orte und Wohnbereiche von den Mürwickern."
    },
    {
      id: "2",
      bezeichnung: "Arbeit",
      iconPath: "https://cdn-icons-png.flaticon.com/512/658/658120.png",
      urlName: "arbeiten",
      infoText: "In diesem Abschnitt werden die Orte, Straßen und Arbeitsbereiche angezeigt."
    },
    {
      id: "3",
      bezeichnung: "Tagesstätte",
      iconPath: "https://cdn-icons-png.flaticon.com/512/4506/4506184.png",
      urlName: "tagesstaette",
      infoText: "In diesem Abschnitt werden die verschiedenen Orte  und Ansprechpartner von den Tagesstätten angezeigt."
    },
    {
      id: "4",
      bezeichnung: "Verwaltung",
      iconPath: "https://cdn-icons-png.flaticon.com/512/1570/1570139.png",
      urlName: "verwaltung",
      infoText: "Hier befinden sich alle Bereiche bezüglich der Verwaltung, dies wären Personal, Finanzen, Betriebsrat, Werkstattrat und Datenschutz."
    },
    {
      id: "5",
      bezeichnung: "Sonstige",
      iconPath: "https://cdn-icons-png.flaticon.com/512/60/60492.png",
      urlName: "sonstige",
      infoText: "Hier befinden sich alle sonstige Bereiche, wie zum Beispiel Fahrdienst, Begleitender Dienst und Berufliche Bildung."
    }
  ]);

  </script>
    
  <style lang="scss">
  .searchField {
    padding: 5px 0px 5px 10px;
    min-width: 350px;
  
    border-radius: 10px 0px 0px 10px;
    background: white;
    border-color: #418bca;
    border-width: 0.125ch;
  }
  .searchButton{
    padding: 5px 10px 5px 10px;
    border-radius: 0px 10px 10px 0px;
    background: white;
    border-color: #418bca;
    border-width: 0.125ch;
  }
  
  </style>
    