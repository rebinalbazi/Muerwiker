<template>
  <backButton />
  <span class="history" v-if="route.params.art == 'wohnen' || route.params.art == 'arbeiten'">{{
    route.params.art.charAt(0).toUpperCase() + route.params.art.slice(1) }} / {{ route.params.ort }} / </span>
  <div class="row" v-if="route.params.art == 'wohnen'">
    <div class="col-md-3" style="padding: 12px" v-for="w in wohnen.filter((t) => t['ort'] == route.params.ort)"
      :key="w.id">
      <router-link style="text-decoration: none" :to="`/${route.params.art}/${route.params.ort}/${w.id}`">
        <n-list hoverable bordered>
          <n-list-item style="padding: 12px; text-align: center; vertical-align: middle">
            <div>
              <img v-bind:src="w.imagePath" style="max-width: 100%; max-height: 150px" />
            </div>
            <hr>
            <h3 style="text-transform: none; text-align: center">
              <strong>{{ w.strasse }}</strong>
            </h3>
          </n-list-item>
        </n-list>
      </router-link>
    </div>
    <div class="row" bordered v-if="((wohnen.filter((t) => t['ort'] == route.params.ort)).length === 0)">
      <div class="col-md-8">
        <n-list>
          <n-list-item style="padding: 12px; min-height: 160px; text-align: center; vertical-align: middle">
            <div class="row">
              <h3><strong>Keine Daten vorhanden</strong></h3>
            </div>
          </n-list-item>
        </n-list>
      </div>
      <div class="col-md-1">
        <router-link style="text-decoration: none" :to="`/`">
          <button class="homeButton" style="padding: 12px; width: 160px">
            <img src="https://cdn-icons-png.flaticon.com/512/25/25694.png"
              style="max-width: 70px; margin-left: auto; margin-right: auto; display: block;" />
            <h4>
              <strong>Home</strong>
            </h4>
          </button>
        </router-link>
      </div>
    </div>
  </div>

  <div class="row" v-if="route.params.art == 'arbeiten'">
    <div class="col-md-4" style="padding: 12px" v-for="a in arbeiten.filter((t) => t['ort'] == route.params.ort)"
      :key="a.id">
      <router-link style="text-decoration: none" :to="`/${route.params.art}/${route.params.ort}/${a.id}`">
        <n-list hoverable bordered style="min-width: 100%;">
          <n-list-item style="padding: 12px; text-align: center; vertical-align: middle;">
            <div style="text-align: left">
              <h3 style="text-transform: none; text-align: center">
                <strong style="font-size: 24px">{{ a.strasse }}</strong>
              </h3>
              <hr>
              <h5 style="text-transform: none;">
                <strong style="font-size: 21px">Arbeitsbereiche:</strong>
              </h5>
              <form style="min-height: 90px; font-size: 19px;">
                {{ a.arbeitsbereiche }}
              </form>
            </div>
          </n-list-item>
        </n-list>
      </router-link>
    </div>
    <div class="row" bordered v-if="((arbeiten.filter((t) => t['ort'] == route.params.ort)).length === 0)">
      <div class="col-md-8">
        <n-list>
          <n-list-item style="padding: 12px; min-height: 160px; text-align: center; vertical-align: middle">
            <div class="row">
              <h3><strong>Keine Daten vorhanden</strong></h3>
            </div>
          </n-list-item>
        </n-list>
      </div>
      <div class="col-md-1">
        <router-link style="text-decoration: none" :to="`/`">
          <button class="homeButton" style="padding: 12px; width: 160px">
            <img src="https://cdn-icons-png.flaticon.com/512/25/25694.png"
              style="max-width: 70px; margin-left: auto; margin-right: auto; display: block;" />
            <h4>
              <strong>Home</strong>
            </h4>
          </button>
        </router-link>
      </div>
    </div>
  </div>

</template>

<script setup>
  import BackButton from "../layouts/BackButton.vue";
  import axios from "axios";
  import { ref } from "vue";
  import { useRoute } from "vue-router";

  const route = useRoute();
  let wohnen = ref([]);
  let arbeiten = ref([]);

  axios.get("/api/wohnen").then((response) => {
    wohnen.value = response.data;
  });

  axios.get("/api/arbeiten").then((response) => {
    arbeiten.value = response.data;
  });

</script>

<style lang="scss">
  .history {
    font-size: 15px;
    padding-left: 30px;
  }
</style>