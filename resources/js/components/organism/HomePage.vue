<script>
import Header from "../atom/Header.vue";
import ProductList from "../molecule/ProductList.vue";
import { defineComponent } from "vue";
export default defineComponent({
    components: { Header, ProductList },
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
});
</script>
<template>
    <div>
        <Header />
        <ProductList :product-list="productListData" />
    </div>
</template>
