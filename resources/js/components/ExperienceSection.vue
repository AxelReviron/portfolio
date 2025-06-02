<script setup lang="ts">
import Title from '@/components/Title.vue';
import { onMounted, PropType } from 'vue';
import ExperienceInterface from '@/interfaces/experienceInterface';

const { experiences } = defineProps({
    experiences: Array as PropType<ExperienceInterface[]>,
})

onMounted(() => {
    console.log(experiences)
})
</script>

<template>

    <div id="experiences" class="py-42 flex justify-center items-center relative overflow-hidden bg-white">
        <div class="flex flex-col justify-center items-center w-300">
            <Title label="Experience"/>
            <p class="text-lg md:text-xl text-neutral-600 text-center w-sm px-4 md:px-0 md:w-2xl mb-8 leading-relaxed">
                lorem ipsum
            </p>


        </div>

    </div>
</template>

<style scoped>
</style>
