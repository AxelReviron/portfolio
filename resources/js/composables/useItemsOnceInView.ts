import { useIntersectionObserver } from '@vueuse/core';
import { onBeforeUnmount, onMounted, ref } from 'vue';

export default function useItemsOnceInView(items: ref<HTMLElement[]>, itemHasBeenSeen: ref<boolean[]>, threshold: number = 0.1) {
    if (!items.length === itemHasBeenSeen.length) {
        return;
    }

    const observers: Array<ReturnType<typeof useIntersectionObserver>> = [];

    onMounted(() => {
        items.value.forEach((item, index) => {
            if (item) {
                const { stop } = useIntersectionObserver(item, ([entry]) => {// watch each ref
                    if (entry?.isIntersecting && !itemHasBeenSeen.value[index]) {// If ref is visible and has not been seen
                        itemHasBeenSeen.value[index] = true;
                        stop(); // Stop watching ref
                    }},
                    { threshold }
                );
                observers.push(stop);// Save stop fn in order to remove observers
            }
        });
    });

    onBeforeUnmount(() => {// Remove observers
        observers.forEach(stop => stop());
    });
}
