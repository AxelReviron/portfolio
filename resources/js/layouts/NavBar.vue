<script setup lang="ts">
import { Briefcase, Code, Github, Linkedin, Mail, Wrench } from 'lucide-vue-next';

const props = defineProps({
    'isFixed': Boolean,
    'isOtherSection': Boolean
});
const navItems = [
    { icon: Wrench, label: 'Technologies', href: '#technologies' },
    { icon: Briefcase, label: 'Experiences', href: '/experiences' },
    { icon: Code, label: 'Projects', href: '#projects' },
    { icon: Mail, label: 'Contact', href: 'mailto:axel-reviron@proton.me' },
    { icon: Linkedin, label: 'LinkedIn', href: 'https://www.linkedin.com/in/axel-reviron/' },
    { icon: Github, label: 'GitHub', href: 'https://github.com/AxelReviron' },
];

</script>

<template>
    <header :class="{ 'fixed bottom-6 md:top-25 left-1/2 -translate-x-1/2 z-50': props.isFixed }">
        <nav class="bg-white/30 backdrop-blur-sm px-6 py-3 rounded-full shadow-lg border border-white/50">
            <ul :class="['flex', 'items-center', 'gap-4', isOtherSection ? 'text-green-700' : 'text-green-100' ]">
                <li v-for="navItem in navItems" :key="navItem.label">
                    <a
                        key={{navItem.label}}
                        href={{navItem.href}}
                        class="flex items-center gap-2 px-2 py-1 rounded-full transition-colors group"
                    >
                        <component
                            :is="navItem.icon"

                            stroke-width="2"
                            class="group-hover:text-green-700 transition-colors"
                        />
                        <span class="text-xl group-hover:text-green-700 transition-colors hidden md:block">
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
