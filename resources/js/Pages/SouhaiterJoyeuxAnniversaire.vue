<template>
    <div>
        <h1>Souhaiter un Joyeux Anniversaire</h1>
        <p>Ami ID : {{ friendId }}</p>
        <!-- Ajoutez ici le contenu que vous souhaitez afficher -->
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps(['friendId']);
</script>

<style>
/* Ajoutez des styles si nécessaire */
</style>