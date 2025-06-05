<script setup lang="ts">
import Title from '@/components/Title.vue';
import { onMounted, ref } from 'vue';
import axios from 'axios';
import { usePage } from '@inertiajs/vue3';
import Atropos from 'atropos';

const page = usePage()
const atroposRef = ref<HTMLElement | null>(null);

const formData = ref({
    name: '',
    email: '',
    phone: '',
    message: '',
    consent: false
});

const notification = ref({
    show: false,
    message: '',
    type: 'success' as 'success' | 'error'
});

const errors = ref({});

function showNotification(message: string, type: 'success' | 'error') {
    notification.value = {
        show: true,
        message,
        type
    };

    setTimeout(() => {
        notification.value.show = false;
    }, 10000);
}

async function handleSubmit(e: Event) {
    e.preventDefault();
    errors.value = {};

    try {
        await axios.post('/contact', {
            _token: page.props.csrf_token,
            ...formData.value
        });

        formData.value = {
            name: '',
            email: '',
            phone: '',
            message: '',
            consent: false
        };

        showNotification('Message sent with success !', 'success');
    } catch (error: any) {
        if (error.response && error.response.status === 422) {// Validation errors
            errors.value = error.response.data.errors;
            showNotification('Please correct the errors in the form.', 'error');
        } else {// Other errors
            showNotification('An unexpected error occurred. Please try again.', 'error');
        }
    }
}
onMounted(() => {
    if (atroposRef.value) {
        Atropos({
            el: atroposRef.value,
            duration: 300,
            activeOffset: 50,
            shadow: false,
            highlight: false,
            rotateXInvert: false,
            rotateYInvert: false,
            rotateXMax: 5,
            rotateYMax: 5,
            alwaysActive: true,

        });
    }
})
// TODO: Ajouter une section a coté avec ma photo et les réseaux sociaux
</script>

