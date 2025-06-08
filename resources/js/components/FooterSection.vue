<script setup lang="ts">
import { useI18n } from 'vue-i18n';

const { t } = useI18n()
const currentLocale = useI18n().locale;

</script>

<template>
    <footer class="bg-white/10 backdrop-blur-sm border border-t-white/50 border-b-0 border-r-0 border-l-0 p-4">
        <ul class="flex flex-row justify-center gap-4 text-white">
            <li>
                <a :href="route('legal-notice', { locale: currentLocale })" class="hover:underline">
                    {{ $t("footer.legal_notice") }}
                </a>
            </li>
            <li>
                <a :href="route('privacy-policy', { locale: currentLocale })" class="hover:underline">
                    {{ $t("footer.privacy_policy") }}
                </a>
            </li>
        </ul>
    </footer>

</template>

<style scoped>

</style>
