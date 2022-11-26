<template>
  <div class="row">
    <div class="col-md-8" style="padding: 12px; max-width: 100%;" v-for="info in infos.filter((t) =>t['id'] == route.params.infos)" :key="info.id">
      <n-list bordered>
        <n-list-item style="padding: 12px; text-align: center; vertical-align: middle">
          <div class="row">
            <div class="col-md-4">
              <p style="padding-left: 15px;">
                <img src="https://cdn-icons-png.flaticon.com/512/456/456212.png"
                  style="max-width: 100px; padding-top: 20px;" />
              </p>
              <p style="margin-bottom: 0; width: 100%;">
                <strong>Ansprechpartner</strong>
              </p>
            </div>

            <div class="col-md-8" style="padding-left: 20px; max-width: 100%;">
              <div class="infoTitle">
                <strong style="font-size: 17px;">Name:</strong>
              </div>
              <div class="infoDescription">
                <strong style="font-size: 17px;">{{info.name}}</strong>
              </div>
              <div class="infoTitle">
                <strong>Telefon:</strong>
              </div>
              <div class="infoDescription">
                <strong style="font-size: 17px;">{{info.telefon}}</strong>
              </div>
              <div class="infoTitle" style="height: 57px;">
                <strong style="font-size: 17px;">Email:</strong>
              </div>
              <div class="infoDescription" style="height: 57px;">
                <strong style="font-size: 17px; padding: 0px 5px 0px 5px; overflow-wrap: break-word;">{{info.email}}</strong>
              </div>
            </div>

          </div>
        </n-list-item>
      </n-list>
    </div>
  </div>

</template>

<script setup>
  import axios from "axios";
  import { ref } from "vue";
  import { useRoute } from "vue-router";

  const route = useRoute();

  const infos = ref([
    {
      id: "0",
      name: "Niklas Neugebauer",
      telefon: "+49(461)50306556",
      email: "neugebauer@muerwiker-gruppe.de"
    },
    {
      id: "1",
      name: "Gerd Bänsch",
      telefon: "+49(461)50306902",
      email: "baensch@muerwiker-gruppe.de"
    },
    {
      id: "2",
      name: "Ingo Langbeehn",
      telefon: "+49(461)50306550",
      email: "langbehn@muerwiker-gruppe.de"
    },
    {
      id: "3",
      name: "Rita Peters",
      telefon: "+49(461)50306551",
      email: "r.peters@muerwiker-gruppe.de"
    },
    {
      id: "4",
      name: "Birgit Jaspersen",
      telefon: "+49(151)18857357",
      email: "jaspersen@muerwiker-gruppe.de"
    },
    {
      id: "5",
      name: "Doris Grothe",
      telefon: "+49(176)11119244",
      email: "grothe@muerwiker-gruppe.de"
    },
    {
      id: "6",
      name: "Dirk Heppner",
      telefon: "+49(176)11119289",
      email: "heppner@muerwiker-gruppe.de"
    },
    {
      id: "7",
      name: "Andreas Beier",
      telefon: "+49(151)18857358",
      email: "beier@muerwiker-gruppe.de"
    }
  ]);

</script>

<style lang="scss">
  .infoDescription {
    padding: 0px 15px 0px 15px;
    text-align: center;
    vertical-align: middle;
    border: solid;
    border-radius: 10px;
    border-color: #418BCA;
    border-width: 0.1rem;
    background: aliceblue;
    max-width: 100%;
    margin-top: 10px;
  }
  .infoTitle{
    padding: 0px 20px 0px 20px;
    text-align: center;
    vertical-align: middle;
    border: solid;
    border-radius: 10px 0px 0px 10px;
    border-color: #418BCA;
    border-width: 0.1rem;
    background: aliceblue;
    max-width: 100%;
    margin-top: 10px;
    font-size: 17px;
    float: left;
  }

// .Infos{
//   background-color: rgb(44, 130, 224);
// }
</style>