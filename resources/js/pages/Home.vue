<script setup lang="ts">

import { onMounted, PropType } from 'vue';
import ProjectInterface from '@/interfaces/projectInterface';
import HomeSection from '@/components/HomeSection.vue';
import NavBar from '@/layouts/NavBar.vue';

const { projects } = defineProps({projects: Array as PropType<ProjectInterface[]>})

onMounted(() => {
    console.log({projects})
})
</script>

<template>
    <main id="home-container">
        <NavBar/>
        <HomeSection/>
    </main>
</template>

<style scoped>
#home-container {
    width: 100vw;
    height: 100vh;
    overflow: hidden;
    background-image: url("../../images/abstract-gradient.png");
    background-repeat: no-repeat;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
}

</style>
