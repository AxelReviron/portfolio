<script setup lang="ts">
import { ExternalLink } from 'lucide-vue-next';
import { PropType } from 'vue';
import ProjectInterface from '@/interfaces/projectInterface';
import TechnologyCard from '@/components/TechnologyCard.vue';

const { project } = defineProps({
    project: Object as PropType<ProjectInterface>,
})
</script>

<template>
    <div class="w-80 md:w-100 flex flex-col bg-white rounded-xl shadow-lg border border-white/50 overflow-hidden pb-1">
        <div class="relative w-full h-50 overflow-hidden rounded-t-xl group mb-4">
            <img
                v-if="project.media && project.media.length > 0 && project.media[0].original_url"
                :src="project.media[0].original_url"
                alt="Project Cover"
                class="absolute inset-0 w-full h-full object-cover
                       transition-all duration-300
                       group-hover:blur-sm"
            >
            <span v-html="project.description"
                class="absolute inset-0 flex items-center justify-center p-4
                       text-white text-center text-lg md:text-xl font-medium
                       text-shadow-lg opacity-0 transition-opacity duration-300
                       group-hover:opacity-100 group-hover:bg-[#000]/10 cursor-pointer z-10"
            ></span>
        </div>

        <div class="px-4 mb-4 md:h-42 flex flex-col justify-start gap-4">
            <h3 class="text-xl text-green-900 font-bold">{{ project.name }}</h3>
            <p class="md:hidden mb-2">{{ project.description }}</p>
            <ul
                v-if="project.technologies"
                class="flex flex-row gap-2 flex-wrap mb-2"
            >
                <li
                    v-for="technology in project.technologies"
                    :key="technology.name"
                >
                    <TechnologyCard :technology="technology" />
                </li>
            </ul>
            <div class="flex flex-row gap-4 mt-auto">
                <a
                    v-if="project.website"
                    :href="project.website"
                    target="_blank"
                    rel="noopener"
                    class="flex flex-row gap-2 text-lg text-green-600 font-medium"
                >
                    Website
                    <ExternalLink class="mt-1 w-5 h-5"/>
                </a>
                <a
                    v-if="project.github_url"
                    :href="project.github_url"
                    target="_blank"
                    rel="noopener"
                    class="flex flex-row gap-2 text-lg text-green-600 font-medium"
                >
                    Github
                    <ExternalLink class="mt-1 w-5 h-5"/>
                </a>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
