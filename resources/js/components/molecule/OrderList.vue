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
            orderList: [],
            status: ["Pending", "Packed", "Delivery", "Complete"],
        };
    },
    methods: {
        async getOrderList() {
            const response = await fetch(`http://localhost:8000/order`);
            const jsonData = await response.json();

            return jsonData;
        },
    },
    mounted() {
        this.getOrderList().then((response) => {
            this.orderList = response;
        });
    },
};
</script>
<template>
    <div
        class="grid gap-2 py-8 justify-center content-center"
        v-if="orderList.length !== 0"
    >
        <ProductItem
            v-for="item in orderList"
            :id="item.id"
            :name="item.name"
            :categories="[{ name: item.status }]"
            :image="item.imageURL"
            :readonly="true"
        />
        <div class="grid">
            <Button
                class="justify-self-end"
                text="Move to Packed"
                :action="this.placeOrder"
            />
        </div>
    </div>
    <div v-else class="grid py-8 justify-center content-center">
        <h2>Empty Cart</h2>
    </div>
</template>