<template>

    <div id="contact" class="py-42 flex justify-center items-center relative overflow-hidden">
        <div class="flex flex-col justify-center items-center w-300">
            <Title label="Contact" class="mb-8"/>
            <div class="w-95 md:w-200 border border-white/40 bg-white/30 backdrop-blur-lg p-6 rounded-xl shadow-lg flex flex-col md:flex-row gap-8">
                <!--Image & Socials-->
                <h2 class="hidden sm:visible text-xl md:text-2xl text-green-700 font-medium mx-auto">
                    Let's get in touch !
                </h2>
                <div class="flex flex-row-reverse md:flex-col gap-4">
                    <div class="flex flex-col gap-2 justify-between">
                        <h2 class="xs:hidden text-xl md:text-2xl text-green-700 font-medium">
                            Let's get in touch !
                        </h2>
                        <p class="pr-4 w-45 md:w-70 text-sm md:text-lg">
                            Whether you have a project in mind, a question about my work, or just want to connect, I'd love to hear from you.
                            Fill out the form, or reach out directly through
                            <a href="https://www.linkedin.com/in/axel-reviron/"><span class="text-green-800 font-medium">LinkedIn</span></a> or
                            <a href="mailto:axel-reviron@gmail.com"><span class="text-green-800 font-medium">Email</span></a>.
                        </p>
                    </div>
                    <div
                        class="atropos my-atropos w-38 md:w-64"
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

                <!--Form-->
                <div class="form-wrapper md:border-l-2 border-white/20 md:pl-6">
                    <form class="flex flex-col gap-2" name="contact" method="POST" @submit="handleSubmit">
                        <input type="hidden" name="form-name" value="contact" />
                        <div class="flex flex-col mb-2">
                            <label for="name" class="p-1 font-medium text-lg text-green-900">Name</label>
                            <input
                                type="text"
                                v-model="formData.name"
                                placeholder="Name"
                                class="w-80 md:w-100 bg-white/30 border border-green-700 focus:outline-green-800 p-2 rounded-lg text-green-700"
                                name="name"
                                required
                            >
                            <div v-if="errors.name" class="text-red-500 text-sm mt-1">{{ errors.name[0] }}</div>
                        </div>

                        <div class="flex flex-col mb-2">
                            <label for="email" class="p-1 font-medium text-lg  text-green-900">Email</label>
                            <input
                                type="email"
                                v-model="formData.email"
                                placeholder="Email"
                                name="email"
                                class="w-80 md:w-100 bg-white/30 border border-green-700 focus:outline-green-800 p-2 rounded-lg text-green-700"
                                required
                            >
                            <div v-if="errors.email" class="text-red-500 text-sm mt-1">{{ errors.email[0] }}</div>
                        </div>

                        <div class="flex flex-col mb-2">
                            <label for="phone" class="p-1 font-medium text-lg  text-green-900">Phone</label>
                            <input
                                type="text"
                                v-model="formData.phone"
                                placeholder="06 00 00 00 00"
                                class="w-80 md:w-100 bg-white/30 border border-green-700 focus:outline-green-800 p-2 rounded-lg text-green-700"
                                name="phone" >
                            <div v-if="errors.phone" class="text-red-500 text-sm mt-1">{{ errors.phone[0] }}</div>
                        </div>

                        <div class="flex flex-col mb-2">
                            <label for="message" class="p-1 font-medium text-lg  text-green-900">Message</label> <textarea
                            v-model="formData.message"
                            placeholder="Message"
                            class="w-80 md:w-100 bg-white/30 border border-green-700 focus:outline-green-800 p-2 rounded-lg text-green-700"
                            name="message" required
                        >
                            </textarea>
                            <div v-if="errors.message" class="text-red-500 text-sm mt-1">{{ errors.message[0] }}</div>
                        </div>

                        <div class="consent-group flex flex-row justify-around mb-2">
                            <input
                                type="checkbox"
                                v-model="formData.consent"
                                required
                                name="consent"
                            >
                            <label for="consent" class="text-sm font-normal">I agree that my data may be used to contact me</label>
                            <div v-if="errors.consent" class="text-red-500 text-sm mt-1">{{ errors.consent[0] }}</div>
                        </div>

                        <button
                            type="submit"
                            class="py-1 border border-green-700 bg-green-600 rounded-lg text-green-50 font-medium cursor-pointer"
                        >
                            Send
                        </button>
                    </form>

                </div>
            </div>
            <!--Notification-->
            <Transition
                enter-active-class="transition-all duration-300 ease-out"
                enter-from-class="opacity-0 translate-y-4 scale-95"
                enter-to-class="opacity-100 translate-y-0 scale-100"
                leave-active-class="transition-all duration-200 ease-in"
                leave-from-class="opacity-100 translate-y-0 scale-100"
                leave-to-class="opacity-0 translate-y-4 scale-95"
            >
                <div
                    v-if="notification.show"
                    id="toast-default"
                    class="fixed bottom-4 right-4 z-50 flex items-center w-full max-w-xs p-4 space-x-4 rtl:space-x-reverse rounded-lg shadow-sm"
                    :class="{
                            'text-green-700 bg-green-50 divide-green-200': notification.type === 'success',
                            'text-red-700 bg-red-50 divide-red-200': notification.type === 'error'
                        }"
                    role="alert"
                >
                    <div
                        class="inline-flex items-center justify-center shrink-0 w-8 h-8"
                        :class="{ 'text-green-600': notification.type === 'success', 'text-red-600': notification.type === 'error' }"
                    >
                        <div v-if="notification.type === 'error'">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                            </svg>
                            <span class="sr-only">Check icon</span>
                        </div>
                        <div v-if="notification.type === 'success'">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                            <span class="sr-only">Error icon</span>
                        </div>
                    </div>
                    <div class="ms-3 text-sm font-normal">{{ notification.message }}</div>
                    <button
                        type="button"
                        class="cursor-pointer ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-neutral-50 inline-flex items-center justify-center h-8 w-8"
                        :class="{ 'text-green-600': notification.type === 'success', 'text-red-600': notification.type === 'error' }"
                        data-dismiss-target="#toast-default" aria-label="Close"
                        @click="() => {notification.value.show = false}"
                    >
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
            </Transition>
        </div>
    </div>
</template>

<style scoped>
#contact {
    background-image: url("../../images/abstract-gradient.png");
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
