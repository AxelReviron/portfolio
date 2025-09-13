<script setup lang="ts">
import NavBar from '@/components/NavBar.vue';
import { onMounted, onUnmounted, ref } from 'vue';
import 'atropos/css'
import Atropos from 'atropos';
import { gsap } from "gsap";
import { SplitText } from "gsap/SplitText";
import { TextPlugin } from "gsap/TextPlugin";
import { useI18n } from 'vue-i18n';

gsap.registerPlugin(SplitText)
gsap.registerPlugin(TextPlugin);

const { t } = useI18n()
const scrollY = ref(0);
const navBarFixed = ref(false);
const otherSection = ref(false);
const atroposRef = ref<HTMLElement | null>(null);

function updateNavbarComportment() {
    scrollY.value = window.scrollY;
    const currentRatio = window.innerHeight / scrollY.value;

    if (currentRatio <= 1.5) {
        navBarFixed.value = true;
    } else if (currentRatio > 1.5) {
        navBarFixed.value = false;
    }

    if (currentRatio <= 0.21) {
        otherSection.value = false;
    } else {
        otherSection.value = currentRatio <= 1.1;
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
        text: t("home.description"),
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
    window.addEventListener('scroll', updateNavbarComportment);

    if (atroposRef.value) {
        Atropos({
            el: atroposRef.value,
            duration: 300,
            activeOffset: 50,
            shadowScale: 1.005,
            shadowOffset: 200,
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
    window.removeEventListener('scroll', updateNavbarComportment);
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
                    {{ $t("home.subtitle") }}
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
                                    src="../../images/background_image.webp" alt="background"
                                    data-atropos-offset="-1"
                                />
                                <img
                                    class="absolute object-cover rounded-3xl border-4 border-transparent relative"
                                    src="../../images/picture_transparent.webp"
                                    alt="picture"
                                    data-atropos-offset="1"
                                />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="flex flex-col h-70 md:h-100 justify-center items-start gap-3 w-84 md:w-120">
                <div class="splitTitles" role="region">
                    <h1 class="md:text-4xl font-bold text-green-900 hidden md:block">
                        Axel Reviron
                    </h1>
                    <h2 class="md:text-[1.6rem] text-green-800 hidden md:block font-medium font-mono">
                        {{ $t("home.subtitle") }}
                    </h2>
                </div>
                <p class="min-h-38">
                    <span class="typewriter"></span><span class="cursor">▌</span>
                </p>
            </div>
        </div>

        <NavBar :isFixed="navBarFixed" :isOtherSection="otherSection"/>
    </div>
</template>

<style scoped>
.home-section-container {
    background-image: url("../../images/abstract-gradient.webp");
    background-repeat: no-repeat;
    background-size: cover;
}

.my-atropos {
    width: 21rem;
    height: 21rem;
}

@media (min-width: 768px) {
    .my-atropos {
        width: 16rem;
        height: 16rem;
    }
}

.my-atropos img {
    width: 100%;
    height: 100%;
}
</style>
