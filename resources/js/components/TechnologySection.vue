<script setup lang="ts">
import Title from '@/components/Title.vue';
import TechnologyCategoryCard from '@/components/TechnologyCategoryCard.vue';
import { PropType } from 'vue';
import CategoryInterface from '@/interfaces/categoryInterface';
import { useI18n } from 'vue-i18n';

const { t } = useI18n()

const { categories } = defineProps({
    categories: Array as PropType<CategoryInterface[]>
});

const baseDelay = 100;
const delayIncrement = 150;

</script>

<template>
    <div id="technologies" class="py-24 md:py-42 flex justify-center items-center relative overflow-hidden bg-green-50">
        <div class="flex flex-col justify-center items-center w-300">
            <Title :label="$t('technology.title')"/>
            <p class="text-lg md:text-xl text-neutral-600 text-center w-sm px-4 md:px-0 md:w-2xl mb-8 leading-relaxed">
                {{ $t("technology.text") }}
            </p>

            <div class="flex flex-wrap flex-row gap-4 justify-center">
                <div
                    :key="category.name"
                    v-for="(category, index) in categories"
                >
                    <TechnologyCategoryCard :category="category" :delay="baseDelay + (index * delayIncrement)"/>
                </div>
            </div>
        </div>

    </div>
</template>

<style scoped>
</style>
