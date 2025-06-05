<script setup lang="ts">
import NavBar from '@/components/NavBar.vue';
import { onMounted, onUnmounted, ref } from 'vue';
import 'atropos/css'
import Atropos from 'atropos';
import { gsap } from "gsap";
import { SplitText } from "gsap/SplitText";
import { TextPlugin } from "gsap/TextPlugin";

gsap.registerPlugin(SplitText)
gsap.registerPlugin(TextPlugin);

const scrollY = ref(0);
const navBarFixed = ref(false);
const otherSection = ref(false);
const atroposRef = ref<HTMLElement | null>(null);

function handleScroll() {
    scrollY.value = window.scrollY;

    if (navBarFixed.value === false && (window.innerHeight / scrollY.value) <= 1.5) {
        navBarFixed.value = true;
    } else if (navBarFixed.value === true && (window.innerHeight / scrollY.value) > 1.5) {
        navBarFixed.value = false;
    }

    if (otherSection.value === false && (window.innerHeight / scrollY.value) <= 1.1) {
        otherSection.value = true;
    } else if (otherSection.value === true && (window.innerHeight / scrollY.value) > 1.1) {
        otherSection.value = false;
    }
}

function animateTextAndTitles() {
    let splitTitles = SplitText.create(".splitTitles", { type: "words, chars" });

    gsap.set('.cursor', { autoAlpha: 0 });

    gsap.to('.cursor', {
        delay: 2,
        duration: 1,
        autoAlpha: 1,
        repeat: -1,
        yoyo: false,
        ease: 'none'
    })

    gsap.to('.typewriter', {
        delay: 2,
        text : "Dedicated developer focused on crafting clean, secure, and user-friendly digital products.\n" +
            "Thrives on continuous learning and crafting quality code.\n" +
            "From websites and APIs to web applications and even video games, loves bringing ideas to life !\n" +
            "Strong belief in data privacy; also enjoys exploring and self-hosting open-source solutions.",
        duration: 5,
        autoAlpha: 1,
        ease :  'none'
    })


    gsap.from(splitTitles.chars, {
        duration: 1,
        y: -50,
        autoAlpha: 0,
        stagger: 0.05,
    });
}

onMounted(() => {
    window.addEventListener('scroll', handleScroll);

    if (atroposRef.value) {
        Atropos({
            el: atroposRef.value,
            duration: 300,
            activeOffset: 50,
            shadowScale: 1.01,
            highlight: false,
            rotateXInvert: false,
            rotateYInvert: false,
            rotateXMax: 5,
            rotateYMax: 5,
            alwaysActive: true,

        });
    }

    document.fonts.ready.then(() => {
        animateTextAndTitles();
    });
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>

<template>
    <div
        class="home-section-container min-h-screen flex justify-center items-center relative overflow-hidden flex flex-col gap-8"
        :class="{ 'pb-19': navBarFixed }"
    >
        <div class="flex flex-col md:flex-row justify-center items-center md:gap-8 z-10">
            <div class="flex flex-col">
                <h1 class="text-4xl font-medium text-green-900 mb-2 block md:hidden">
                    Axel Reviron
                </h1>
                <h2 class="text-2xl text-green-800 mb-4 block md:hidden">
                    Full Stack Web Developer
                </h2>

                <div
                    class="atropos my-atropos w-84 md:w-64"
                    ref="atroposRef"
                >
                    <div class="atropos-scale">
                        <div class="atropos-rotate">
                            <div class="atropos-inner">
                                <img
                                    class="atropos-layer absolute object-cover rounded-3xl border-4 border-transparent"
                                    src="../../images/background_image.png" alt="background"
                                    data-atropos-offset="-1"
                                />
                                <img
                                    class="absolute object-cover rounded-3xl border-4 border-transparent relative"
                                    src="../../images/picture_transparent.png"
                                    alt="picture"
                                    data-atropos-offset="1"
                                />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="flex flex-col h-70 md:h-100 justify-center items-start gap-3 w-84 md:w-120">
                <div class="splitTitles">
                    <h1 class="md:text-4xl font-bold text-green-900 hidden md:block">
                        Axel Reviron
                    </h1>
                    <h2 class="md:text-[1.6rem] text-green-800 hidden md:block font-medium font-mono">
                        Full Stack Web Developer
                    </h2>
                </div>
<!--                <p class="splitText text-xl md:text-lg text-[#213225] text-shadow-xs max-w-lg font-normal leading-6">-->
<!--                    Dedicated developer focused on crafting clean, secure, and user-friendly digital products.-->
<!--                    Thrives on continuous learning and crafting quality code.-->
<!--                    From websites and APIs to web applications and even video games, loves bringing ideas to life !-->
<!--                    Strong belief in data privacy; also enjoys exploring and self-hosting open-source solutions.-->
<!--                </p>-->
                <p><span class="typewriter"></span><span class="cursor">▌</span></p>
            </div>
        </div>

        <NavBar :isFixed="navBarFixed" :isOtherSection="otherSection"/>
    </div>
</template>

<style scoped>
.home-section-container {
    background-image: url("../../images/abstract-gradient.png");
    background-repeat: no-repeat;
    background-size: cover;
}

.my-atropos {
    width: 21rem; /* Equivalent de w-84 */
    height: 21rem; /* Assure que le conteneur Atropos a une taille définie */
}

@media (min-width: 768px) {
    .my-atropos {
        width: 16rem; /* Equivalent de md:w-64 */
        height: 16rem;
    }
}

/* S'assurer que l'image à l'intérieur d'Atropos remplit le conteneur */
.my-atropos img {
    width: 100%;
    height: 100%;
}
</style>
