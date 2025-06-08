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
import ResourceCollectionInterface from '@/interfaces/resourceCollectionInterface';
import FooterSection from '@/components/FooterSection.vue';

const { categories, experiences, projects } = defineProps({
    categories: Object as PropType<ResourceCollectionInterface<CategoryInterface>>,
    experiences: Object as PropType<ResourceCollectionInterface<ExperienceInterface>>,
    projects: Object as PropType<ResourceCollectionInterface<ProjectInterface>>,
})
</script>

<template>
    <Head>
        <title>Axel Reviron</title>
        <meta name="description" content="Fullstack Web Developer">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.3.2/css/flag-icons.min.css" />
    </Head>
    <HomeSection/>
    <TechnologySection :categories="categories.data"/>
    <ExperienceSection :experiences="experiences.data"/>
    <ProjectSection :projects="projects.data"/>
    <div class="footer-bg">
        <ContactSection />
        <FooterSection />
    </div>
</template>

<style scoped>
.footer-bg {
    background-image: url("../../images/abstract-gradient.png");
    background-repeat: no-repeat;
    background-size: cover;
}

</style>
