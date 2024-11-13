<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import Aside from "./Aside.vue";
import { ref, defineProps } from "vue";
import axios from "axios";

// Déclaration de la variable pour stocker les notifications
const props = defineProps({
  notifications: {
    type: Array,
    required: true
  }
});

// Utiliser une référence réactive pour les notifications
const notifications = ref([...props.notifications]);
const showModal = ref(false);
const selectedNotificationId = ref(null);
const openMenu = ref(null);

// Fonction pour basculer l'état de l'aside
const toggleAside = () => {
  isAsideOpen.value = !isAsideOpen.value;
};

const toggleMenu = (id) => {
  openMenu.value = openMenu.value === id ? null : id;
};

const markAsRead = (id) => {
  console.log(`La notification ${id} est marquée comme lue`);
  openMenu.value = null;
};

// Ouvrir la modal de confirmation
const confirmDelete = (id) => {
  selectedNotificationId.value = id;
  showModal.value = true;
};

// Fonction pour supprimer la notification
const deleteNotification = async () => {
  try {
    await axios.delete(`http://127.0.0.1:8000/notifications/${selectedNotificationId.value}`);
    notifications.value = notifications.value.filter(notification => notification.id !== selectedNotificationId.value);
    console.log(`Notification ${selectedNotificationId.value} supprimée`);
  } catch (error) {
    console.error("Erreur lors de la suppression de la notification :", error.response?.data?.message || error.message);
    alert("Une erreur est survenue lors de la suppression de la notification : " + (error.response?.data?.message || "Erreur inconnue."));
  }
  showModal.value = false; // Fermer la modal après la suppression
  openMenu.value = null;
};
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-center space-x-8">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Dashboard</h2>
        <a href="/" class="text-xl font-semibold leading-tight text-gray-800 hover:text-blue-500">Anniversaires du jour</a>
        <a href="/friends" class="text-xl font-semibold leading-tight text-gray-800 hover:text-blue-500">Mes Amis</a>
        <a href="/notifications" class="text-xl font-semibold leading-tight text-gray-800 hover:text-blue-500">Notifications</a>
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
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
      </button>

      <Aside></Aside>

      <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md p-6" style="height: 750px">
        <h1 class="text-3xl font-bold mb-4 text-center" style="font-family: 'Charme', sans-serif">🎉 Notifications 🎉</h1>

       
        <div class="flex justify-center items-center w-full h-full">
          <div class="relative w-4/5 max-w-full overflow-y-scroll bg-white border border-gray-100 rounded-lg dark:bg-gray-700 dark:border-gray-600 h-4/5">
            <ul class="list-none p-0 m-0">
              <li v-if="notifications.length === 0" class="text-center p-4">Aucune notification à afficher.</li>
              <li v-for="notification in notifications" :key="notification.id" class="border-b border-gray-100 dark:border-gray-600 flex justify-between items-center">
                <a href="#" class="flex items-center px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-800 flex-1">
                  <img class="me-3 rounded-full w-11 h-11" :src="notification.avatar_url || '/path/to/default/avatar.jpg'" alt="Avatar" />
                  <div class="flex-1">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                      <span class="font-medium text-gray-900 dark:text-white">{{ notification.user_name || 'Inconnu' }}</span>
                      {{ notification.message }}
                    </p>
                    <span class="text-xs text-blue-600 dark:text-blue-500">{{ notification.time_ago }}</span>
                  </div>
                </a>
                <div @click.stop="toggleMenu(notification.id)" class="relative">
                  <button class="focus:outline-none">
                    <svg class="w-6 h-6 text-gray-500 hover:text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <circle cx="12" cy="12" r="1" />
                      <circle cx="12" cy="6" r="1" />
                      <circle cx="12" cy="18" r="1" />
                    </svg>
                  </button>
                  <div v-if="openMenu === notification.id" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg z-10">
                    <ul class="py-1">
                      <li @click="markAsRead(notification.id)" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Marquer comme lu</li>
                      <li @click="confirmDelete(notification.id)" class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Supprimer</li>
                    </ul>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal de Confirmation -->
    <div v-if="showModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
      <div class="bg-white rounded-lg p-6 w-96">
        <h2 class="text-lg font-bold mb-4">Confirmer la suppression</h2>
        <p>Êtes-vous sûr de vouloir supprimer cette notification ?</p>
        <div class="flex justify-end mt-4">
          <button @click="deleteNotification" class="bg-red-500 text-white px-4 py-2 rounded mr-2">Supprimer</button>
          <button @click="showModal = false" class="bg-gray-300 text-gray-700 px-4 py-2 rounded">Annuler</button>
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
