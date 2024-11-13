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
    <Aside></Aside>

    <div class="max-w-7xl mx-auto rounded-lg shadow-xl overflow-hidden">
      <div class="flex justify-center items-center min-h-screen">
        <!-- Carte d'anniversaire -->
        <div class="max-w-sm bg-gradient-to-r from-purple-600 to-pink-600 rounded-lg shadow-xl overflow-hidden">
          <a href="#">
            <img class="w-full h-48 object-cover object-center" src="460527440_122108597888520279_5627712991740032276_n.jpg" alt="Image d'anniversaire" />
          </a>
          <div class="p-4 text-white">
            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-center">
              ❤️ Pour la personne qui occupe une place spéciale dans mon cœur
            </h5>
            <p class="mb-4 text-base leading-relaxed text-center">
              {{ personalizedMessage }}
            </p>
            <div class="flex justify-center gap-2">
              <button @click="showModal = true" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-purple-300">
                Personnaliser ton message
                <svg class="rtl:rotate-180 w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
              </button>
              <button @click="sendMessage" class="px-3 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800">
                Envoyer
              </button>
            </div>
          </div>
        </div>

        <!-- Modal de personnalisation -->
        <div v-if="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
          <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
            <h3 class="text-xl font-semibold mb-4 text-gray-900">Personnaliser le message</h3>
            <textarea v-model="tempMessage" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-purple-500" rows="4" placeholder="Écrivez votre message ici..."></textarea>
            <div class="flex justify-end gap-2 mt-4">
              <button @click="showModal = false" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                Annuler
              </button>
              <button @click="applyPersonalization" class="px-4 py-2 bg-purple-700 text-white rounded hover:bg-purple-800">
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
const personalizedMessage = ref(`Mon cher(e) [Nom],

Chaque année, je prends un moment pour réfléchir à combien tu es important(e) pour moi, et je réalise combien ma vie est enrichie par ta présence. En ce jour spécial, je veux te dire à quel point tu comptes dans ma vie.

Je te souhaite tout l'amour du monde, la santé, et la réalisation de tes rêves les plus fous. Puisses-tu toujours être entouré(e) de personnes qui t'aiment et qui t'apprécient autant que moi.

Que cette nouvelle année de ta vie soit aussi magnifique que toi.

Joyeux anniversaire, de tout cœur.`);
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
/* Styles pour le modal et la carte */
.fixed {
  position: fixed;
}

.inset-0 {
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
}

.bg-gradient-to-r {
  background: linear-gradient(135deg, #6a1b9a, #e91e63);
}

.text-white {
  color: white;
}

.hover\:scale-105:hover {
  transform: scale(1.05);
}

.shadow-xl {
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
}
</style>
