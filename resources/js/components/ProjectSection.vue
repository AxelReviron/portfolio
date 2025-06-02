<script setup lang="ts">
import Title from '@/components/Title.vue';
import { onMounted, PropType } from 'vue';
import ProjectInterface from '@/interfaces/projectInterface';

const { projects } = defineProps({
    projects: Array as PropType<ProjectInterface[]>,
})

onMounted(() => {
    console.log(projects)
})
</script>

<template>

    <div id="projects" class="py-42 flex justify-center items-center relative overflow-hidden bg-green-50">
        <div class="flex flex-col justify-center items-center w-300">
            <Title label="Projects"/>
            <p class="text-lg md:text-xl text-neutral-600 text-center w-sm px-4 md:px-0 md:w-2xl mb-8 leading-relaxed">
                lorem ipsum
            </p>
        </div>

    </div>
</template>

<style scoped>
</style>
