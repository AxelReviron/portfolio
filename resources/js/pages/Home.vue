<script setup lang="ts">

import { PropType } from 'vue';
import ProjectInterface from '@/interfaces/projectInterface';
import HomeSection from '@/components/HomeSection.vue';
import TechnologySection from '@/components/TechnologySection.vue';
import { Head } from '@inertiajs/vue3'
import ExperienceSection from '@/components/ExperienceSection.vue';
import ProjectSection from '@/components/ProjectSection.vue';
import ContactSection from '@/components/ContactSection.vue';
import ExperienceInterface from '@/interfaces/experienceInterface';
import CategoryInterface from '@/interfaces/categoryInterface';

const { categories, experiences, projects } = defineProps({
    categories: Array as PropType<CategoryInterface[]>,
    experiences: Array as PropType<ExperienceInterface[]>,
    projects: Array as PropType<ProjectInterface[]>
})
</script>

<template>
    <Head>
        <title>Axel Reviron</title>
        <meta name="description" content="Fullstack Web Developer">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">
    </Head>
    <HomeSection/>
    <TechnologySection :categories="categories"/>
    <ExperienceSection :experiences="experiences"/>
    <ProjectSection :projects="projects"/>
    <ContactSection />
</template>

<style scoped>


</style>
