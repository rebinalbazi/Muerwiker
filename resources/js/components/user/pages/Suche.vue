<template>
    <router-link style="text-decoration: none" :to="`/`">
      <button class="backButton">
        <img
          src="https://cdn-icons-png.flaticon.com/512/2722/2722991.png"
          style="width: 40px; padding-bottom: 6px"
        />
        <strong style="font-size: 20px" onclick="history.back()"> Zurück </strong>
      </button>
    </router-link>
    <div class="row">
      <div class="col-md-9">
        <va-card class="table">
          <va-card-content style="padding: 0px">
            <n-data-table
              :bordered="true"
              :columns="columns"
              :data="ansprechpartner"
              :pagination="pagination"
            />
          </va-card-content>
        </va-card>
      </div>
  
      <div class="col-md-3">
        <router-link style="text-decoration: none" :to="`/`">
          <button class="homeButton" style="padding: 12px; width: 160px">
            <img
              src="https://cdn-icons-png.flaticon.com/512/25/25694.png"
              style="
                max-width: 70px;
                margin-left: auto;
                margin-right: auto;
                display: block;
              "
            />
            <h4>
              <strong>Home</strong>
            </h4>
          </button>
        </router-link>
      </div>
    </div>
  </template>
  
  <script setup>
  import BackButton from "./user/layouts/BackButton.vue";
  import axios from "axios";
  import { onMounted, ref, reactive } from "vue";
  import { useRoute } from "vue-router";
  
  const route = useRoute();
  
  const pagination = ref({
    pageSize: 10,
  });
  
  const columns = reactive([
    {
      title: "name",
      key: "name",
      sorter: "default",
    },
    {
      title: "Telefon",
      key: "telefon",
      sorter: "default",
    },
    {
      title: "Email",
      key: "email",
      sorter: "default",
    },
  ]);
  
  let ansprechpartner = ref([]);
  
  onMounted(() => {
    axios.get("/api/ansprechpartner").then((response) => {
      ansprechpartner.value = response.data;
    });
  
    if (route.params.length !== 0) {
      axios.get("/api/ansprechpartner").then((response) => {
        ansprechpartner.value = response.data.filter((t) =>
          t["name"].toLowerCase().includes(route.params.infos.toLowerCase())
        );
      });
    }
  });
  </script>
  
  <style lang="scss">
  .table {
    border-radius: 10px;
    border-color: black;
    border-width: 0.25ch;
  }
  
  .homeButton {
    border-radius: 10px;
    background: white;
    border-color: #418bca;
    border-width: 0.25ch;
  }
  
  .backButton {
    border: 0;
    background: transparent;
  }
  </style>