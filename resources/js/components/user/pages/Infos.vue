<template>
    <backButton />
    <div class="row" v-if="route.params.art == 'wohnen' || route.params.art == 'arbeiten' || (route.path).split('/')[1] == 'tagesstaette' || (route.path).split('/')[1] == 'verwaltung'|| (route.path).split('/')[1] == 'sonstige'">
      <div class="col-md-8" style="padding: 12px; max-width: 100%">
        <n-list bordered v-if="ansprechpartner1 !== null">
          <n-list-item style="padding: 12px; text-align: center; vertical-align: middle">
            <div class="row">
              <div class="col-md-4">
                <p style="padding-left: 15px">
                  <img
                  v-bind:src=ansprechpartner1.imagePath
                    style="max-width: 100px; padding-top: 20px"
                  />
                </p>
                <p style="margin-bottom: 0; width: 100%">
                  <strong>1. Ansprechperson</strong>
                </p>
              </div>
              <div class="col-md-8" style="padding-left: 20px; max-width: 100%">
                <div class="infoTitle" style="width: 32.5%">
                  <strong style="font-size: 17px">Name:</strong>
                </div>
                <div class="infoDescription">
                  <strong style="font-size: 17px">{{ ansprechpartner1.name }} </strong>
                </div>
                <div class="infoTitle" style="width: 32.5%">
                  <strong>Telefon:</strong>
                </div>
                <div class="infoDescription">
                  <strong style="font-size: 17px">{{ ansprechpartner1.telefon }}</strong>
                </div>
                <div class="infoTitle" style="height: 57px; width: 32.5%">
                  <strong style="font-size: 17px">Email:</strong>
                </div>
                <div class="infoDescription" style="height: 57px">
                  <strong style="font-size: 17px; overflow-wrap: break-word; padding-left: 5px">
                    {{ ansprechpartner1.email }}
                    </strong>
                </div>
              </div>
            </div>
          </n-list-item>
        </n-list>
  
        <n-list bordered v-if="ansprechpartner2 !== null">
          <n-list-item style="padding: 12px; text-align: center; vertical-align: middle">
            <div class="row">
              <div class="col-md-4">
                <p style="padding-left: 15px">
                  <img
                    v-bind:src=ansprechpartner2.imagePath
                    style="max-width: 100px; padding-top: 20px"
                  />
                </p>
                <p style="margin-bottom: 0; width: 100%">
                  <strong>2. Ansprechperson</strong>
                </p>
              </div>
              <div class="col-md-8" style="padding-left: 20px; max-width: 100%">
                <div class="infoTitle" style="width: 32.5%">
                  <strong style="font-size: 17px">Name:</strong>
                </div>
                <div class="infoDescription">
                  <strong style="font-size: 17px">{{ ansprechpartner2.name }}</strong>
                </div>
                <div class="infoTitle" style="width: 32.5%">
                  <strong>Telefon:</strong>
                </div>
                <div class="infoDescription">
                  <strong style="font-size: 17px">{{ ansprechpartner2.telefon }}</strong>
                </div>
                <div class="infoTitle" style="height: 57px; width: 32.5%">
                  <strong style="font-size: 17px;">Email:</strong>
                </div>
                <div class="infoDescription" style="height: 57px">
                  <strong style="font-size: 17px; overflow-wrap: break-word; padding-left: 5px;">
                    {{ ansprechpartner2.email }}
                    </strong>
                </div>
              </div>
            </div>
          </n-list-item>
        </n-list>

        <n-list bordered v-if="(ansprechpartner1=== null && ansprechpartner2 === null)">
          <n-list-item style="padding: 12px; min-height: 160px; text-align: center; vertical-align: middle">
            <div class="row">
              <h3><strong>Keine Ansprechperson vorhanden.</strong></h3>
            </div>
          </n-list-item>
        </n-list>
      </div>
      
      <div class="col-md-1" style="padding: 12px; max-width: 100%">
        <router-link style="text-decoration: none" :to="`/`">
          <button class="homeButton" style="padding: 12px; width: 160px">
            <img src="https://cdn-icons-png.flaticon.com/512/25/25694.png" style="max-width: 70px; margin-left: auto; margin-right: auto; display: block;"/>
              <h4>
                <strong>Home</strong>
              </h4>
            </button>
          </router-link>
          <form v-bind:action="'tel:' + notfallnummer">
            <button class="warningDiv" style="padding: 12px; width: 160px">
            <img src="https://cdn-icons-png.flaticon.com/512/179/179386.png" style="max-width: 70px;"/>
              <h4 style="padding-top: 10px">
                <strong>Notfall</strong>
              </h4>
              <strong>{{ notfallnummer }}</strong>
            </button>
          </form>
        </div>
      </div>
  </template>
  
  <script setup>
  import BackButton from "../layouts/BackButton.vue";
  import axios from "axios";
  import { onMounted, ref } from "vue";
  import { useRoute } from "vue-router";
  
  const route = useRoute();
  
  let notfallnummer = ref({})
  let ansprechpartner1 = ref({});
  let ansprechpartner2 = ref({});
  
  const getData = (art, param) => {
    axios.get("/api/ansprechpartner").then((response) => {
      axios.get("/api/" + art).then((r) => {
      notfallnummer.value = Object.assign({}, ...r.data.filter((t) => t["id"] == param)).notfallnummer;
      let data = Object.assign({}, ...r.data.filter((t) => t["id"] == param));
      ansprechpartner1.value = Object.assign({}, ...response.data.filter((t) => t["id"] == data.ansprechpartner1_id));
      ansprechpartner2.value = Object.assign({}, ...response.data.filter((t) => t["id"] == data.ansprechpartner2_id));
      if (Object.keys(ansprechpartner1._rawValue).length === 0)
        ansprechpartner1.value = null;
      if (Object.keys(ansprechpartner2._rawValue).length === 0)
        ansprechpartner2.value = null;
      })
    })
  };
  
  onMounted(() => {
    if (route.params.art) {
      getData(route.params.art, route.params.infos);
    } else {
      getData((route.path).split('/')[1], route.params.infos);
    }
  });
  </script>
  
  <style lang="scss">
  .infoDescription {
    padding: 0px 15px 0px 15px;
    text-align: center;
    vertical-align: middle;
    border: solid;
    border-radius: 10px;
    border-color: #418bca;
    border-width: 0.1rem;
    background: aliceblue;
    max-width: 100%;
    margin-top: 10px;
  }
  .infoTitle {
    padding: 0px 20px 0px 20px;
    text-align: center;
    vertical-align: middle;
    border: solid;
    border-radius: 10px 0px 0px 10px;
    border-color: #418bca;
    border-width: 0.1rem;
    background: aliceblue;
    max-width: 100%;
    margin-top: 10px;
    font-size: 17px;
    float: left;
  }
  
  .homeButton {
    border-radius: 10px;
    background: white;
    border-color: #418bca;
    border-width: 0.25ch;
  }
  
  .warningDiv {
    padding: 0px 15px 0px 15px;
    text-align: center;
    vertical-align: middle;
    border: solid;
    border-radius: 10px;
    border-color: red;
    border-width: 0.1rem;
    background: white;
    margin-top: 20px;
    border-width: 0.25ch;
  }
  
  </style>