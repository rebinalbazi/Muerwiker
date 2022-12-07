<template>
  <div class="row">
    <va-card class="table">
      <div class="table-header">
        <h4 style="display: inline-block">Sonstige</h4>
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
          :data="sonstigeData"
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
      <div>Sonstige hinzufügen</div>
    </template>
    <div>
      <n-form ref="formRef" label-placement="top">
        <n-grid :span="24" :x-gap="24">
          <n-form-item-gi :span="24" label="Bereich*" path="bereichValueCreate">
            <n-input v-model:value="bereichValueCreate" placeholder="Bereich" />
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

          <n-form-item-gi
            :span="24"
            label="Icon URL"
            path="iconPathValueCreate"
          >
            <n-input
              v-model:value="iconPathValueCreate"
              placeholder="Icon URL"
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
      <div>Sonstige bearbeiten</div>
    </template>
    <div>
      <n-form ref="formRef" label-placement="top">
        <n-grid :span="24" :x-gap="24">
          <n-form-item-gi :span="24" label="Bereich*" path="bereichValueEdit">
            <n-input v-model:value="bereichValueEdit" placeholder="Bereich" />
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

          <n-form-item-gi :span="24" label="Icon URL" path="iconPathValueEdit">
            <n-input v-model:value="iconPathValueEdit" placeholder="Icon URL" />
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
    title="Sonstige löschen"
  >
    <div style="padding-bottom: 12.5px">
      Bist du dir sicher, dass du diesen Sonstige löschen möchtest?
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

let bereichValueCreate = ref(null);
let notfallnummerValueCreate = ref(null);
let iconPathValueCreate = ref(null);
let a1ValueCreate = ref(null);
let a2ValueCreate = ref(null);

let sonstigeCreate = ref({
  bereich: bereichValueCreate,
  notfallnummer: notfallnummerValueCreate,
  iconPath: iconPathValueCreate,
  ansprechpartner1_id: a1ValueCreate,
  ansprechpartner2_id: a1ValueCreate !== null ? a2ValueCreate : null,
});

let idValueEdit = ref(null);
let bereichValueEdit = ref(null);
let notfallnummerValueEdit = ref(null);
let iconPathValueEdit = ref(null);
let a1ValueEdit = ref(null);
let a2ValueEdit = ref(null);

let sonstigeEdit = ref({
  id: idValueEdit,
  bereich: bereichValueEdit,
  notfallnummer: notfallnummerValueEdit,
  iconPath: iconPathValueEdit,
  ansprechpartner1_id: a1ValueEdit,
  ansprechpartner2_id: a2ValueEdit,
});

let deleteId = ref(null);

const pagination = ref({
  pageSize: 10,
});

const columns = reactive([
  {
    title: "Bereich",
    key: "bereich",
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
    },
  },
]);

let optionsAnsprechpartner = ref([]);

let sonstigeData = ref([]);
let ansprechpartnerData = ref([]);
let sonstigeDataMerged = ref([]);

onMounted(() => {
  getData();
});

const getData = () => {
  axios.get("/api/sonstige").then((response) => {
    sonstigeData.value = response.data;
  });

  axios.get("/api/ansprechpartner").then((response) => {
    ansprechpartnerData.value = response.data;
    sonstigeData.value.forEach((element) => {
      ansprechpartnerData.value.forEach((a) => {
        if (element.ansprechpartner1_id === a.id) {
          sonstigeDataMerged.value = [
            ...sonstigeDataMerged.value,
            Object.assign(element, { ansprechpartner1_name: a.name }),
          ];
        }
        if (element.ansprechpartner1_id === null) {
          sonstigeDataMerged.value = [
            ...sonstigeDataMerged.value,
            Object.assign(element, { ansprechpartner1_name: null }),
          ];
        }
        if (element.ansprechpartner2_id === a.id) {
          sonstigeDataMerged.value = [
            ...sonstigeDataMerged.value,
            Object.assign(element, { ansprechpartner2_name: a.name }),
          ];
        }
        if (element.ansprechpartner2_id === null) {
          sonstigeDataMerged.value = [
            ...sonstigeDataMerged.value,
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
    sonstigeCreate.value.bereich !== null &&
    sonstigeCreate.value.bereich !== "" &&
    sonstigeCreate.value.notfallnummer !== null &&
    sonstigeCreate.value.notfallnummer !== ""
  ) {
    if (
      sonstigeCreate.value.iconPath === null ||
      sonstigeCreate.value.iconPath === ""
    ) {
      sonstigeCreate.value.iconPath =
        "https://cdn-icons-png.flaticon.com/512/2740/2740648.png";
      axios.post("/api/sonstige", sonstigeCreate.value);
      getData();
      cancelResetButton();
      toast.success("Sonstige wurde erstellt.", {
        timeout: 3000,
      });
    } else {
      axios.post("/api/sonstige", sonstigeCreate.value);
      getData();
      cancelResetButton();
      toast.success("Sonstige wurde erstellt.", {
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
  bereichValueCreate.value = null;
  notfallnummerValueCreate.value = null;
  iconPathValueCreate.value = null;
  a1ValueCreate.value = null;
  a2ValueCreate.value = null;
  showModalCreate.value = false;
};

const editButton = (row) => {
  idValueEdit.value = row.id;
  bereichValueEdit.value = row.bereich;
  notfallnummerValueEdit.value = row.notfallnummer;
  iconPathValueEdit.value = row.iconPath;
  a1ValueEdit.value = row.ansprechpartner1_id;
  a2ValueEdit.value = row.ansprechpartner2_id;
  showModalEdit.value = true;
};

const editSubmitButton = () => {
  if (
    sonstigeEdit.value.bereich !== null &&
    sonstigeEdit.value.bereich !== "" &&
    sonstigeEdit.value.notfallnummer !== null &&
    sonstigeEdit.value.notfallnummer !== ""
  ) {
    if (
      sonstigeEdit.value.iconPath === null ||
      sonstigeEdit.value.iconPath === ""
    ) {
      sonstigeCreate.value.iconPath =
        "https://cdn-icons-png.flaticon.com/512/2740/2740648.png";
      axios.put(
        `/api/sonstige/${sonstigeEdit.value.id}`,
        sonstigeEdit.value
      );
      getData();
      showModalEdit.value = false;
      toast.success("Gespeichert.", {
        timeout: 3000,
      });
    } else {
      axios.put(
        `/api/sonstige/${sonstigeEdit.value.id}`,
        sonstigeEdit.value
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

const deleteButton = (row) => {
  deleteId.value = row.id;
  showModalDelete.value = true;
};

const deleteSubmitButtton = (id) => {
  id = deleteId.value;
  axios.delete(`/api/sonstige/${id}`);
  getData();
  showModalDelete.value = false;
  toast.success("Sonstige wurde gelöscht.", {
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
      