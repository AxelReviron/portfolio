<script setup lang="ts">

import { onMounted, PropType } from 'vue';
import ProjectInterface from '@/interfaces/projectInterface';
import HomeSection from '@/components/HomeSection.vue';
import NavBar from '@/layouts/NavBar.vue';
import TechnologySection from '@/components/TechnologySection.vue';

const { projects } = defineProps({projects: Array as PropType<ProjectInterface[]>})

</script>

<template>
<!--    <NavBar/>-->
    <HomeSection/>
    <TechnologySection/>
</template>

<style scoped>


</style>
