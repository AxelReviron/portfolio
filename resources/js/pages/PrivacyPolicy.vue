<script setup lang="ts">
import FooterSection from '@/components/FooterSection.vue';
import Title from '@/components/Title.vue';
import { Undo2 } from 'lucide-vue-next';
import { useI18n } from 'vue-i18n';

const { t } = useI18n()
const currentLocale = useI18n().locale;

</script>

<template>
    <div class="privacy-policy-container bg-white pt-8">
        <div class="w-8/12 mx-auto text-green-800">
            <div class="flex flex-row justify-between">
                <Title :label="t('privacy.title')" />
                <button>
                    <a
                        :href="route('home', { locale: currentLocale })"
                        class="text-white flex flex-row gap-2 items-center border bg-green-800 hover:bg-green-700 border-green-800 rounded-lg px-2 py-1">
                        {{ $t('privacy.returnBtn') }}
                        <Undo2 class="w-4 h-4" />
                    </a>
                </button>
            </div>
            <hr class="text-green-800 mb-8">
            <h2 class="text-2xl font-medium mb-4">{{ $t('privacy.PersonalDataProcessing') }}</h2>
            <h3 class="text-2xl font-medium mb-4">{{ $t('privacy.responsible') }}</h3>
            <p class="mb-6">Axel Reviron</p>
            <h3 class="text-2xl font-medium mb-4">{{ $t('privacy.legalBasis') }}</h3>
            <p class="mb-6">{{ $t('privacy.legalBasisText') }}</p>
            <h3 class="text-2xl font-medium mb-4">{{ $t('privacy.typeOfDataCollected') }}</h3>
            <ul class="mb-6">
                <li>{{ $t('privacy.lastName') }}</li>
                <li>{{ $t('privacy.firstName') }}</li>
                <li>{{ $t('privacy.email') }}</li>
            </ul>
            <h3 class="text-2xl font-medium mb-4">{{ $t('privacy.ReasonForCollection') }}</h3>
            <p class="mb-6">{{ $t('privacy.ReasonForCollectionText') }}</p>
            <h3 class="text-2xl font-medium mb-4">{{ $t('privacy.DataRetentionPeriod') }}</h3>
            <p class="mb-6">{{ $t('privacy.DataRetentionPeriodText') }}</p>
            <h3 class="text-2xl font-medium mb-4">{{ $t('privacy.RecipientOfData') }}</h3>
            <p class="mb-6">Axel Reviron</p>
            <h3 class="text-2xl font-medium mb-4">{{ $t('privacy.DataTransfer') }}</h3>
            <p class="mb-6">{{ $t('privacy.DataTransferText') }}</p>
            <h3 class="text-2xl font-medium mb-4">{{ $t('privacy.UserRights') }}</h3>
            <p class="mb-6">{{ $t('privacy.UserRightsText') }}</p>
            <ul class="mb-6">
                <li>
                    {{ $t('privacy.accessRight') }}
                    <a href="" class="text-white hover:underline">
                        Article 15
                    </a>
                </li>
                <li>
                    {{ $t('privacy.rectificationRight') }}
                    <a href="" class="text-white hover:underline">
                        Article 16
                    </a>
                </li>
                <li>
                    {{ $t('privacy.erasureRight') }}
                    <a href="" class="text-white hover:underline">
                        Article 17
                    </a>
                </li>
                <li>
                    {{ $t('privacy.limitProcessingRight') }}
                    <a href="" class="text-white hover:underline">
                        Article 18
                    </a>
                </li>
                <li>
                    {{ $t('privacy.objectToProcessing') }}
                    <a href="" class="text-white hover:underline">
                        Article 21
                    </a>
                </li>
                <li>
                    {{ $t('privacy.dataPortabilityRight') }}
                    <a href="" class="text-white hover:underline">
                        Article 20
                    </a>
                </li>
                <li>
                    {{ $t('privacy.withdrawConsentRight') }}
                    <a href="" class="text-white hover:underline">
                        Article 12
                    </a>
                </li>
                <li>
                    {{ $t('privacy.lodgeComplaintRight') }}
                    <a href="" class="text-white hover:underline">
                        Article 77
                    </a>
                </li>
            </ul>
        </div>
        <FooterSection/>
    </div>
</template>

<style scoped>
.privacy-policy-container {
    background-image: url("../../images/abstract-gradient.webp");
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
