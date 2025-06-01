<script setup lang="ts">

const props = defineProps({
    category: String,
    technologies: {
        label: String,
        icon: String
    }
});
</script>

<template>
    <div class="bg-white shadow-sm px-4 py-2 rounded-lg w-84 h-42">
        <h2 class="text-xl md:text-2xl font-medium text-green-900 mb-4">
            {{ props.category }}
        </h2>

        <div class="flex flex-row gap-4 flex-wrap">
            <div
                v-for="technology in props.technologies"
                :key="technology.label"
                class="border border-neutral-200 bg-neutral-50 shadow-sm rounded-lg py-1 px-2"
            >
                <i v-if="technology.icon" :class="technology.icon" class="mr-2"></i>
                <p class="text-sm inline">
                    {{ technology.label }}
                </p>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
