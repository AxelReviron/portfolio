<script setup lang="ts">
import { Briefcase, Code, Github, Linkedin, Mail, Wrench } from 'lucide-vue-next';
import { gsap } from "gsap";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";
import { router } from '@inertiajs/vue3';
import { useI18n } from 'vue-i18n';

gsap.registerPlugin(ScrollToPlugin);
const { t } = useI18n()

const currentLocale = useI18n().locale;
const localeToFlag = {
    'en': 'us',
    'fr': 'fr',
};

const props = defineProps({
    'isFixed': Boolean,
    'isOtherSection': Boolean
});

const navItems = [
    { icon: Wrench, label: t("technology.title"), href: '#technologies' },
    { icon: Briefcase, label: t("experience.title"), href: '#experiences' },
    { icon: Code, label: t("project.title"), href: '#projects' },
    { icon: Mail, label: t("contact.title"), href: '#contact' },
    { icon: Linkedin, label: t("socials.linkedin"), href: 'https://www.linkedin.com/in/axel-reviron/' },
    { icon: Github, label: t("socials.github"), href: 'https://github.com/AxelReviron' },
];

function scrollToSection(link: string): void {
    event.preventDefault();
    if (link.startsWith('#')) {
        gsap.to(window, { duration: 1, scrollTo: link });
    } else {
        window.open(link, '_blank');
    }
}

function changeLocale(newLocale: string): void {
    if (newLocale === currentLocale.value) {
        return;
    }

    currentLocale.value = newLocale;

    router.get(route('home', { locale: newLocale }), {}, {
        preserveScroll: true,
        preserveState: false,
    });
}

</script>

<template>
    <header :class="{ 'fixed top-[92vh] md:top-10 left-1/2 -translate-x-1/2 z-50': props.isFixed }">
        <nav class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full shadow-lg border border-white/50">
            <ul :class="['flex', 'items-center', 'gap-4', isOtherSection ? 'text-green-700' : 'text-green-100' ]">
                <li v-for="navItem in navItems" :key="navItem.label" class="cursor-pointer">
                    <a
                        :key="navItem.label"
                        @click="scrollToSection(navItem.href)"
                        :href="navItem.href"
                        class="flex items-center gap-2 px-2 py-1 rounded-full transition-colors group"
                        rel="noopener"
                    >
                        <component
                            :is="navItem.icon"
                            stroke-width="2"
                            class="group-hover:text-green-800 transition-colors"
                        />
                        <span class="text-sm group-hover:text-green-800 transition-colors hidden md:block">
                            {{navItem.label}}
                        </span>
                    </a>
                </li>
                <template v-for="(flagCode, locale) in localeToFlag" :key="locale">
                    <li class="cursor-pointer" v-if="locale !== currentLocale">
                        <button
                            aria-label="change locale"
                            @click="changeLocale(locale)"
                            class="cursor-pointer"
                        >
                            <span :class="`fi fi-${flagCode}`"></span>
                        </button>
                    </li>
                </template>
            </ul>
        </nav>
    </header>
</template>

<style scoped>
</style>
