<template>
  <div class="row">
    <va-card class="table">
      <div class="table-header">
        <h4 style="display: inline-block">Arbeit</h4>
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
          :data="arbeitData"
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
      <div>Arbeit hinzufügen</div>
    </template>
    <div>
      <n-form ref="formRef" label-placement="top">
        <n-grid :span="24" :x-gap="24">
          <n-form-item-gi :span="24" label="Ort*" path="ortValueCreate">
            <n-select
              v-model:value="ortValueCreate"
              :options="optionsOrt"
              placeholder="Ort"
            />
          </n-form-item-gi>

          <n-form-item-gi :span="24" label="Strasse*" path="strasseValueCreate">
            <n-input v-model:value="strasseValueCreate" placeholder="Strasse" />
          </n-form-item-gi>

          <n-form-item-gi
            :span="24"
            label="Arbeitsbereiche"
            path="arbeitsbereicheValueCreate"
          >
            <n-input
              v-model:value="arbeitsbereicheValueCreate"
              placeholder="Arbeitsbereiche"
            />
          </n-form-item-gi>

          <n-form-item-gi
            :span="24"
            label="Notfallnummer*"
            path="notfallnummerValueCreate"
          >
            <n-input
              v-model:value="notfallnummerValueCreate"
              placeholder="Notfallnummer"
            />
          </n-form-item-gi>

          <n-form-item-gi
            :span="24"
            label="Ansprechparner 1"
            path="a1ValueCreate"
          >
            <n-select
              v-model:value="a1ValueCreate"
              :options="
                optionsAnsprechpartner.filter((a) => {
                  return a.value !== a2ValueCreate;
                })
              "
              clearable
              placeholder="Ansprechparner 1"
              filterable
            />
          </n-form-item-gi>

          <n-form-item-gi
            :span="24"
            label="Ansprechparner 2"
            path="a2ValueCreate"
          >
            <n-select
              v-model:value="a2ValueCreate"
              :options="
                optionsAnsprechpartner.filter((a) => {
                  return a.value !== a1ValueCreate;
                })
              "
              clearable
              placeholder="Ansprechparner 2"
              filterable
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
      <div>Arbeit bearbeiten</div>
    </template>
    <div>
      <n-form ref="formRef" label-placement="top">
        <n-grid :span="24" :x-gap="24">
          <n-form-item-gi :span="24" label="Ort*" path="ortValueEdit">
            <n-space vertical>
              <n-select
                v-model:value="ortValueEdit"
                :options="optionsOrt"
                placeholder="Ort"
              />
            </n-space>
          </n-form-item-gi>

          <n-form-item-gi :span="24" label="Strasse*" path="strasseValueEdit">
            <n-input v-model:value="strasseValueEdit" placeholder="Strasse" />
          </n-form-item-gi>

          <n-form-item-gi
            :span="24"
            label="Arbeitsbereiche"
            path="arbeitsbereicheValueEdit"
          >
            <n-input
              v-model:value="arbeitsbereicheValueEdit"
              placeholder="Arbeitsbereiche"
            />
          </n-form-item-gi>

          <n-form-item-gi
            :span="24"
            label="Notfallnummer*"
            path="notfallnummerValueEdit"
          >
            <n-input
              v-model:value="notfallnummerValueEdit"
              placeholder="Notfallnummer"
            />
          </n-form-item-gi>

          <n-form-item-gi
            :span="24"
            label="Ansprechparner 1"
            path="a1ValueEdit"
          >
            <n-select
              v-model:value="a1ValueEdit"
              :options="
                optionsAnsprechpartner.filter((a) => {
                  return a.value !== a2ValueEdit;
                })
              "
              clearable
              placeholder="Ansprechparner 1"
              filterable
            />
          </n-form-item-gi>

          <n-form-item-gi
            :span="24"
            label="Ansprechparner 2"
            path="a2ValueEdit"
          >
            <n-select
              v-model:value="a2ValueEdit"
              :options="
                optionsAnsprechpartner.filter((a) => {
                  return a.value !== a1ValueEdit;
                })
              "
              clearable
              placeholder="Ansprechparner 2"
              filterable
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
    title="Arbeit löschen"
  >
    <div style="padding-bottom: 12.5px">
      Bist du dir sicher, dass du diesen Arbeit löschen möchtest?
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
import { onMounted, ref, reactive, h, watch } from "vue";
import { NButton } from "naive-ui";
import { useToast } from "vue-toastification";

