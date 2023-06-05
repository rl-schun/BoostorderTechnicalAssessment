<script>
import ProductItem from "./ProductItem.vue";
import Button from "../atom/Button.vue";
export default {
    components: {
        ProductItem,
        Button,
    },
    data() {
        return {
            cartList: [],
        };
    },
    methods: {
        async getCartList() {
            const response = await fetch(`http://localhost:8000/cart`);
            const jsonData = await response.json();

            return jsonData;
        },
        placeOrder() {
            fetch("http://localhost:8000/createorder", {
                method: "POST",
            });

            this.getCartList().then((response) => {
                this.cartList = response;
            });
        },
    },
    mounted() {
        this.getCartList().then((response) => {
            this.cartList = response;
        });
    },
};
</script>
<template>
    <div
        class="grid gap-2 py-8 justify-center content-center"
        v-if="cartList.length !== 0"
    >
        <ProductItem
            v-for="item in cartList"
            :id="item.id"
            :name="item.name"
            :categories="item.categories"
            :image="item.imageURL"
            :readonly="true"
        />
        <div class="grid">
            <Button
                class="justify-self-end"
                text="Place Order"
                :action="this.placeOrder"
            />
        </div>
    </div>
    <div v-else class="grid py-8 justify-center content-center">
        <h2>Empty Cart</h2>
    </div>
</template>
