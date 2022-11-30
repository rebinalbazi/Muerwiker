<template>
  <button class="backButton">
    <img
      src="https://cdn-icons-png.flaticon.com/512/507/507257.png"
      style="width: 40px; padding-bottom: 5px;"
      onclick="history.back()"
    />
    <strong style="font-size: 20px; padding: 5px" onclick="history.back()">
        Zurück
    </strong>
  </button>
</template>

<style lang="scss">
.backButton {
    border: 0;
    background: transparent ;
}
</style>