const toast = useToast();

let showModalCreate = ref(false);
let showModalEdit = ref(false);
let showModalDelete = ref(false);

let ortValueCreate = ref(null);
let strasseValueCreate = ref(null);
let notfallnummerValueCreate = ref(null);
let arbeitsbereicheValueCreate = ref(null);
let a1ValueCreate = ref(null);
let a2ValueCreate = ref(null);

let arbeitCreate = ref({
  ort: ortValueCreate,
  strasse: strasseValueCreate,
  notfallnummer: notfallnummerValueCreate,
  arbeitsbereiche: arbeitsbereicheValueCreate,
  ansprechpartner1_id: a1ValueCreate,
  ansprechpartner2_id: a1ValueCreate !== null ? a2ValueCreate : null,
});

let idValueEdit = ref(null);
let ortValueEdit = ref(null);
let strasseValueEdit = ref(null);
let notfallnummerValueEdit = ref(null);
let arbeitsbereicheValueEdit = ref(null);
let a1ValueEdit = ref(null);
let a2ValueEdit = ref(null);

let arbeitEdit = ref({
  id: idValueEdit,
  ort: ortValueEdit,
  strasse: strasseValueEdit,
  notfallnummer: notfallnummerValueEdit,
  arbeitsbereiche: arbeitsbereicheValueEdit,
  ansprechpartner1_id: a1ValueEdit,
  ansprechpartner2_id: a2ValueEdit,
});

let deleteId = ref(null);

const pagination = ref({
  pageSize: 10,
});

