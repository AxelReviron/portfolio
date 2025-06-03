<script setup lang="ts">
import Title from '@/components/Title.vue';
import { PropType, ref } from 'vue';
import ExperienceInterface from '@/interfaces/experienceInterface';
import { ExternalLink } from 'lucide-vue-next';
import useOnceInView from '@/composables/useItemsOnceInView';

const { experiences } = defineProps({
    experiences: Array as PropType<ExperienceInterface[]>,
})

const experienceRefs = ref<HTMLElement[]>([]);
const itemHasBeenSeen = ref<boolean[]>([]);

const baseDelay = 100;
const delayIncrement = 150;

useOnceInView(experienceRefs, itemHasBeenSeen);

function formatExperiencePeriod(startDateString: string, endDateString: string | null): string {
    const options: Intl.DateTimeFormatOptions = { month: 'short', year: 'numeric' };
    const startDate = new Date(startDateString);
    const formattedStart = startDate.toLocaleString('en-US', options);

    if (!endDateString) {
        return `${formattedStart} - Present`;
    }

    const endDate = new Date(endDateString);

    // Check if year and month are the same
    if (startDate.getFullYear() === endDate.getFullYear() &&
        startDate.getMonth() === endDate.getMonth()) {
        return formattedStart;
    }

    const formattedEnd = endDate.toLocaleString('en-US', options);
    return `${formattedStart} - ${formattedEnd}`;
}
</script>

<template>

    <div id="experiences" class="py-24 md:py-42 flex justify-center items-center relative overflow-hidden bg-white">
        <div class="flex flex-col justify-center items-center w-300">
            <Title label="Experiences"/>
            <ul class="mx-6 md:mr-0 mt-8 border-l-5 border-green-200 flex flex-col justify-start">
                <li
                    v-for="(experience, index) in experiences"
                    :key="experience.name"
                    :ref="(element) => { if (element) experienceRefs[index] = element as HTMLElement; }"
                    class="ml-8 mb-8 text-lg relative duration-600 ease-in"
                    :class="{
                        'opacity-0 translate-x-24': !itemHasBeenSeen[index],
                        'opacity-100 translate-x-0': itemHasBeenSeen[index]
                    }"
                    :style="{ 'transition-delay': `${baseDelay + (index * delayIncrement)}ms` }"
                >
                    <div class="absolute -left-11 top-1.5 w-5 h-5 bg-green-700 rounded-full border-2 border-white"></div>
                    <h3 class="text-xl text-green-700 font-bold mb-2">
                        {{ formatExperiencePeriod(experience.start_date, experience.end_date) }}
                    </h3>
                    <div class="flex flex-row gap-2">
                        <h4 class="text-lg text-neutral-500 font-medium mb-4 text-xl">
                            {{ experience.name }}
                        </h4>
                        <a v-if="experience.website" :href="experience.website" target="_blank">
                            <ExternalLink class="mt-1 text-green-600 w-5 h-5"/>
                        </a>
                    </div>
                    <p v-html="experience.description" class="md:w-200 text-lg md:text-justify"></p>
                </li>
            </ul>

        </div>

    </div>
</template>

<style scoped>
</style>
