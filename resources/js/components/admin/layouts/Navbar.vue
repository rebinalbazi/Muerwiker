<template>
  <va-navbar color="#262824" shape class="mb-2">
    <template #left>
      <va-navbar-item>Admin</va-navbar-item>
    </template>
    <template #right>
      <div class="app-navbar-actions">
        <div class="d-flex">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdownMenuLink"
                role="button"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                {{ user.name }}
              </a>
              <div
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="navbarDropdownMenuLink"
              >
                <a
                  class="dropdown-item"
                  href="javascript:void(0)"
                  @click="logout"
                  >Ausloggen</a
                >
              </div>
            </li>
          </ul>
        </div>
      </div>
    </template>
  </va-navbar>
</template>

<script>
import { mapActions } from "vuex";
export default {
  data() {
    return {
      user: this.$store.state.auth.user,
    };
  },
  methods: {
    ...mapActions({
      signOut: "auth/logout",
    }),
    async logout() {
      await axios.post("/logout").then(({ data }) => {
        this.signOut();
        this.$router.push({ name: "/" });
      });
    },
  },
};
</script>

<style lang="scss">
.va-navbar__item {
  color: #698dd7;
  font-size: 30px;
  border-left: 0px;
}
</style>