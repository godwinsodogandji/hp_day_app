<template>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <!-- Première carte -->
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" v-if="cards.length >= 1">
      <a href="#">
        <img class="rounded-t-lg" :src="cards[0].image" alt="Anniversary Image" />
      </a>
      <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
          {{ cards[0].title }}
        </h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
          {{ cards[0].description }}
        </p>
        <a href="/card1" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Lire plus
          <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
          </svg>
        </a>
      </div>
    </div>

    <!-- Deuxième carte -->
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" v-if="cards.length >= 2">
      <a href="#">
        <img class="rounded-t-lg" :src="cards[1].image" alt="Anniversary Image" />
      </a>
      <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
          {{ cards[1].title }}
        </h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
          {{ cards[1].description }}
        </p>
        <a href="/card2" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Lire plus
          <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
          </svg>
        </a>
      </div>
    </div>

    <!-- Troisième carte -->
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" v-if="cards.length >= 3">
      <a href="#">
        <img class="rounded-t-lg" :src="cards[2].image" alt="Anniversary Image" />
      </a>
      <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
          {{ cards[2].title }}
        </h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
          {{ cards[2].description }}
        </p>
        <a href="/card3" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Lire plus
          <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
          </svg>
        </a>
      </div>
    </div>

    <!-- Quatrième carte -->
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" v-if="cards.length >= 4">
      <a href="#">
        <img class="rounded-t-lg" :src="cards[3].image" alt="Anniversary Image" />
      </a>
      <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
          {{ cards[3].title }}
        </h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
          {{ cards[3].description }}
        </p>
        <a href="/card4" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Lire plus
          <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
          </svg>
        </a>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

// Liste des cartes avec informations
const cards = ref([
  {
    title: 'Joyeux Anniversaire !',
    description: 'Souhaitez un merveilleux anniversaire à votre proche avec ce message spécial.',
    image: '/animations/460527440_122108597888520279_5627712991740032276_n.jpg',
  },
  {
    title: 'Fêtez l\'anniversaire',
    description: 'Que ce soit une journée inoubliable ! Envie de marquer le coup ? Envoyez un message chaleureux.',
    image: '/animations/460527440_122108597888520279_5627712991740032276_n.jpg',
  },
  {
    title: 'Un anniversaire plein de joie',
    description: 'Faites sourire vos amis avec un message personnalisé et joyeux pour leur anniversaire.',
    image: '/animations/460527440_122108597888520279_5627712991740032276_n.jpg',
  },
  {
    title: 'Souhaits d\'anniversaire',
    description: 'Envoyez un message vibrant de bonheur et de joie à l\'occasion de cet anniversaire spécial.',
    image: '/animations/460527440_122108597888520279_5627712991740032276_n.jpg',
  },
])
</script>

<style scoped>
/* Vous pouvez personnaliser le style ici */
</style>
