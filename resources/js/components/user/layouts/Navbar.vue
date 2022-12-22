<template>
  <va-navbar color="#262824" shape class="mb-2">
    <template #left>
      <a class="navbar-brand" href="/">
        <img
          style="max-width: 100%; padding-right: 15px"
          src="https://www.muerwiker.de/typo3conf/ext/h2template/Resources/Public/Images/logomuerr.png"
          width="200"
        />
      </a>
    </template>

    <template #center>
      <va-collapse v-for="item in items" :key="item.title">
        <template #header>
          <va-sidebar-item style=" pointer-events: none;" :active="isRouteActive(item)">
            <div class="app-layout__sidebar-wrapper">
              <va-sidebar-item-content >
                <va-sidebar-item-title>
                  {{ item.displayName }}
                </va-sidebar-item-title>
              </va-sidebar-item-content>
            </div>
          </va-sidebar-item>
        </template>
      </va-collapse>
    </template>

    <template #right>
      <router-link :to="'/admin/ansprechpartner'" style="text-decoration: none; color: white">
        <div class="app-layout__sidebar-wrapper">
          <va-sidebar-item-content>
            <va-sidebar-item-title>Zum Admin</va-sidebar-item-title>
          </va-sidebar-item-content>
        </div>
      </router-link>
    </template>
  </va-navbar>
</template>

<script setup>
import { ref } from "vue";
import { useRoute } from "vue-router";
import NavigationRoutes from "../../../router/NavigationRoutes";

const items = ref(NavigationRoutes.routesUser);

// if route is activated
function isRouteActive(item) {
  return item.name === useRoute().name;
}

</script>

<style lang="scss">

.va-sidebar__item {
  text-decoration: none;
  color: unset !important;
  border-left: 0px;

  &__content {
    min-height: 65px;
    min-width: 90px;
    text-align: center;
    font-size: 15px;
  }
}

</style>