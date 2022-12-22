<template>
  <div class="row">
    <va-card class="table">
      <div class="table-header">
        <h4 style="display: inline-block">Ansprechpartner</h4>
        <button class="addButton" @click="showModalCreate = true">
          <img
            src="https://cdn-icons-png.flaticon.com/512/3524/3524388.png"
            style="width: 25px"
          />
        </button>
      </div>
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
    class="createModal"
    v-bind:on-after-leave="cancelResetButton"
    v-model:show="showModalCreate"
    preset="card"
    style="margin: 0% 13% 3% 13%"
  >
    <template #header>
      <div>Ansprechpartner hinzufügen</div>
    </template>
    <div>
      <n-form ref="formRef" label-placement="top">
        <n-grid :span="24" :x-gap="24">
          <n-form-item-gi :span="24" label="Name*" path="nameValueCreate">
            <n-input v-model:value="nameValueCreate" placeholder="Name" />
          </n-form-item-gi>

          <n-form-item-gi :span="24" label="Telefon*" path="telefonValueCreate">
            <n-input v-model:value="telefonValueCreate" placeholder="Telefon" />
          </n-form-item-gi>

          <n-form-item-gi :span="24" label="Email*" path="emailValueCreate">
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
              <n-button
                type="error"
                @click="cancelResetButton()"
                style="margin-left: 5px"
              >
                Abbrechen
              </n-button>
            </div>
            <small>*Pflichtfelder</small>
          </n-gi>
        </n-grid>
      </n-form>
    </div>
  </n-modal>
  <n-modal
    class="editModal"
    v-model:show="showModalEdit"
    preset="card"
    style="margin: 0% 13% 3% 13%"
  >
    <template #header>
      <div>Ansprechpartner bearbeiten</div>
    </template>
    <div>
      <n-form ref="formRef" label-placement="top">
        <n-grid :span="24" :x-gap="24">
          <n-form-item-gi :span="24" label="Name*" path="nameValueEdit">
            <n-input v-model:value="nameValueEdit" placeholder="Name" />
          </n-form-item-gi>

          <n-form-item-gi :span="24" label="Telefon*" path="telefonValueEdit">
            <n-input v-model:value="telefonValueEdit" placeholder="Telefon" />
          </n-form-item-gi>

          <n-form-item-gi :span="24" label="Email*" path="emailValueEdit">
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
              <n-button
                type="error"
                @click="showModalEdit = false"
                style="margin-left: 5px"
              >
                Abbrechen
              </n-button>
            </div>
            <small>*Pflichtfelder</small>
          </n-gi>
        </n-grid>
      </n-form>
    </div>
  </n-modal>
  <n-modal
    class="deleteModal"
    v-model:show="showModalDelete"
    preset="dialog"
    title="Ansprechpartner löschen"
  >
    <div style="padding-bottom: 12.5px">
      Bist du dir sicher, dass du diesen Ansprechpartner löschen möchtest?
    </div>
    <n-button type="info" @click="deleteSubmitButtton()"> Bestätigen </n-button>
    <n-button
      type="error"
      @click="showModalDelete = false"
      style="margin-left: 5px"
    >
      Abbrechen
    </n-button>
  </n-modal>
</template>

<script setup>
import axios from "axios";
import { onMounted, ref, reactive, h } from "vue";
import { NButton } from "naive-ui";
import { useToast } from "vue-toastification";

const toast = useToast();

let ansprechpartnerData = ref([]);
let showModalCreate = ref(false);
let showModalEdit = ref(false);
let showModalDelete = ref(false);

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

let deleteId = ref(null);

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
        {
          default: () =>
            h("img", {
              width: "20",
              src: "https://cdn-icons-png.flaticon.com/512/2985/2985043.png",
            }),
        }
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
          onClick: () => deleteButton(row),
        },
        {
          default: () =>
            h("img", {
              width: "17.5",
              src: "https://cdn-icons-png.flaticon.com/512/1214/1214428.png",
            }),
        }
      );
    }
  }
]);

onMounted(() => {
  getData();
});

