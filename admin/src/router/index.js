import { createRouter, createWebHistory } from "vue-router";
import ConverterView from "../views/ConverterView.vue";
import AdminView from "../views/AdminView.vue";
import LoginView from "../views/LoginView.vue"


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "converter",
      component: ConverterView,
    },
    {
      path: "/admin",
      name: "admin",
      component: AdminView,
    },
    {
      path: "/login",
      name: "login",
      component: LoginView,
    },
  ],
});

export default router;
