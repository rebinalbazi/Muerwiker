<template>
  <va-sidebar color="#262824" style="width: 12rem">
      <va-collapse v-for="item in items" :key="item.title">
        <template #header>
          <va-sidebar-item :active="isRouteActive(item)" :to="item.name">
            <va-sidebar-item-content>
              <va-sidebar-item-title style="flex-grow:0">
                {{ item.displayName }}
              </va-sidebar-item-title>
            </va-sidebar-item-content>
          </va-sidebar-item>
        </template>
      </va-collapse>
      <va-collapse>
        <template #header>
          <va-sidebar-item :to="'/'" style="position: absolute; bottom: 0">
            <va-sidebar-item-content>
              <va-sidebar-item-title>
                Zum Anwender Bereich
              </va-sidebar-item-title>
            </va-sidebar-item-content>
          </va-sidebar-item>
        </template>
      </va-collapse>
  </va-sidebar>
</template>

<script setup>
import { ref } from "vue";
import { useRoute } from "vue-router";
import NavigationRoutes from "../../../router/NavigationRoutes";

const items = ref(NavigationRoutes.routesAdmin);

function isRouteActive(item) {
  return item.name === useRoute().name;
}

function isRouteActiveUser(item) {
  return item === useRoute().name;
}
</script>
    
<style lang="scss">
$mobileBreakPointPX: 640px;
$tabletBreakPointPX: 768px;

.va-sidebar {
  &-item {
    text-decoration: none;
    color: unset !important;
    border-left: 0px;
    &__icon {
      width: 1.5rem;
      height: 1.5rem;
      display: flex;
      justify-content: center;
      align-items: center;
    }
  }
}

.gutter {
  padding: 2rem;
  box-sizing: border-box;
  max-width: 100%;
}
</style>