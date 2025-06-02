<script setup lang="ts">
import { Briefcase, Code, Github, Linkedin, Mail, Wrench } from 'lucide-vue-next';
import { gsap } from "gsap";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";

gsap.registerPlugin(ScrollToPlugin);

const props = defineProps({
    'isFixed': Boolean,
    'isOtherSection': Boolean
});
const navItems = [
    { icon: Wrench, label: 'Technologies', href: '#technologies' },
    { icon: Briefcase, label: 'Experiences', href: '#experiences' },
    { icon: Code, label: 'Projects', href: '#projects' },
    { icon: Mail, label: 'Contact', href: 'mailto:axel-reviron@proton.me' },
    { icon: Linkedin, label: 'LinkedIn', href: 'https://www.linkedin.com/in/axel-reviron/' },
    { icon: Github, label: 'GitHub', href: 'https://github.com/AxelReviron' },
];

function scrollToSection(id: string): void {
    gsap.to(window, { duration: 1, scrollTo: id });
}

</script>

<template>
    <header :class="{ 'fixed top-[92vh] md:top-27 left-1/2 -translate-x-1/2 z-50': props.isFixed }">
        <nav class="bg-white/30 backdrop-blur-sm px-4 py-2 rounded-full shadow-lg border border-white/50">
            <ul :class="['flex', 'items-center', 'gap-4', isOtherSection ? 'text-green-700' : 'text-green-100' ]">
                <li v-for="navItem in navItems" :key="navItem.label" class="cursor-pointer">
                    <a
                        :key="navItem.label"
                        @click="scrollToSection(navItem.href)"
                        class="flex items-center gap-2 px-2 py-1 rounded-full transition-colors group"
                    >
                        <component
                            :is="navItem.icon"
                            stroke-width="2"
                            class="group-hover:text-green-700 transition-colors"
                        />
                        <span class="text-sm group-hover:text-green-700 transition-colors hidden md:block">
                            {{navItem.label}}
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
</template>

<style scoped>
</style>
