<template>
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
              <div class="infoTitle">
                <strong style="font-size: 17px">Name:</strong>
              </div>
              <div class="infoDescription">
                <strong style="font-size: 17px">{{ ansprechpartner1.name }} </strong>
              </div>
              <div class="infoTitle">
                <strong>Telefon:</strong>
              </div>
              <div class="infoDescription">
                <strong style="font-size: 17px">{{ ansprechpartner1.telefon }}</strong>
              </div>
              <div class="infoTitle" style="height: 57px">
                <strong style="font-size: 17px">Email:</strong>
              </div>
              <div class="infoDescription" style="height: 57px">
                <strong style="font-size: 17px; overflow-wrap: break-word;">
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
              <div class="infoTitle">
                <strong style="font-size: 17px">Name:</strong>
              </div>
              <div class="infoDescription">
                <strong style="font-size: 17px">{{ ansprechpartner2.name }}</strong>
              </div>
              <div class="infoTitle">
                <strong>Telefon:</strong>
              </div>
              <div class="infoDescription">
                <strong style="font-size: 17px">{{ ansprechpartner2.telefon }}</strong>
              </div>
              <div class="infoTitle" style="height: 57px">
                <strong style="font-size: 17px">Email:</strong>
              </div>
              <div class="infoDescription" style="height: 57px">
                <strong style="font-size: 17px; overflow-wrap: break-word;">
                  {{ ansprechpartner2.email }}
                  </strong>
              </div>
            </div>
          </div>
        </n-list-item>
      </n-list>
    </div>
  </div>
</template>

<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";
import { useRoute } from "vue-router";

const route = useRoute();

let ansprechpartner1 = ref({});

let ansprechpartner2 = ref({});

const getData = (art, param) => {
  axios.get("/api/ansprechpartner").then((response) => {
    axios.get("/api/" + art).then((r) => {
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

// .Infos{
//   background-color: rgb(44, 130, 224);
// }
</style>