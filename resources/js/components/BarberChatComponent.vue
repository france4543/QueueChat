<template>
  <div>
    <div class="scroll_bar">
      <div v-for="item in items" :key="item.message">
        <div v-if="item.rent_id === rent_id">
          <div v-if="item.name === 'Barber'">
            <div align="right" style="color: green">
              <b>[Me]</b> {{ item.message }}
              <br>
              {{ (String(item.time)).substring(0, 10) }} {{(String(item.time)).substring(11, 16)}}
            </div>
            <hr />
          </div>

          <div v-else>
            <div align="left" style="color: red">
              <b>[Member]</b> {{ item.message }}
              <br>
              {{ (String(item.time)).substring(0, 10) }} {{(String(item.time)).substring(11, 16)}}
            </div>
            <hr />
          </div>
        </div>
      </div>
    </div>

    <div style="display: flex; flex-direction: row">
      <div style="width: 90%" align="left">
        <input
          class="form-control"
          placeholder="Aa"
          type="text"
          v-model="message"
        />
      </div>

      <div style="width: 10%" align="right">
        <button class="btn btn-outline-primary" @click="send_chat()">
          Send
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import firebase from "../firebase";
import moment from 'moment';
export default {
  mounted() {
    this.get_chat();
  },
  methods: {
    get_chat() {
      const pathname = window.location.pathname;
      const appId = pathname.split("/")[3];
      this.rent_id = appId;
      const db = firebase.database();
      db.ref("chats").on("value", (snap) => {
        this.items = snap.val();
      });
    },
    send_chat() {
      moment.locale('th');
      const date = new Date();
      const date_th = moment(date).format();
      if (this.message !== "") {
        const pathname = window.location.pathname;
        const appId = pathname.split("/")[3];
        const db = firebase.database();
        db.ref("chats").push({
          rent_id: appId,
          name: "Barber",
          message: this.message,
          time: date_th
        });
        this.message = "";
      }
    },
  },
  data() {
    return {
      items: [],
      rent_id: "",
      name: "",
      message: "",
    };
  },
};
</script>

<style scoped>
.scroll_bar {
  width: 100%;
  height: 400px;
  overflow-y: scroll; /* Add the ability to scroll */
}

.scroll_bar::-webkit-scrollbar {
  display: none;
}

.scroll_bar {
  -ms-overflow-style: none; /* IE and Edge */
  scrollbar-width: none; /* Firefox */
}
</style>