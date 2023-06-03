<script>
export default {
    props: {
        text: String,
        action: Function,
    },
    method: {
        test() {
            console.log("test");
        },
    },
};
</script>

<template>
    <button
        class="bg-slate-400 hover:bg-slate-300 py-1 px-2 rounded-md text-slate-800"
        @click="
            () => {
                action();
            }
        "
    >
        {{ text }}
    </button>
</template>
