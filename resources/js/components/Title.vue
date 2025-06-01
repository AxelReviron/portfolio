<script setup lang="ts">

const props = defineProps({
    'label': String,
});
</script>

<template>
    <h2 class="text-4xl md:text-4xl font-medium text-green-900 mb-4">
        {{ props.label }}
    </h2>
</template>

<style scoped>

</style>
