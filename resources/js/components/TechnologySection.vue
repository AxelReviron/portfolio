<script setup lang="ts">
import Title from '@/components/Title.vue';
import TechnoCard from '@/components/TechnologyCategoryCard.vue';

const technoCardDatas = [// TODO: Get from backend
    {
        category: 'Frontend',
        technologies: [
            {
                label: 'VueJS',
                icon: 'devicon-vuejs-plain colored',
                website: ''
            },
            {
                label: 'Nuxt',
                icon: 'devicon-nuxtjs-plain colored',
                website: '/'
            },
            {
                label: 'Tailwind CSS',
                icon: 'devicon-tailwindcss-original colored',
                website: '/'
            },
            {
                label: 'Inertia',
                icon: null,
                website: '/'
            },
        ]
    },
    {
        category: 'Backend',
        technologies: [
            {
                label: 'Laravel',
                icon: 'devicon-laravel-original colored',
                website: '/'
            },
            {
                label: 'Node.js',
                icon: 'devicon-nodejs-plain-wordmark colored',
                website: '/'
            },
            {
                label: 'MySQL',
                icon: 'devicon-mysql-original colored',
                website: '/'
            },
        ]
    },
    {
        category: 'Tools & Services',
        technologies: [
            {
                label: 'Git',
                icon: 'devicon-git-plain colored',
                website: '/'
            },
            {
                label: 'Docker',
                icon: 'devicon-docker-plain colored',
                website: '/'
            },
            {
                label: 'Linux',
                icon: 'devicon-linux-plain colored',
                website: '/'
            },
            {
                label: 'Bash',
                icon: 'devicon-bash-plain colored',
                website: '/'
            },
            {
                label: 'Penpot',
                icon: null,
                website: '/'
            },
        ]
    },
    {
        category: 'Videos Games & Others',
        technologies: [
            {
                label: 'Godot',
                icon: 'devicon-godot-plain colored',
                website: '/'
            },
            {
                label: 'Blender',
                icon: 'devicon-blender-original colored',
                website: '/'
            },
            {
                label: 'FL Studio',
                icon: null,
                website: '/'
            },
        ]
    },
];
</script>

<template>
    <div id="technologies" class="min-h-screen flex justify-center items-center relative overflow-hidden bg-green-100">
        <div class="flex flex-col justify-center items-center w-300">
            <Title label="Technologies"/>
            <p class="text-lg md:text-xl text-neutral-600 text-center w-sm px-4 md:px-0 md:w-2xl mb-8 leading-relaxed">
                I'm constantly learning and exploring new technologies, but these are the main tools and frameworks I use to bring ideas to life.
            </p>

            <div class="flex flex-wrap flex-row gap-4 justify-center">
                <div
                    :key="technoCardData.category"
                    v-for="technoCardData in technoCardDatas"
                >
                    <TechnoCard :category="technoCardData.category" :technologies="technoCardData.technologies"/>
                </div>
            </div>
        </div>

    </div>
</template>

<style scoped>
</style>
