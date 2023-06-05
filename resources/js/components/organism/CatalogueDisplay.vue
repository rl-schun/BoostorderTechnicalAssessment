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
            totalPage: 0,
            page: 1,
        };
    },
    methods: {
        async getProductList(pageNum) {
            const response = await fetch(
                `http://localhost:8000/productList/${pageNum}`
            );
            const jsonData = await response.json();

            return jsonData;
        },
        async updatePageNum(newPageNum) {
            this.page = newPageNum;
            this.productListData = [];
            this.loadProductList(newPageNum);
        },
        loadProductList(pageNum) {
            this.getProductList(pageNum).then((response) => {
                this.productListData = response.productList;
                this.totalPage = response.totalPage;
            });
        },
        test() {
            console.log("hello world");
        },
    },
    mounted() {
        this.getProductList(this.page).then((response) => {
            this.productListData = response.productList;
            this.totalPage = response.totalPage;
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
        <Pagination
            class="justify-self-end"
            :current="page"
            :total="+totalPage"
            :updatePageNum="updatePageNum"
        />
    </div>
</template>
