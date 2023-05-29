<script>
export default {
    data() {
        return {
            count: 0,
        };
    },
};
</script>

<template>
    <button class="bg-slate-500" @click="count++">
        You clicked me {{ count }} times.
    </button>
</template>
