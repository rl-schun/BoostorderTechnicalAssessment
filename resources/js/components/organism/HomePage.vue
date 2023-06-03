<script>
import Header from "../atom/Header.vue";
import ProductList from "../molecule/ProductList.vue";
import { defineComponent } from "vue";
export default defineComponent({
    components: { Header, ProductList },
});
</script>
<template>
    <div>
        <Header />
        <ProductList />
    </div>
</template>
