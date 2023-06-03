<script>
import { onMounted } from "vue";
import Tag from "../atom/Tag.vue";
export default {
    props: {
        content: Array,
    },
    components: {
        Tag,
    },
    created() {
        console.log(this.content);
    },
};

onMounted(() => {
    console.log(content);
});
</script>

<template>
    <div class="flex gap-2">
        <Tag v-for="item in content" :text="item" />
    </div>
</template>
