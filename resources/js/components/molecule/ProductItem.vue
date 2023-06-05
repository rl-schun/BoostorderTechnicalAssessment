<script>
import TagGroup from "./TagGroup.vue";
import Button from "../atom/Button.vue";
export default {
    props: {
        id: String,
        image: String,
        name: String,
        categories: Array,
        readonly: Boolean,
    },
    components: {
        TagGroup,
        Button,
    },
    data() {
        return {
            clicked: false,
        };
    },
    methods: {
        addToCart() {
            const data = {
                id: this.id,
                name: this.name,
                imageURL: this.image,
            };

            this.clicked = true;
            fetch("/cart", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(data),
            });
        },
    },
};
</script>

<template>
    <div
        class="container rounded-xl border-solid border-slate-300 border-2 flex justify-self-center"
    >
        <img class="w-36 h-36 self-center" :src="image" />
        <div class="px-6 py-4 content-between grid">
            <div>
                <h2 class="text-2xl mb-2">{{ name }}</h2>
                <TagGroup :content="categories" />
            </div>
            <div v-if="!readonly">
                <Button
                    class="mt-8"
                    :text="this.clicked ? '✔️' : 'Add to Cart'"
                    :action="this.addToCart"
                />
            </div>
        </div>
    </div>
</template>
