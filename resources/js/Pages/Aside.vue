<template>
       <aside id="separator-sidebar"
                class="fixed top-25 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
                aria-label="Sidebar">
                <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
                    <ul class="space-y-2 font-medium">
                        <li>
                            <a href="/upcoming-birthdays"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="fas fa-birthday-cake"></i>
                                <span class="flex-1 ms-3 whitespace-nowrap">Anniverssaire à
                                    venir</span>
                                <span
                                    class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="fas fa-eye"></i>
                                <span class="flex-1 ms-3 whitespace-nowrap">Voir vos voeux</span>
                                <span
                                    class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="/ajoutdesamis"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <i class="fas fa-user-plus"></i>
                                <span class="flex-1 ms-3 whitespace-nowrap">Ajouter des amis</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 18">
                                    <path
                                        d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">Amis suggerer</span>
                            </a>
                        </li>

                    </ul>
                    <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">



                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                                <i class="fas fa-palette"></i>
                                <span class="ms-3">Thèmes</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                                <i class="fas fa-cog"></i>
                                <span class="ms-3">Paramètre</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                                <i class="fas fa-question-circle"></i>
                                <span class="ms-3">Help</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
</template>

<script setup>
    
</script>

<style scoped>

</style>