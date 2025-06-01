<script setup lang="ts">

import { onMounted, PropType } from 'vue';
import ProjectInterface from '@/interfaces/projectInterface';
import HomeSection from '@/components/HomeSection.vue';
import TechnologySection from '@/components/TechnologySection.vue';
import { Head } from '@inertiajs/vue3'


const { projects } = defineProps({projects: Array as PropType<ProjectInterface[]>})

onMounted(() => {
    console.log({projects})
})
</script>

<template>
    <Head>
        <title>Axel Reviron</title>
        <meta name="description" content="Fullstack Web Developer">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">
    </Head>
    <HomeSection/>
    <TechnologySection/>
</template>

<style scoped>


</style>
