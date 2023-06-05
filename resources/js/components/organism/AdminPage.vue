<script>
import Header from "../atom/Header.vue";
import OrderList from "../molecule/OrderList.vue";
import { defineComponent } from "vue";
export default defineComponent({
    components: { Header, OrderList },
});
</script>
<template>
    <div>
        <Header />
        <OrderList />
    </div>
</template>
