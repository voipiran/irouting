import { createApp } from "vue";
import { createRouter, createWebHashHistory } from 'vue-router'

import Home from "../components/Home.vue";
import About from "../components/About.vue";
import NotFound from "../components/NotFound.vue";
import Settings from "../components/Settings.vue";
import EditSetting from "../components/EditSetting.vue";

const routes = [
  { path: '/', component: Settings },
  { path: '/settings', component: Settings },
  {
    path: '/settings/:id/edit',
    component: EditSetting,
    name: "SettingsEdit"
  },
]

const router = createRouter({
  // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
  history: createWebHashHistory(),
  routes, // short for `routes: routes`
})

export const app = createApp({
  data() {
    return {
      message: "Hello Vue!",
    };
  },
})


// import Notifications
import Notifications from '@kyvg/vue3-notification'
app.use(Notifications)

app.use(router)
app.mount("#app");