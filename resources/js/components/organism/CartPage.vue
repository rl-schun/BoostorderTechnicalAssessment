<script>
import Header from "../atom/Header.vue";
import CartList from "../molecule/CartList.vue";
import { defineComponent } from "vue";
export default defineComponent({
    components: { Header, CartList },
});
</script>
<template>
    <div>
        <Header />
        <CartList />
    </div>
</template>
