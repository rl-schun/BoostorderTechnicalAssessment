<script>
import ProductList from "../molecule/ProductList.vue";
import Pagination from "../molecule/Pagination.vue";
export default {
    components: {
        ProductList,
        Pagination,
    },
    data() {
        return {
            productListData: [],
        };
    },
    mounted() {
        async function getProductList() {
            const response = await fetch("http://localhost:8000/productList");
            const jsonData = await response.json();

            return jsonData;
        }

        getProductList().then((response) => {
            this.productListData = response;
        });
    },
};
</script>
<template>
    <div class="grid justify-center content-center my-8 flex-col gap-4">
        <ProductList
            v-if="productListData.length !== 0"
            :product-list="productListData"
        />
        <h2
            v-else
            class="grid justify-center content-center my-8 flex-col gap-4"
        >
            Loading Products...
        </h2>
        <Pagination class="justify-self-end" />
    </div>
</template>
