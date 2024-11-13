<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
      <template #header>
      <div class="flex justify-center space-x-8">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
          Dashboard
        </h2>
        <a href="/" class="text-xl font-semibold leading-tight text-gray-800 hover:text-blue-500">
          Anniversaires du jour
        </a>
        <a href="/friends" class="text-xl font-semibold leading-tight text-gray-800 hover:text-blue-500">
          Mes Amis
        </a>
        <a href="/notifications" class="text-xl font-semibold leading-tight text-gray-800 hover:text-blue-500">
          Notifications
        </a>
      </div>
    </template>
    
    <Aside></Aside>
    
  <div class="flex justify-center items-center min-h-screen bg-gray-100">
    <!-- Carte d'anniversaire -->
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
      <a href="#">
        <img
          class="rounded-t-lg"
          src="/animations/460527440_122108597888520279_5627712991740032276_n.jpg"
          alt="Image d'anniversaire"
        />
      </a>
      <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
          🎉 Un anniversaire spécial pour une personne exceptionnelle !
        </h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
          {{ personalizedMessage }}
        </p>
        <div class="flex gap-4">
          <!-- Bouton personnaliser -->
          <button
            @click="openModal"
            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
          >
            Personnaliser ton message
            <svg
              class="rtl:rotate-180 w-3.5 h-3.5 ml-2"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 14 10"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M1 5h12m0 0L9 1m4 4L9 9"
              />
            </svg>
          </button>
          <button
          @click="sendMessage"
          class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800"
        >
          Envoyer
        </button>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div v-if="isModalOpen" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
      <div class="bg-white p-6 rounded-lg w-96 shadow-lg">
        <h3 class="text-xl font-bold mb-4">Personnalise ton message</h3>
        <textarea
          v-model="personalizedMessage"
          class="w-full h-40 p-2 border rounded-md focus:outline-none"
          placeholder="Écris ton message ici..."
        ></textarea>
        <div class="mt-4 flex justify-between">
          <button @click="closeModal" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Annuler</button>
          <button @click="saveMessage" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Enregistrer</button>
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

// Data pour gérer le message personnalisé et l'état du modal
const personalizedMessage = ref(
  "Cher(e) [Nom],\n\nEn ce jour spécial, je tiens à te dire à quel point tu es important(e) pour moi. Que cette nouvelle année qui commence t'apporte encore plus de bonheur, de réussite et de moments mémorables.\n\nJ'espère que cette journée sera remplie de rires, de joie et de belles surprises. Sache que tu es entouré(e) de personnes qui t'aiment et te soutiennent. Profite de chaque instant et fais de cette année la meilleure de toutes !\n\nJoyeux anniversaire !"
);
const isModalOpen = ref(false);

// Ouvre le modal
const openModal = () => {
  isModalOpen.value = true;
};

// Ferme le modal
const closeModal = () => {
  isModalOpen.value = false;
};
const sendMessage = () => {
  alert("Le message a été envoyé !");
};
// Sauvegarde le message personnalisé (vous pouvez ajouter une logique pour enregistrer si nécessaire)
const saveMessage = () => {
  // Logique de sauvegarde (par exemple, envoyer à un serveur, etc.)
  closeModal();
};
</script>

<style scoped>
/* Style pour le modal */
.fixed {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 50;
}
.bg-gray-900 {
  background-color: rgba(0, 0, 0, 0.5);
}
</style>
