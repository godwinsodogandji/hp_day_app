<template>

  <Head title="Dashboard" />
  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-center space-x-8">
        <a href="/" class="flex items-center text-xl font-semibold leading-tight text-gray-800 hover:text-blue-500">
          <i class="fas fa-gift mr-2"></i>
          Anniversaires du jour
        </a>
        <a href="/friends"
          class="flex items-center text-xl font-semibold leading-tight text-gray-800 hover:text-blue-500">
          <i class="fas fa-user-friends mr-2"></i>
          Mes Amis
        </a>
        <a href="/notifications"
          class="flex items-center text-xl font-semibold leading-tight text-gray-800 hover:text-blue-500">
          <i class="fas fa-bell mr-2"></i>
          Notifications
        </a>
        <div></div>
      </div>
    </template>

    <div class="py-1">
      <Aside></Aside>
      <div class="max-w-7xl mx-auto  rounded-lg shadow-md-[2] mt-1 overflow-hidden">
        <div class="flex justify-center items-center">
          <!-- Carte principale -->
          <div class="max-w-sm  bg-gradient-to-r from-purple-600 to-pink-300  border  rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
              <img class="rounded-t-lg" src="https://via.placeholder.com/400x200" alt="Image d'anniversaire" />
            </a>
            <div class="p-5">
              <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                🎂 Joyeux anniversaire à une personne remarquable !
              </h5>
              <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                {{ personalizedMessage }}
              </p>
              <div class="flex gap-4">
                <!-- Bouton pour ouvrir le modal de personnalisation -->
                <button @click="showModal = true"
                  class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  Personnaliser ton message
                  <svg class="rtl:rotate-180 w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M1 5h12m0 0L9 1m4 4L9 9" />
                  </svg>
                </button>

                <!-- Bouton d'envoi -->
                <button @click="sendMessage"
                  class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800">
                  Envoyer
                </button>
              </div>
            </div>
          </div>

          <!-- Modal pour personnaliser le message -->
          <div v-if="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-md w-full">
              <h3 class="text-xl font-semibold mb-4 text-gray-900 dark:text-white">Personnaliser le message</h3>
              <textarea v-model="tempMessage"
                class="w-full p-2 border border-gray-300 rounded dark:bg-gray-700 dark:text-white" rows="6"></textarea>
              <div class="flex justify-end gap-4 mt-4">
                <button @click="showModal = false" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                  Annuler
                </button>
                <button @click="applyPersonalization"
                  class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                  Appliquer
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import Aside from '../Aside.vue';
import { ref } from 'vue';
const showModal = ref(false);
const personalizedMessage = ref(`Cher(e) [Nom],

À l'occasion de ton anniversaire, je tiens à te transmettre mes plus sincères félicitations. Que cette nouvelle année de ta vie t'offre des opportunités exceptionnelles et un succès continu.

Puisses-tu être entouré(e) d'amour, de santé et de prospérité tout au long de l'année. Que ce jour particulier soit à la hauteur de la personne que tu es, une source d'inspiration pour nous tous.

Je te souhaite un anniversaire exceptionnel et une année riche en réalisations.

Bien à toi.`);
const tempMessage = ref(personalizedMessage.value);

const applyPersonalization = () => {
  personalizedMessage.value = tempMessage.value;
  showModal.value = false;
};

const sendMessage = () => {
  alert("Le message a été envoyé !");
};
</script>

<style scoped>
/* Styles pour modal */
.fixed {
  position: fixed;
}

.inset-0 {
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
}
</style>
