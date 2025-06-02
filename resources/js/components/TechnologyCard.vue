<script setup lang="ts">
const props = defineProps({
    label: String,
    icon: String,
    website: String
});
</script>

<template>
    <div class="border border-neutral-200 bg-neutral-50 shadow-sm rounded-lg py-1 px-2 hover:scale-105">
        <a :href="props.website" class="text-sm inline">
            <i v-if="props.icon" :class="props.icon" class="mr-2"></i>
            {{ props.label }}
        </a>
    </div>
</template>

<style scoped>

</style>
