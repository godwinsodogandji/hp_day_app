<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref, computed } from "vue";
import Aside from "./Aside.vue";

// État pour gérer l'ouverture/fermeture de l'aside
const isAsideOpen = ref(false);

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

//ma partie
const props = defineProps({
    birthdays: {
        type: Array,
        required: true,
    },
});

const currentPage = ref(1);
const itemsPerPage = 4;
const slideDirection = ref('slide-right'); // Direction de l'animation

// Pagination calculée
const totalPages = computed(() => Math.ceil(props.birthdays.length / itemsPerPage));

const paginatedBirthdays = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    return props.birthdays.slice(start, start + itemsPerPage);
});

// Fonctions de pagination
const nextPage = () => {
    if (currentPage.value < totalPages.value) {
        slideDirection.value = 'slide-left'; // Changer la direction
        currentPage.value++;
    }
};

const prevPage = () => {
    if (currentPage.value > 1) {
        slideDirection.value = 'slide-right'; // Changer la direction
        currentPage.value--;
    }
};

// Format de date personnalisé
const formatDate = (date) => {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(date).toLocaleDateString('fr-FR', options);
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

            <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md p-11">
                <h1
                    class="text-3xl font-bold mb-4 text-center"
                    style="font-family: 'Charme', sans-serif"
                >
                    🎉 Bienvenue dans votre Tableau de Bord d'Anniversaire ! 🎉
                </h1>

                <!-- Section des anniversaires du jour -->
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold mb-2">
                        Anniversaires à venir
                    </h2>
                    <div class="flex gap-4 justify-center">
                        <div
                            v-if="birthdays.length === 0"
                            class="bg-gray-200 p-4 rounded shadow"
                        >
                            Aucun anniversaire à venir dans les 7 prochains
                            jours.
                        </div>
                        <transition name="fade" mode="out-in">
                            <div class="flex gap-4 justify-center">
                                <div
                                    v-for="birthday in paginatedBirthdays"
                                    :key="birthday.id"
                                    class="w-[200px] max-w-xs bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
                                >
                                    <div class="flex justify-end px-4 pt-4">
                                        <!-- Dropdown button -->
                                        <button
                                            id="dropdownButton"
                                            data-dropdown-toggle="dropdown"
                                            class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                                        >
                                            <span class="sr-only"
                                                >Open dropdown</span
                                            >
                                            <svg
                                                class="w-5 h-5"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 16 3"
                                            >
                                                <path
                                                    d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"
                                                />
                                            </svg>
                                        </button>
                                        <!-- Dropdown menu -->
                                        <div
                                            id="dropdown"
                                            class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700"
                                        >
                                            <ul
                                                class="py-2"
                                                aria-labelledby="dropdownButton"
                                            >
                                                <li>
                                                    <a
                                                        href="#"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                                        >Edit</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        href="#"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                                        >Export Data</a
                                                    >
                                                </li>
                                                <li>
                                                    <a
                                                        href="#"
                                                        class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                                        >Delete</a
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="flex flex-col items-center p-4">
                                        <img
                                            class="w-20 h-20 mb-3 rounded-full shadow-lg"
                                            :src="birthday.user.profilePicture"
                                            :alt="
                                                'Profile image of ' +
                                                birthday.user.name
                                            "
                                        />
                                        <h5
                                            class="mb-1 text-lg font-medium text-gray-900 dark:text-white"
                                        >
                                            {{ birthday.user.name }}
                                        </h5>
                                        <span
                                            class="text-sm text-gray-500 dark:text-gray-400"
                                            >{{
                                                formatDate(birthday.date)
                                            }}</span
                                        >
                                    </div>
                                </div>
                            </div>
                        </transition>
                    </div>
                    <!-- Pagination Controls -->
                    <div class="flex justify-between mt-6">
                        <button
                            @click="prevPage"
                            :disabled="currentPage === 1"
                            class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600"
                        >
                            Précédent
                        </button>
                        <button
                            @click="nextPage"
                            :disabled="currentPage === totalPages"
                            class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600"
                        >
                            Suivant
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style >
@font-face {
    font-family: "Charme";
    src: url("./fonts/Charm-Regular.ttf.ttf") format("truetype");
    font-weight: normal;
    font-style: normal;
}
.slide-enter-active, .slide-leave-active {
    transition: transform 0.5s ease;
}
.slide-enter, .slide-leave-to {
    transform: translateX(100%); /* Slide in from the right */
}
.slide-leave {
    transform: translateX(0);
}

/* Animation pour le carrousel */
.slide-left {
    transform: translateX(-100%); /* Slide out to the left */
}
.slide-right {
    transform: translateX(100%); /* Slide out to the right */
}
</style>
