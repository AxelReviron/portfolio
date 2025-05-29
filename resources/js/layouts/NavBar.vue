<script setup lang="ts">

import { Briefcase, Code, Github, Linkedin, Mail, Wrench } from 'lucide-vue-next';

const navItems = [
    { icon: Wrench, label: 'Technologies', href: '#technologies' },
    { icon: Briefcase, label: 'Experiences', href: '/experiences' },
    { icon: Code, label: 'Projects', href: '#projects' },
    { icon: Mail, label: 'Contact', href: 'mailto:axel-reviron@proton.me' },
    { icon: Linkedin, label: 'LinkedIn', href: 'https://linkedin.com/' },
    { icon: Github, label: 'GitHub', href: 'https://github.com/' },
];

</script>

<template>
    <header>
        <ul>
            <li v-for="navItem in navItems" :key="navItem.label">
                <a key={{navItem.label}} href={{navItem.href}}>
                    <component :is="navItem.icon" />
                    <span>
                        {{navItem.label}}
                    </span>
                </a>
            </li>
        </ul>
    </header>
</template>

<style scoped>
</style>
