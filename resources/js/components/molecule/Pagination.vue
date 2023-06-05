<script>
import MiniButton from "../atom/MiniButton.vue";
export default {
    components: { MiniButton },
    props: {
        total: Number,
        current: Number,
        updatePageNum: Function,
    },
};
</script>

<template>
    <div class="flex gap-1">
        <MiniButton
            text="First"
            type="Primary"
            class="rounded-l-md"
            :action="() => updatePageNum(1)"
        />
        <div
            class="inherit flex gap-1"
            v-if="total >= 3 && current >= 1 && current <= 3"
        >
            <MiniButton
                v-if="total >= 3"
                v-for="index in 3"
                :text="index.toString()"
                :active="current == index"
                :action="() => updatePageNum(index)"
            />
            <MiniButton
                v-if="total > 3"
                text="..."
                :action="() => updatePageNum(4)"
            />
        </div>
        <div class="inherit flex gap-1" v-if="total >= 3 && current > 3">
            <MiniButton
                :text="`${current - 1}`"
                :active="false"
                :action="() => updatePageNum(current - 1)"
            />
            <MiniButton
                :text="`${current}`"
                :active="true"
                :action="() => updatePageNum(current)"
            />
            <MiniButton
                v-if="current + 1 <= total"
                :text="`${current + 1}`"
                :active="false"
                :action="() => updatePageNum(current + 1)"
            />
        </div>
        <MiniButton
            text="Last"
            type="Primary"
            class="rounded-r-md"
            :action="() => updatePageNum(19)"
        />
    </div>
</template>
