<template>
  <div class="row" v-if="route.params.art == 'wohnen'">
    <div class="col-md-3" style="padding: 12px"
      v-for="standort in standorte.filter((t) =>t['art'] == route.params.art && t['ort'] == route.params.ort)" :key="standort.id">
      <router-link style="text-decoration: none" :to="`/${route.params.art}/${route.params.ort}/${standort.id}`">
        <n-list hoverable bordered>
          <n-list-item style="padding: 12px; text-align: center; vertical-align: middle">
            <div>
              <img v-bind:src="standort.imagePath" style="max-width: 100%; max-height: 150px" />
            </div>
            <hr>
            <h3 style="text-transform: none; text-align: center">
              <strong>{{ standort.straße }}</strong>
            </h3>
          </n-list-item>
        </n-list>
      </router-link>
    </div>
  </div>

  <div class="row" v-if="route.params.art == 'arbeit'">
    <div class="col-md-3" style="padding: 12px"
      v-for="standort in standorte.filter((t) =>t['art'] == route.params.art && t['ort'] == route.params.ort)"
      :key="standort.id">
      <router-link style="text-decoration: none" :to="`/${route.params.art}/${route.params.ort}/${standort.id}`">
        <n-list hoverable bordered  style="min-width: 100%;">
          <n-list-item style="padding: 12px; text-align: center; vertical-align: middle;">
            <div style="text-align: left">
              <h3 style="text-transform: none; text-align: center">
                <strong style="font-size: 17px">{{ standort.straße }}</strong>
              </h3>
              <hr>
              <h5 style="text-transform: none;">
                <strong style="font-size: 15px">Arbeitsbereiche:</strong>
              </h5>
              {{ standort.arbeitsbereiche }}
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

  const standorte = ref([
    {
      id: "0",
      art: "wohnen",
      ort: "flensburg",
      straße: "Terassenstraße",
      imagePath: "https://cdn-icons-png.flaticon.com/512/1829/1829552.png",
      arbeitsbereiche: ""
    },
    {
      id: "1",
      art: "wohnen",
      ort: "flensburg",
      straße: "Treeneweg",
      imagePath: "https://cdn-icons-png.flaticon.com/512/1829/1829552.png",
      arbeitsbereiche: ""
    },
    {
      id: "2",
      art: "wohnen",
      ort: "flensburg",
      straße: "Mürwiker Str",
      imagePath: "https://cdn-icons-png.flaticon.com/512/1829/1829552.png",
      arbeitsbereiche: ""
    },
    {
      id: "3",
      art: "wohnen",
      ort: "flensburg",
      straße: "Moltkestraße",
      imagePath: "https://cdn-icons-png.flaticon.com/512/1829/1829552.png",
      arbeitsbereiche: ""
    },
    {
      id: "4",
      art: "wohnen",
      ort: "flensburg",
      straße: "ABW",
      imagePath: "https://cdn-icons-png.flaticon.com/512/1829/1829552.png",
      arbeitsbereiche: ""
    },
    {
      id: "5",
      art: "wohnen",
      ort: "flensburg",
      straße: "Rabenholz",
      imagePath: "https://cdn-icons-png.flaticon.com/512/1829/1829552.png",
      arbeitsbereiche: ""
    },
    {
      id: "6",
      art: "wohnen",
      ort: "flensburg",
      straße: "Skolehaven",
      imagePath: "https://cdn-icons-png.flaticon.com/512/1829/1829552.png",
      arbeitsbereiche: ""
    },
    {
      id: "7",
      art: "wohnen",
      ort: "flensburg",
      straße: "Mittendrin",
      imagePath: "https://cdn-icons-png.flaticon.com/512/1829/1829552.png",
      arbeitsbereiche: ""
    },
    {
      id: "8",
      art: "wohnen",
      ort: "niebuell",
      straße: "Buchenweg",
      imagePath: "https://cdn-icons-png.flaticon.com/512/1829/1829552.png",
      arbeitsbereiche: ""
    },
    {
      id: "9",
      art: "wohnen",
      ort: "niebuell",
      straße: "Schreberweg",
      imagePath: "https://cdn-icons-png.flaticon.com/512/1829/1829552.png",
      arbeitsbereiche: ""
    },
    {
      id: "10",
      art: "wohnen",
      ort: "niebuell",
      straße: "Weberstraße",
      imagePath: "https://cdn-icons-png.flaticon.com/512/1829/1829552.png",
      arbeitsbereiche: ""
    },
    {
      id: "11",
      art: "wohnen",
      ort: "niebuell",
      straße: "Theodor-Storm-Straße",
      imagePath: "https://cdn-icons-png.flaticon.com/512/1829/1829552.png",
      arbeitsbereiche: ""
    },
    {
      id: "12",
      art: "arbeit",
      ort: "flensburg",
      straße: "Raiffeisenstraße 12-14",
      imagePath: "",
      arbeitsbereiche: "Elektro, Montage, Verpackung, Bändermontage, Lebensmittel"
    },
    {
      id: "13",
      art: "arbeit",
      ort: "flensburg",
      straße: "Raiffeisenstraße 8c",
      imagePath: "",
      arbeitsbereiche: "Kaminholz"
    },
    {
      id: "14",
      art: "arbeit",
      ort: "flensburg",
      straße: "Raiffeisenstraße 17",
      imagePath: "",
      arbeitsbereiche: "Gärtnerei"
    },
    {
      id: "15",
      art: "arbeit",
      ort: "flensburg",
      straße: "Wittenberger Weg 10",
      imagePath: "",
      arbeitsbereiche: "Lebensmittelverpackung (LeMi)"
    },
    {
      id: "16",
      art: "arbeit",
      ort: "flensburg",
      straße: "Raiffeisenstraße 21",
      imagePath: "",
      arbeitsbereiche: "Danfoss"
    },
    {
      id: "17",
      art: "arbeit",
      ort: "flensburg",
      straße: "Glyngöre",
      imagePath: "",
      arbeitsbereiche: "Spektrum, Holz"
    },
    {
      id: "18",
      art: "arbeit",
      ort: "flensburg",
      straße: "Westerallee",
      imagePath: "",
      arbeitsbereiche: "Spektrum, Verpackung, Nähen, GHC"
    },
    {
      id: "19",
      art: "arbeit",
      ort: "flensburg",
      straße: "Gewerbegrund",
      imagePath: "",
      arbeitsbereiche: "Metall, Verpackung, Montage"
    },
    {
      id: "20",
      art: "arbeit",
      ort: "flensburg",
      straße: "Treeneweg 10",
      imagePath: "",
      arbeitsbereiche: "Verpackung, Montage, Besen und Bürsten, LebensArt"
    },
    {
      id: "21",
      art: "arbeit",
      ort: "niebuell",
      straße: "Nova",
      imagePath: "",
      arbeitsbereiche: "Nähen, Lego, Bürodienstleistungen, Elektro"
    },
    {
      id: "22",
      art: "arbeit",
      ort: "niebuell",
      straße: "Fritz-Jannsen-Straße",
      imagePath: "",
      arbeitsbereiche: "Montage, KFZ-Pflege, Verpackung"
    },
    {
      id: "23",
      art: "arbeit",
      ort: "niebuell",
      straße: "Weberstraße",
      imagePath: "",
      arbeitsbereiche: "Elektro, Küche"
    },
    {
      id: "24",
      art: "arbeit",
      ort: "niebuell",
      straße: "Schmiedestraße",
      imagePath: "",
      arbeitsbereiche: "Holz , Garten"
    },
    {
      id: "25",
      art: "arbeit",
      ort: "niebuell",
      straße: "Bahnhofstraße",
      imagePath: "",
      arbeitsbereiche: "Lager"
    }
  ]);

</script>

<style lang="scss">

</style>