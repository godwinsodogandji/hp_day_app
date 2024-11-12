<template>
    <div class="max-w-lg mx-auto bg-white p-8 mt-10 rounded-lg shadow-md fade-in">
      <div class="text-center">
        <h1 class="text-2xl font-bold mb-4">
          Bonjour {{ userName }},
        </h1>
        <p class="text-gray-600 mb-4">
          Vous avez accepté la demande d'amitié de {{ friendName }}.
        </p>
        <p class="text-gray-600 mb-4">
          Vous êtes maintenant amis avec {{ friendName }} sur {{ platformName }}.
        </p>
        <p class="text-gray-600 mb-4">
          Vous pouvez maintenant voir ses activités et interagir avec lui.
        </p>
        <p class="text-gray-600 mb-4">
          Cordialement,
        </p>
        <p class="text-gray-600 mb-4">
          L'équipe {{ platformName }}
        </p>
      </div>
      <div class="border-t pt-6 mt-6 text-center">
        <div class="flex justify-center space-x-4 mb-4">
          <i class="fab fa-facebook-f text-gray-600"></i>
          <i class="fab fa-twitter text-gray-600"></i>
          <i class="fab fa-instagram text-gray-600"></i>
          <i class="fab fa-snapchat-ghost text-gray-600"></i>
          <i class="fab fa-linkedin-in text-gray-600"></i>
          <i class="fab fa-pinterest text-gray-600"></i>
          <i class="fab fa-youtube text-gray-600"></i>
        </div>
        <div class="text-gray-600 text-sm mb-4">
          Support | Forums | Blog
        </div>
        <div class="text-gray-600 text-sm mb-4">
          Transférer à un ami | Gérer vos préférences de courriel
        </div>
        <div class="text-gray-600 text-xs mb-4">
          Cet email a été envoyé avec ♥ par © {{ platformName }}
        </div>
        <div class="text-gray-600 text-xs">
          Si vous préférez recevoir moins de courriels de notre part, vous pouvez
          <a class="text-blue-600" href="#">définir vos préférences ici</a>.
          Vous pouvez également gérer vos préférences personnelles
          <a class="text-blue-600" href="#">ici</a>.
          Si vous ne souhaitez plus recevoir de messages de notre part, vous pouvez
          <a class="text-blue-600" href="#">vous désabonner ici</a>.
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { onMounted, ref } from 'vue';
  
  const userName = ref('Nom de l’utilisateur');
  const friendName = ref('Nom de l’ami');
  const platformName = ref('HIGHDAY');
  
  // Animation fade-in ajoutée lors du montage
  onMounted(() => {
    const app = document.getElementById('app');
    app.classList.add('fade-in');
  });
  </script>
  
  <style scoped>
  @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');
  
  body {
    font-family: 'Roboto', sans-serif;
  }
  
  .fade-in {
    animation: fadeIn 2s ease-in-out;
  }
  
  @keyframes fadeIn {
    0% {
      opacity: 0;
    }
    100% {
      opacity: 1;
    }
  }
  </style>
  