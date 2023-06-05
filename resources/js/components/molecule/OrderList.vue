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
            status: ["Pending", "Packed", "Delivery", "Completed"],
            hideNextStageButton: false,
        };
    },
    methods: {
        async getOrderList() {
            const response = await fetch(`http://localhost:8000/order`);
            const jsonData = await response.json();

            const indexOfCurrentStatus = this.status.indexOf(
                jsonData[0].status
            );
            if (indexOfCurrentStatus + 1 == this.status.length) {
                this.hideNextStageButton = true;
            }

            return jsonData;
        },
        async updateOrderStatus() {
            const indexOfCurrentStatus = this.status.indexOf(
                this.orderList[0].status
            );
            if (indexOfCurrentStatus + 1 == this.status.length) {
                return;
            }

            const newStatus = this.status[indexOfCurrentStatus + 1];
            const body = { newStatus };

            fetch("http://localhost:8000/orderstatus", {
                method: "POST",
                body: JSON.stringify(body),
            });

            this.orderList = await this.getOrderList();
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
        <div class="grid" v-if="!this.hideNextStageButton">
            <Button
                class="justify-self-end"
                text="Move to Next Stage"
                :action="this.updateOrderStatus"
            />
        </div>
    </div>
    <div v-else class="grid py-8 justify-center content-center">
        <h2>Empty Cart</h2>
    </div>
</template>
