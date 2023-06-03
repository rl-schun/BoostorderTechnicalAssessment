<script>
import ProductItem from "./ProductItem.vue";
export default {
    components: {
        ProductItem,
    },
    data() {
        return {
            content: [
                {
                    name: "Testing 1",
                    categories: ["cat1", "cat2"],
                    image: "https://mangomart-autocount.myboostorder.com/wp-content/plugins/woocommerce/assets/images/placeholder.png",
                },
                {
                    name: "Testing 2",
                    categories: ["cat1", "cat2"],
                    image: "https://mangomart-autocount.myboostorder.com/wp-content/plugins/woocommerce/assets/images/placeholder.png",
                },
            ],
        };
    },
};
</script>
<template>
    <div class="grid justify-center content-center mt-8 flex-col gap-4">
        <ProductItem
            v-for="item in content"
            :name="item.name"
            :categories="item.categories"
            :image="item.image"
        />
    </div>
</template>
