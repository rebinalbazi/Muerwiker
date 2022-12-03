<template>
  <button class="addButton" @click="showModalCreate = true">
    <img
      src="https://cdn-icons-png.flaticon.com/512/3524/3524388.png"
      style="width: 25px"
    />
  </button>
  <div class="row">
    <va-card class="table">
      <va-card-content style="padding: 0px">
        <n-data-table
          :bordered="true"
          :columns="columns"
          :data="ansprechpartnerData"
          :pagination="pagination"
        />
      </va-card-content>
    </va-card>
  </div>
  <n-modal
    class="editModal"
    v-model:show="showModalCreate"
    preset="card"
    style="margin: 0% 13% 16% 13%"
  >
    <template #header>
      <div>Ansprechperson hinzufügen</div>
    </template>
    <div>
      <n-form ref="formRef" label-placement="top">
        <n-grid :span="24" :x-gap="24">
          <n-form-item-gi :span="24" label="Name" path="nameValueCreate">
            <n-input v-model:value="nameValueCreate" placeholder="Name" />
          </n-form-item-gi>

          <n-form-item-gi :span="24" label="Telefon" path="telefonValueCreate">
            <n-input v-model:value="telefonValueCreate" placeholder="Telefon" />
          </n-form-item-gi>

          <n-form-item-gi :span="24" label="Email" path="emailValueCreate">
            <n-input v-model:value="emailValueCreate" placeholder="Email" />
          </n-form-item-gi>

          <n-form-item-gi
            :span="24"
            label="Bild URL"
            path="imagePathValueCreate"
          >
            <n-input
              v-model:value="imagePathValueCreate"
              placeholder="Bild URL"
            />
          </n-form-item-gi>

          <n-gi :span="24">
            <div style="display: flex; justify-content: flex">
              <n-button type="info" @click="createSubmitButton()">
                Erstellen
              </n-button>
            </div>
          </n-gi>
        </n-grid>
      </n-form>
    </div>
  </n-modal>
  <n-modal
    class="createModal"
    v-model:show="showModalEdit"
    preset="card"
    style="margin: 0% 13% 16% 13%"
  >
    <template #header>
      <div>Ansprechperson bearbeiten</div>
    </template>
    <div>
      <n-form ref="formRef" label-placement="top">
        <n-grid :span="24" :x-gap="24">
          <n-form-item-gi :span="24" label="Name" path="nameValueEdit">
            <n-input v-model:value="nameValueEdit" placeholder="Name" />
          </n-form-item-gi>

          <n-form-item-gi :span="24" label="Telefon" path="telefonValueEdit">
            <n-input v-model:value="telefonValueEdit" placeholder="Telefon" />
          </n-form-item-gi>

          <n-form-item-gi :span="24" label="Email" path="emailValueEdit">
            <n-input v-model:value="emailValueEdit" placeholder="Email" />
          </n-form-item-gi>

          <n-form-item-gi :span="24" label="Bild URL" path="imagePathValueEdit">
            <n-input
              v-model:value="imagePathValueEdit"
              placeholder="Bild URL"
            />
          </n-form-item-gi>

          <n-gi :span="24">
            <div style="display: flex; justify-content: flex">
              <n-button type="info" @click="editSubmitButton()">
                Bestätigen
              </n-button>
            </div>
          </n-gi>
        </n-grid>
        {{ ansprechpartnerEdit }}
      </n-form>
    </div>
  </n-modal>
</template>

<script setup>
import axios from "axios";
import { onMounted, ref, reactive, h } from "vue";
import { NButton } from "naive-ui";

let ansprechpartnerData = ref([]);
let showModalCreate = ref(false);
let showModalEdit = ref(false);

let nameValueCreate = ref(null);
let telefonValueCreate = ref(null);
let emailValueCreate = ref(null);
let imagePathValueCreate = ref(null);

let ansprechpartnerCreate = ref({
  name: nameValueCreate,
  telefon: telefonValueCreate,
  email: emailValueCreate,
  imagePath: imagePathValueCreate,
});

let idValueEdit = ref(null);
let nameValueEdit = ref(null);
let telefonValueEdit = ref(null);
let emailValueEdit = ref(null);
let imagePathValueEdit = ref(null);

let ansprechpartnerEdit = ref({
  id: idValueEdit,
  name: nameValueEdit,
  telefon: telefonValueEdit,
  email: emailValueEdit,
  imagePath: imagePathValueEdit,
});

const pagination = ref({
  pageSize: 10,
});

const columns = reactive([
  {
    title: "Name",
    key: "name",
    sorter: "default",
    resizable: true,
  },
  {
    title: "Telefon",
    key: "telefon",
    sorter: "default",
    resizable: true,
  },
  {
    title: "Email",
    key: "email",
    sorter: "default",
    resizable: true,
  },
  {
    key: "actionsEdit",
    width: 0,
    render(row) {
      return h(
        NButton,
        {
          size: "small",
          onClick: () => editButton(row),
        },
        { default: () => "Bearbeiten" }
      );
    },
  },
  {
    key: "actionsDelete",
    width: 0,
    render(row) {
      return h(
        NButton,
        {
          size: "small",
          onClick: () => console.log(row),
        },
        { default: () => "Löschen" }
      );
    },
  },
]);

onMounted(() => {
  axios.get("/api/ansprechpartner").then((response) => {
    ansprechpartnerData.value = response.data;
  });
});

const createSubmitButton = () => {
  axios.post("/api/ansprechpartner", ansprechpartnerCreate.value);
  window.location.reload();
};

const editSubmitButton = () => {
  axios.put("/api/ansprechpartner/", ansprechpartnerEdit.value);
  //window.location.reload();
};

const editButton = (row) => {
  idValueEdit.value = row.id;
  nameValueEdit.value = row.name;
  telefonValueEdit.value = row.telefon;
  emailValueEdit.value = row.email;
  imagePathValueEdit.value = row.imagePath;
  showModalEdit.value = true;
};
</script>

<style lang="scss">
.addButton {
  background: none;
  border-width: 0px;
  padding-bottom: 15px;
  margin-left: -10px;
}
</style>
