<script setup lang="ts">

import NavBar from '@/layouts/NavBar.vue';
import { onMounted, onUnmounted, ref } from 'vue';

const scrollY = ref(0);
const navBarFixed = ref(false);

const handleScroll = () => {
    scrollY.value = window.scrollY;

    if (navBarFixed.value === false && (window.innerHeight / scrollY.value) <= 1.7) {
        navBarFixed.value = true;
    } else if (navBarFixed.value === true && (window.innerHeight / scrollY.value) > 1.7) {
        navBarFixed.value = false;
    }

};

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>

<template>
    <div class="home-section-container min-h-screen flex justify-center items-center relative overflow-hidden flex flex-col gap-8">
        <div class="flex flex-col md:flex-row justify-center items-center md:gap-8 z-10">
            <div class="flex flex-col">
                <h1 class="text-4xl md:text-6xl font-medium text-green-900 mb-2 block md:hidden">
                    Axel Reviron
                </h1>
                <h2 class="text-2xl md:text-4xl text-green-800 mb-4 block md:hidden">
                    Full Stack Web Developer
                </h2>
                <img
                    class="w-84 md:w-96 object-cover rounded-3xl border-4 border-transparent shadow-lg relative"
                    src="../../images/picture.jpg"
                    alt="picture"
                />
            </div>
            <div class="flex flex-col h-70 md:h-100 justify-center items-start gap-2 w-84 md:w-120">
                <h1 class="text-4xl md:text-6xl font-medium text-green-900 mb-2 hidden md:block">
                    Axel Reviron
                </h1>
                <h2 class="text-2xl md:text-4xl text-green-800 mb-4 hidden md:block">
                    Full Stack Web Developer
                </h2>
                <p class="text-xl md:text-xl text-green-100 max-w-lg mb-8 leading-relaxed">
                    Dedicated developer focused on crafting clean, secure, and user-friendly digital products.
                    Thrives on continuous learning and crafting quality code.
                    From websites and APIs to web applications and even video games, loves bringing ideas to life !
                    Strong belief in data privacy; also enjoys exploring and self-hosting open-source solutions.
                </p>
            </div>
        </div>

        <NavBar :isFixed="navBarFixed"/>
    </div>
</template>

<style scoped>
.home-section-container {
    background-image: url("../../images/abstract-gradient.png");
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
