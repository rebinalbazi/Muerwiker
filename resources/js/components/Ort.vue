<template>
  <div class="row" v-if="route.params.art == 'wohnen' || route.params.art == 'arbeiten'">
    <div class="col-md-3"></div>
    <div class="col-md-3" style="padding: 12px" v-for="ort in orte" :key="ort.id">
      <router-link style="text-decoration: none" :to="`/${route.params.art}/${ort.urlName}`">
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
    <div class="col-md-3"></div>
  </div>

  <div class="row" v-if="route.params.art == 'tagesstaette'">
    <div class="col-md-3"></div>
    <div class="col-md-3" style="padding: 12px" v-for="ort in orte" :key="ort.id">
      <router-link style="text-decoration: none" :to="`/${route.params.art}/${ort.id}`">
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
    <div class="col-md-3"></div>
  </div>
</template>

<script setup>
  import axios from "axios";
  import { ref } from "vue";
  import { useRoute } from 'vue-router'

  const route = useRoute()

  let orte = ref([
    {
      id: "1",
      name: "Flensburg",
      iconPath:
        "https://i.postimg.cc/MKK7ps5y/csm-2010-05-21-1192-1-71acf82654-Cropped-1.jpg",
      urlName: "flensburg"
    },
    {
      id: "2",
      name: "Niebüll",
      iconPath: "https://i.postimg.cc/k4m83wDR/2435-210-1-g-Cropped.jpg",
      urlName: "niebuell"
    }
  ]);

</script>

<style lang="scss">

</style>