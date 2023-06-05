<script>
export default {
    data() {
        return {
            primaryClass: "bg-indigo-950 text-slate-100 py-1 px-1 text-xs ",
            secondaryClass:
                "border border-indigo-950 text-indigo-950 text-xs p-1",
        };
    },
    props: {
        text: String,
        action: Function,
        type: String,
    },
};
</script>
<template>
    <button :class="[type == 'Primary' ? primaryClass : secondaryClass]">
        {{ text }}
    </button>
</template>
