<template>
  <div class="row" v-if="route.params.art == 'wohnen'">
    <div class="col-md-3" style="padding: 12px"
      v-for="w in wohnen.filter((t) => t['ort'] == route.params.ort)" :key="w.id">
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
  </div>

  <div class="row" v-if="route.params.art == 'arbeiten'">
    <div class="col-md-3" style="padding: 12px"
      v-for="a in arbeiten.filter((t) => t['ort'] == route.params.ort)"
      :key="a.id">
      <router-link style="text-decoration: none" :to="`/${route.params.art}/${route.params.ort}/${a.id}`">
        <n-list hoverable bordered  style="min-width: 100%;">
          <n-list-item style="padding: 12px; text-align: center; vertical-align: middle;">
            <div style="text-align: left">
              <h3 style="text-transform: none; text-align: center">
                <strong style="font-size: 17px">{{ a.strasse }}</strong>
              </h3>
              <hr>
              <h5 style="text-transform: none;">
                <strong style="font-size: 15px">Arbeitsbereiche:</strong>
              </h5>
              {{ a.arbeitsbereiche }}
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

</style>