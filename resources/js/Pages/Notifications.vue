<script setup>
import Aside from "./Aside.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import axios from "axios";

// État pour gérer l'ouverture/fermeture de l'aside
const isAsideOpen = ref(false);

// Déclaration de la variable pour stocker les notifications
const props = defineProps({
  notifications: {
    type: Array,
    required: true
  }
});

// Fonction pour basculer l'état de l'aside
const toggleAside = () => {
  isAsideOpen.value = !isAsideOpen.value;
};

const customMessage = ref("");
const selectedTheme = ref("default");

const sendEmail = () => {
  alert(`Email envoyé avec le message : ${customMessage.value}`);
};

const changeTheme = () => {
  document.body.className = selectedTheme.value;
};



</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
            <div class="flex justify-center space-x-8">
                <a
                    href="/"
                    class="flex items-center text-xl font-semibold leading-tight text-gray-800 hover:text-blue-500"
                >
                    <i class="fas fa-gift mr-2"></i>
                    Anniversaires du jour
                </a>
                <a
                    href="/friends"
                    class="flex items-center text-xl font-semibold leading-tight text-gray-800 hover:text-blue-500"
                >
                    <i class="fas fa-user-friends mr-2"></i>
                    Mes Amis
                </a>
                <a
                    href="/notifications"
                    class="flex items-center text-xl font-semibold leading-tight text-gray-800 hover:text-blue-500"
                >
                    <i class="fas fa-bell mr-2"></i>
                    Notifications
                </a>
                <div></div>
            </div>
        </template>

    <div class="py-1">
      <button
        data-drawer-target="separator-sidebar"
        data-drawer-toggle="separator-sidebar"
        aria-controls="separator-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
      >
        <span class="sr-only">Open sidebar</span>
        <svg
          class="w-6 h-6"
          aria-hidden="true"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            clip-rule="evenodd"
            fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
          ></path>
        </svg>
      </button>

     <Aside></Aside>

    <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md p-6" style="height: 750px;">
      <h1 class="text-3xl font-bold mb-4 text-center" style="font-family: 'Charme', sans-serif;">🎉 Notifications 🎉</h1>

      <div class="flex justify-center items-center w-full h-full">
        <div class="relative w-2/5 max-w-full overflow-y-scroll bg-white border border-gray-100 rounded-lg dark:bg-gray-700 dark:border-gray-600 h-3/5">
          <ul>
            <li v-if="notifications.length === 0" class="text-center p-4">Aucune notification à afficher.</li>
            <li v-for="notification in notifications" :key="notification.id" class="border-b border-gray-100 dark:border-gray-600">
              <a href="#" class="flex items-center justify-center w-full px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-800">
                <img class="me-3 rounded-full w-11 h-11" :src="notification.avatar_url || '/path/to/default/avatar.jpg'" alt="Avatar" />
                <div>
                  <p class="text-sm text-gray-500 dark:text-gray-400">
                    <span class="font-medium text-gray-900 dark:text-white">{{ notification.username  }}</span>
                    {{ notification.message }}
                  </p>
                  <span class="text-xs text-blue-600 dark:text-blue-500">{{ notification.time_ago }}</span>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>



  </AuthenticatedLayout>
</template>

<style scoped>
@font-face {
  font-family: "Charme";
  src: url("./fonts/Charm-Regular.ttf.ttf") format("truetype"); /* Assurez-vous que le chemin est correct */
  font-weight: normal;
  font-style: normal;
}
</style>