//get all ansprechpartner data 
const getData = () => {
  axios.get("/api/ansprechpartner").then((response) => {
    ansprechpartnerData.value = response.data;
  });
};

// on click submit Button to create new ansprechpartner
const createSubmitButton = () => {
  if (
    ansprechpartnerCreate.value.name !== null &&
    ansprechpartnerCreate.value.name !== "" &&
    ansprechpartnerCreate.value.telefon !== null &&
    ansprechpartnerCreate.value.telefon !== "" &&
    ansprechpartnerCreate.value.email !== null &&
    ansprechpartnerCreate.value.email !== ""
  ) {
    if (
      ansprechpartnerCreate.value.imagePath === null ||
      ansprechpartnerCreate.value.imagePath === ""
    ) {
      ansprechpartnerCreate.value.imagePath =
        "https://cdn-icons-png.flaticon.com/512/666/666201.png";
      axios.post("/api/ansprechpartner", ansprechpartnerCreate.value);
      getData();
      cancelResetButton();
      toast.success("Ansprechpartner wurde erstellt.", {
        timeout: 3000,
      });
    } else {
      axios.post("/api/ansprechpartner", ansprechpartnerCreate.value);
      getData();
      cancelResetButton();
      toast.success("Ansprechpartner wurde erstellt.", {
        timeout: 3000,
      });
    }
  } else {
    toast.error("Bitte alle Pflichtfelder ausfüllen.", {
      timeout: 3000,
    });
  }
};

// canel button that reset current data and close modal
const cancelResetButton = () => {
  nameValueCreate.value = null;
  telefonValueCreate.value = null;
  emailValueCreate.value = null;
  imagePathValueCreate.value = null;
  showModalCreate.value = false;
};

// to assign current data to edit modal field 
const editButton = (row) => {
  idValueEdit.value = row.id;
  nameValueEdit.value = row.name;
  telefonValueEdit.value = row.telefon;
  emailValueEdit.value = row.email;
  imagePathValueEdit.value = row.imagePath;
  showModalEdit.value = true;
};

// on click submit button to save changes
const editSubmitButton = () => {
  if (
    ansprechpartnerEdit.value.name !== null &&
    ansprechpartnerEdit.value.name !== "" &&
    ansprechpartnerEdit.value.telefon !== null &&
    ansprechpartnerEdit.value.telefon !== "" &&
    ansprechpartnerEdit.value.email !== null &&
    ansprechpartnerEdit.value.email !== ""
  ) {
    if (
      ansprechpartnerEdit.value.imagePath === null ||
      ansprechpartnerEdit.value.imagePath === ""
    ) {
      ansprechpartnerCreate.value.imagePath =
        "https://cdn-icons-png.flaticon.com/512/666/666201.png";
      axios.put(
        `/api/ansprechpartner/${ansprechpartnerEdit.value.id}`,
        ansprechpartnerEdit.value
      );
      getData();
      showModalEdit.value = false;
      toast.success("Gespeichert.", {
        timeout: 3000,
      });
    } else {
      axios.put(
        `/api/ansprechpartner/${ansprechpartnerEdit.value.id}`,
        ansprechpartnerEdit.value
      );
      getData();
      showModalEdit.value = false;
      toast.success("Gespeichert.", {
        timeout: 3000,
      });
    }
  } else {
    toast.error("Bitte alle Pflichtfelder ausfüllen.", {
      timeout: 3000,
    });
  }
};

// delete button to open warning modal with assign current id
const deleteButton = (row) => {
  deleteId.value = row.id;
  showModalDelete.value = true;
};

// on click delete button to delete ansprechpartner from database
const deleteSubmitButtton = (id) => {
  id = deleteId.value;
  axios.delete(`/api/ansprechpartner/${id}`);
  getData();
  showModalDelete.value = false;
  toast.success("Ansprechpartner wurde gelöscht.", {
    timeout: 3000,
  });
};
</script>

<style lang="scss">
.addButton {
  background: none;
  border-width: 0px;
  border-bottom: 0px;
  float: right;
}
.n-base-icon {
  height: 1.25em;
}

.table-header {
  padding: 10px 10px 0px 0px;
}
</style>
