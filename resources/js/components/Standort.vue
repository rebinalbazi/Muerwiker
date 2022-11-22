<template>
  <div class="standort">
    <div class="row row-equal">
      <div class="flex xs12 x16">
        <va-card>
          <va-card-title>
            <h4 style="text-transform: none">Standort</h4>
          </va-card-title>
          <va-card-content style="padding-left: 10px; padding-left: 10px">
          </va-card-content>
        </va-card>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { defineComponent, ref } from "vue";

export default defineComponent({
  setup() {

  }
});
</script>

  
<style lang="scss">
.standort {
  .va-card {
    margin-bottom: 0 !important;
    &__title {
      display: flex;
      justify-content: space-between;
    }
  }
  margin: 0rem 0rem 0rem 0rem;
}

</style>
  