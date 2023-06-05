<script>
import MiniButton from "../atom/MiniButton.vue";
export default {
    components: { MiniButton },
};
</script>

<template>
    <div class="flex gap-1">
        <MiniButton text="Previous" type="Primary" class="rounded-l-md" />
        <MiniButton text="1" type="Secondary" />
        <MiniButton text="2" type="Secondary" />
        <MiniButton text="3" type="Secondary" />
        <MiniButton text="..." type="Secondary" />
        <MiniButton text="9" type="Secondary" />
        <MiniButton text="Next" type="Primary" class="rounded-r-md" />
    </div>
</template>
