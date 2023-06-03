<script>
import TagGroup from "./TagGroup.vue";
import Button from "../atom/Button.vue";
export default {
    props: {
        image: String,
        name: String,
        categories: Array,
    },
    components: {
        TagGroup,
        Button,
    },
};
</script>

<template>
    <div
        class="container rounded-xl border-solid border-slate-300 border-2 flex justify-self-center w-96"
    >
        <img class="w-36 h-36 rounded-l-xl" :src="image" />
        <div class="px-6 py-4 content-between grid">
            <div>
                <h2 class="text-2xl mb-2">{{ name }}</h2>
                <TagGroup :content="categories" />
            </div>
            <div>
                <Button
                    text="Add to Cart"
                    :action="() => console.log('testing')"
                />
            </div>
        </div>
    </div>
</template>
