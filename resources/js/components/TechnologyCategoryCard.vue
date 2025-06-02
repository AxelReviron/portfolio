<script setup lang="ts">

import { onMounted, shallowRef, useTemplateRef } from 'vue';
import { useIntersectionObserver } from '@vueuse/core';
import TechnologyCard from '@/components/TechnologyCard.vue';

const props = defineProps({
    category: String,
    technologies: {
        label: String,
        icon: String,
        website: String
    }
});

const target = useTemplateRef<HTMLDivElement>('target')
const targetIsVisible = shallowRef(false)

onMounted(() => {
    useIntersectionObserver(target, ([entry]) => {
            targetIsVisible.value = entry?.isIntersecting || false
        },
    )
})
</script>

<template>
    <div
        ref="target"
        class="bg-white shadow-sm px-4 py-2 rounded-lg w-84 h-42 duration-400 ease-in"
        :class="{
            'opacity-0 translate-y-4': !targetIsVisible,
            'opacity-100 translate-y-0': targetIsVisible
        }"
    >
        <h2 class="text-xl md:text-2xl font-medium text-green-900 mb-4">
            {{ props.category }}
        </h2>

        <ul class="flex flex-row gap-4 flex-wrap">
            <li
                v-for="technology in props.technologies"
                :key="technology.label"
            >
                <TechnologyCard :label="technology.label" :icon="technology.icon" :website="technology.website"/>
            </li>
        </ul>
    </div>
</template>

<style scoped>

</style>
