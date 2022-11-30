<template>
  <button class="backButton">
    <img
      src="https://cdn-icons-png.flaticon.com/512/2722/2722991.png"
      style="width: 40px; padding-bottom: 6px;"
      onclick="history.back()"
    />
    <strong style="font-size: 20px;" onclick="history.back()">
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