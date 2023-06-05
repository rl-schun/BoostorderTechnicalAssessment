<script>
import ProductItem from "./ProductItem.vue";
export default {
    components: {
        ProductItem,
    },
    props: {
        productList: Array,
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
    <div class="grid gap-2">
        <ProductItem
            v-for="item in productList"
            :id="item.id"
            :name="item.name"
            :categories="item.categories"
            :image="item.imageURL"
        />
    </div>
</template>
