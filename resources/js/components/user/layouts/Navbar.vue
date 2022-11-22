<template>
  <va-navbar color="#262824" shape class="mb-2">
    <template #left>
      <va-navbar-item>Muerwiker</va-navbar-item>
    </template>
    <template #center>
      <va-collapse v-for="item in items" :key="item.title">
        <template #header>
          <va-sidebar-item :active="isRouteActive(item)" :to="item.name">
            <div class="app-layout__sidebar-wrapper">
              <va-accordion
                v-model="accordionValue"
                class="sidebar-accordion va-sidebar__menu__inner"
                multiply
              >
                <va-sidebar-item-content>
                  <va-sidebar-item-title>
                    {{ item.displayName }}
                  </va-sidebar-item-title>
                </va-sidebar-item-content>
              </va-accordion>
            </div>
          </va-sidebar-item>
        </template>
      </va-collapse>
    </template>

    <template #right>
      <app-navbar-actions class="app-navbar__actions" />
      <va-sidebar-item
        :active="isRouteActiveAdmin('admin/art')"
        :to="'admin/art'"
      >
        <div class="app-layout__sidebar-wrapper">
          <va-accordion>
            <va-sidebar-item-content>
              <va-sidebar-item-title> Zum Admin </va-sidebar-item-title>
            </va-sidebar-item-content>
          </va-accordion>
        </div>
      </va-sidebar-item>
    </template>
  </va-navbar>
</template>

<script setup>
import { ref } from "vue";
import { useRoute } from "vue-router";
import NavigationRoutes from "../../../router/NavigationRoutes";

const items = ref(NavigationRoutes.routesUser);

function isRouteActive(item) {
  return item.name === useRoute().name;
}

function isRouteActiveAdmin(item) {
  return item === useRoute().name;
}
</script>

<style lang="scss">
.va-navbar__item {
  color: #698dd7;
  font-size: 30px;
  border-left: 0px;
}
.va-sidebar__item {
  text-decoration: none;
  color: unset !important;
  border-left: 0px;

  &__content {
    min-height: 65px;
  }
}
.app-navbar__actions {
  padding-left: 50px;
}
</style>