const columns = reactive([
  {
    title: "Ort",
    key: "ort",
    sorter: "default",
    resizable: true,
  },
  {
    title: "Strasse",
    key: "strasse",
    sorter: "default",
    resizable: true,
  },
  {
    title: "Arbeitsbereiche",
    key: "arbeitsbereiche",
    sorter: "default",
    resizable: true,
  },
  {
    title: "Notfallnummer",
    key: "notfallnummer",
    sorter: "default",
    resizable: true,
  },
  {
    title: "Ansprechpartner 1",
    key: "ansprechpartner1_name",
    sorter: "default",
    resizable: true,
  },
  {
    title: "Ansprechpartner 2",
    key: "ansprechpartner2_name",
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

const optionsOrt = [
  {
    label: "Flensburg",
    value: "Flensburg",
  },
  {
    label: "Niebüll",
    value: "Niebüll",
  },
];

let optionsAnsprechpartner = ref([]);

let arbeitData = ref([]);
let ansprechpartnerData = ref([]);
let arbeitDataMerged = ref([]);

onMounted(() => {
  getData();
});

const getData = () => {
  axios.get("/api/arbeiten").then((response) => {
    arbeitData.value = response.data;
  });

  axios.get("/api/ansprechpartner").then((response) => {
    ansprechpartnerData.value = response.data;
    arbeitData.value.forEach((element) => {
      ansprechpartnerData.value.forEach((a) => {
        if (element.ansprechpartner1_id === a.id) {
          arbeitDataMerged.value = [
            ...arbeitDataMerged.value,
            Object.assign(element, { ansprechpartner1_name: a.name }),
          ];
        }
        if (element.ansprechpartner1_id === null) {
          arbeitDataMerged.value = [
            ...arbeitDataMerged.value,
            Object.assign(element, { ansprechpartner1_name: null }),
          ];
        }
        if (element.ansprechpartner2_id === a.id) {
          arbeitDataMerged.value = [
            ...arbeitDataMerged.value,
            Object.assign(element, { ansprechpartner2_name: a.name }),
          ];
        }
        if (element.ansprechpartner2_id === null) {
          arbeitDataMerged.value = [
            ...arbeitDataMerged.value,
            Object.assign(element, { ansprechpartner2_name: null }),
          ];
        }
        optionsAnsprechpartner.value = [
          ...optionsAnsprechpartner.value,
          Object.assign({ label: a.name, value: a.id }),
        ];
        optionsAnsprechpartner.value = optionsAnsprechpartner.value.filter(
          (a, index) =>
            index ===
            optionsAnsprechpartner.value.findIndex(
              (o) => a.label === o.label && a.value === o.value
            )
        );
      });
    });
  });
};

const createSubmitButton = () => {
  if (
    arbeitCreate.value.ort !== null &&
    arbeitCreate.value.ort !== "" &&
    arbeitCreate.value.strasse !== null &&
    arbeitCreate.value.strasse !== "" &&
    arbeitCreate.value.notfallnummer !== null &&
    arbeitCreate.value.notfallnummer !== ""
  ) {
    if (
      arbeitCreate.value.arbeitsbereiche === null ||
      arbeitCreate.value.arbeitsbereiche === ""
    ) {
      arbeitCreate.value.arbeitsbereiche =
        "https://cdn-icons-png.flaticon.com/512/1829/1829552.png";
      axios.post("/api/arbeiten", arbeitCreate.value);
      getData();
      cancelResetButton();
      toast.success("Arbeit wurde erstellt.", {
        timeout: 3000,
      });
    } else {
      axios.post("/api/arbeiten", arbeitCreate.value);
      getData();
      cancelResetButton();
      toast.success("Arbeit wurde erstellt.", {
        timeout: 3000,
      });
    }
  } else {
    toast.error("Bitte alle Pflichtfelder ausfüllen.", {
      timeout: 3000,
    });
  }
};

const cancelResetButton = () => {
  ortValueCreate.value = null;
  strasseValueCreate.value = null;
  notfallnummerValueCreate.value = null;
  arbeitsbereicheValueCreate.value = null;
  a1ValueCreate.value = null;
  a2ValueCreate.value = null;
  showModalCreate.value = false;
};

const editButton = (row) => {
  idValueEdit.value = row.id;
  ortValueEdit.value = row.ort;
  strasseValueEdit.value = row.strasse;
  notfallnummerValueEdit.value = row.notfallnummer;
  arbeitsbereicheValueEdit.value = row.arbeitsbereiche;
  a1ValueEdit.value = row.ansprechpartner1_id;
  a2ValueEdit.value = row.ansprechpartner2_id;
  showModalEdit.value = true;
};

const editSubmitButton = () => {
  if (
    arbeitEdit.value.ort !== null &&
    arbeitEdit.value.ort !== "" &&
    arbeitEdit.value.strasse !== null &&
    arbeitEdit.value.strasse !== "" &&
    arbeitEdit.value.notfallnummer !== null &&
    arbeitEdit.value.notfallnummer !== ""
  ) {
    if (
      arbeitEdit.value.arbeitsbereiche === null ||
      arbeitEdit.value.arbeitsbereiche === ""
    ) {
      arbeitCreate.value.arbeitsbereiche =
        "https://cdn-icons-png.flaticon.com/512/1829/1829552.png";
      axios.put(`/api/arbeiten/${arbeitEdit.value.id}`, arbeitEdit.value);
      getData();
      showModalEdit.value = false;
      toast.success("Gespeichert.", {
        timeout: 3000,
      });
    } else {
      axios.put(`/api/arbeiten/${arbeitEdit.value.id}`, arbeitEdit.value);
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

const deleteButton = (row) => {
  deleteId.value = row.id;
  showModalDelete.value = true;
};

const deleteSubmitButtton = (id) => {
  id = deleteId.value;
  axios.delete(`/api/arbeiten/${id}`);
  getData();
  showModalDelete.value = false;
  toast.success("Arbeit wurde gelöscht.", {
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

.n-form-item {
  .n-form-item-blank {
    display: unset;
  }
}
</style>
    