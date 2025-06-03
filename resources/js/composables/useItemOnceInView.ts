import { useIntersectionObserver } from '@vueuse/core';
import { onBeforeUnmount, onMounted, ref } from 'vue';

export default function useItemOnceInView(item: ref<HTMLElement>, itemHasBeenSeen: ref<boolean>, threshold: number = 0.1) {
    const observers: Array<ReturnType<typeof useIntersectionObserver>> = [];

    onMounted(() => {
        const { stop } = useIntersectionObserver(item.value, ([entry]) => {// watch each ref
            if (entry?.isIntersecting && !itemHasBeenSeen.value) {// If ref is visible and has not been seen
                    itemHasBeenSeen.value = true;
                    stop(); // Stop watching ref
                }
            },
            { threshold }
        );
        observers.push(stop);// Save stop fn in order to remove observers
    });

    onBeforeUnmount(() => {// Remove observers
        observers.forEach(stop => stop());
    });
}
