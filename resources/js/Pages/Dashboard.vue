<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import Aside from '@/Pages/Aside.vue';
import lottie from "lottie-web";
// État pour gérer l'ouverture/fermeture de l'aside
const isAsideOpen = ref(false);

// Fonction pour basculer l'état de l'aside
const toggleAside = () => {
    isAsideOpen.value = !isAsideOpen.value;
};

const upcomingBirthdays = ref([
    { id: 1, name: "David", birthday: "2024-11-25" },
    { id: 2, name: "Eve", birthday: "2024-12-01" },
]);

const customMessage = ref("");
const selectedTheme = ref("default");

const sendEmail = () => {
    alert(`Email envoyé avec le message : ${customMessage.value}`);
};

const changeTheme = () => {
    document.body.className = selectedTheme.value;
};

onMounted(() => {
    lottie.loadAnimation({
        container: document.getElementById("lottie-animation"),
        renderer: "svg",
        loop: true, // Changez à false si vous ne voulez pas que l'animation boucle
        autoplay: true,
        path: "/animations/Animation - 1731410185826 (1).json", // Chemin vers votre animation JSON
    });
    // Chargement de l'animation après le titre
    lottie.loadAnimation({
        container: document.getElementById('lottie-animation2'),
        renderer: 'svg',
        loop: true, // Changez à false si vous ne voulez pas que l'animation boucle
        autoplay: true,
        path: '/animations/Animation - 1731410185826 (1).json' // Utilisez le même chemin ou un autre si nécessaire
    });
});
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-center space-x-8">
                <a href="/"
                    class="flex items-center text-xl font-semibold leading-tight text-gray-800 hover:text-blue-500">
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

            <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md p-6 overflow-hidden">
                <h1 class="text-3xl font-bold mb-4 text-center animate-slide-left"
                    style="font-family: 'Charme', sans-serif">
                    🎉 Bienvenue dans votre Tableau de Bord d'Anniversaire ! 🎉
                </h1>

                <!-- Section des anniversaires du jour -->
                <div class="mb-6">
                    <div class="flex items-center">
                        <!-- Conteneur pour l'animation Lottie -->
                        <div id="lottie-animation" class="w-16 h-16 text-2xl font-semibold mb-2"></div>

                        <!-- Titre -->
                        <h2 class="text-2xl font-semibold mb-2" style="font-family: 'LoversQuarrel', sans-serif">
                            Anniversaires du jour
                        </h2>
                        <!-- Conteneur pour l'animation Lottie -->
                        <div id="lottie-animation2" class="w-16 h-16 text-2xl font-semibold mb-2"></div>
                    </div>
                    <div class="flex gap-4 justify">
                        <div v-for="friend in upcomingBirthdays" :key="friend.id"
                            class="w-[200px] pt-0 max-w-xs bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex justify-end px-4 pt-4">
                                <button id="dropdownButton" data-dropdown-toggle="dropdown"
                                    class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                                    type="button">
                                    <span class="sr-only">Open dropdown</span>
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 16 3">
                                        <path
                                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                    </svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdown"
                                    class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2" aria-labelledby="dropdownButton">
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export
                                                Data</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="flex flex-col items-center p-4">
                                <img class="w-20 h-20 mb-3 rounded-full shadow-lg"
                                    src="/docs/images/people/profile-picture-3.jpg"
                                    alt="Profile image of {{ friend.name }}" />
                                <h5 class="mb-1 text-lg font-medium text-gray-900 dark:text-white">
                                    {{ friend.name }}
                                </h5>
                                <span class="text-sm text-gray-500 dark:text-gray-400">{{ friend.birthday }}</span>
                                <div class="flex mt-4 md:mt-6">
                                    <Link
                                       href="/mail"
                                        class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600">
                                        Souhaiter
                                </Link>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Souhaiter un bon anniversaire avec animation -->
                <div class="text-center mt-8 relative overflow-hidden">
                    <h2 class="text-xl font-semibold animate-slide" style="font-family: 'Charme', sans-serif">
                        🎂 Souhaitez-vous un Joyeux Anniversaire ! 🎂
                    </h2>
                </div>
            </div>

        </div>

    </AuthenticatedLayout>
</template>

<style scoped>
@font-face {
    font-family: "Charme";
    src: url("./fonts/Charm-Regular.ttf.ttf") format("truetype");
    /* Assurez-vous que le chemin est correct */
    font-weight: normal;
    font-style: normal;
}

@font-face {
    font-family: "LoversQuarrel";
    src: url("./fonts/Charmonman-Regular.ttf.ttf") format("truetype");
    /* Assurez-vous que le chemin est correct */
    font-weight: normal;
    font-style: normal;
    font-size: 100rem;
}

@keyframes slide {
    0% {
        transform: translateX(100%);
        opacity: 1;
    }

    100% {
        transform: translateX(-100%);
        opacity: 0;
    }
}

@keyframes slide-left {
    0% {
        transform: translateX(-100%);
        opacity: 1;
    }

    100% {
        transform: translateX(100%);
        opacity: 0;
    }
}

.animate-slide {
    animation: slide 20s linear infinite;
    /* Changez la durée selon vos préférences */
}

.animate-slide-left {
    animation: slide-left 20s linear infinite;
    /* Durée de l'animation pour le titre */
}

.relative {
    position: relative;
    /* Position relative pour le conteneur de l'animation */
}
</style>
