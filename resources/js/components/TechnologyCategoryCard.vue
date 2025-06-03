<script setup lang="ts">

import { PropType, ref } from 'vue';
import CategoryInterface from '@/interfaces/categoryInterface';
import TechnologyCard from '@/components/TechnologyCard.vue';
import useItemOnceInView from '@/composables/useItemOnceInView';

const { category, delay } = defineProps({
    category: Object as PropType<CategoryInterface>,
    delay: Number
});

const target = ref<HTMLDivElement | null>(null);
const targetIsVisible = ref(false);

useItemOnceInView(target, targetIsVisible);

</script>

<template>
    <div
        :ref="(element) => { if (element) target = element as HTMLDivElement; }"
        class="bg-white shadow-sm px-4 py-2 rounded-lg w-84 h-42 duration-600 ease-in"
        :class="{
            'opacity-0 translate-y-4': !targetIsVisible,
            'opacity-100 translate-y-0': targetIsVisible
        }"
        :style="{ 'transition-delay': `${delay}ms` }"
    >
        <h2 class="text-xl md:text-2xl font-medium text-green-900 mb-4">
            {{ category.name }}
        </h2>

        <ul
            v-if="category.technologies"
            class="flex flex-row gap-4 flex-wrap"
        >
            <li
                v-for="technology in category.technologies"
                :key="technology.name"
            >
                <TechnologyCard :technology="technology" />
            </li>
        </ul>
    </div>
</template>

<style scoped>

</style>
