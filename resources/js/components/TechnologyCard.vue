<script setup lang="ts">
import { PropType } from 'vue';
import TechnologyInterface from '@/interfaces/technologyInterface';

const { technology } = defineProps({
    technology: Object as PropType<TechnologyInterface>
});
</script>

<template>
    <div v-if="technology"
        class="border border-neutral-200 bg-neutral-50 shadow-sm rounded-lg py-1 px-2 hover:scale-105"
    >
        <a :href="technology.website" target="_blank" rel="noopener" class="text-sm inline">
            <i v-if="technology.icon" :class="technology.icon" class="mr-2"></i>
            {{ technology.name }}
        </a>
    </div>
</template>

<style scoped>

</style>
