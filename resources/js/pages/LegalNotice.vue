<script setup lang="ts">
import Title from '@/components/Title.vue';
import { useI18n } from 'vue-i18n';
import { Undo2 } from 'lucide-vue-next';
import FooterSection from '@/components/FooterSection.vue';

const { t } = useI18n();
const currentLocale = useI18n().locale;

</script>

<template>
    <div class="legal-notice-container bg-white w-[100vw] h-[100vh] pt-8">
        <div class="w-8/12 mx-auto text-green-800">
            <div class="flex flex-row justify-between">
                <Title :label="t('legal.title')" />
                <button>
                    <a
                        :href="route('home', { locale: currentLocale })"
                        class="text-white flex flex-row gap-2 items-center border bg-green-800 hover:bg-green-700 border-green-800 rounded-lg px-2 py-1">
                        {{ $t('legal.returnBtn') }}
                        <Undo2 class="w-4 h-4" />
                    </a>
                </button>
            </div>
            <hr class="text-green-800 mb-8">
            <h2 class="text-2xl font-medium mb-4">{{ $t('legal.physicalPerson') }}</h2>
            <ul>
                <li><span class="font-medium">{{ $t('legal.lastname') }} {{ $t('legal.firstName') }} : </span>Axel Reviron</li>
                <li><span class="font-medium">{{ $t('legal.directorOfPublication') }} : </span>Axel Reviron</li>
                <li><span class="font-medium">{{ $t('legal.email') }} : </span>contact@axel-reviron.fr</li>
            </ul>
            <h2 class="text-2xl font-medium my-4">{{ $t('legal.hosting') }}</h2>
            <ul>
                <li><span class="font-medium">{{ $t('legal.name') }} : </span>OVH</li>
                <li><span class="font-medium">{{ $t('legal.compagnyName') }} : </span>OVH SAS</li>
                <li><span class="font-medium">{{ $t('legal.address') }} : </span>2 {{ $t('legal.street') }} Kellermann - 59100
                    Roubaix - France
                </li>
                <li><span class="font-medium">{{ $t('legal.phone') }} : </span>08 90 10 92 72</li>
            </ul>
        </div>
        <FooterSection class="fixed bottom-0 w-[100vw]"/>
    </div>
</template>

<style scoped>
.legal-notice-container {
    background-image: url("../../images/abstract-gradient.webp");
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
