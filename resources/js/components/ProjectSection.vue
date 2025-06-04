<script setup lang="ts">
import Title from '@/components/Title.vue';
import { PropType, ref } from 'vue';
import ProjectInterface from '@/interfaces/projectInterface';
import ProjectCard from '@/components/ProjectCard.vue';
import useOnceInView from '@/composables/useItemsOnceInView';

const { projects } = defineProps({
    projects: Array as PropType<ProjectInterface[]>,
})

const projectRefs = ref<HTMLElement[]>([]);
const itemHasBeenSeen = ref<boolean[]>([]);

const baseDelay = 100;
const delayIncrement = 150;

useOnceInView(projectRefs, itemHasBeenSeen);
</script>

<template>

    <div id="projects" class="py-24 md:py-42 flex justify-center items-center relative overflow-hidden bg-green-50">
        <div class="flex flex-col justify-center items-center w-400">
            <Title label="Projects"/>
            <p class="text-lg md:text-xl text-neutral-600 text-center w-sm px-4 md:px-0 md:w-2xl mb-8 leading-relaxed">
                A selection of my recent work, showcasing my expertise in full-stack development and problem-solving abilities.
            </p>
            <ul class="flex justify-center flex-wrap flex-row gap-8">
               <li
                   v-for="(project, index) in projects"
                   :key="project.name"
                   :ref="(element) => { if (element) projectRefs[index] = element as HTMLElement; }"
                   class="duration-600 ease-in"
                   :class="{
                       'opacity-0 translate-y-4': !itemHasBeenSeen[index],
                       'opacity-100 translate-y-0': itemHasBeenSeen[index]
                   }"
                   :style="{ 'transition-delay': `${baseDelay + (index * delayIncrement)}ms` }"
               >
                   <ProjectCard :project="project"/>
               </li>
            </ul>
        </div>
    </div>
</template>

<style scoped>
</style>
