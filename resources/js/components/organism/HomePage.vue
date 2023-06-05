<script>
import Header from "../atom/Header.vue";
import CatalogueDisplay from "./CatalogueDisplay.vue";
import { defineComponent } from "vue";
export default defineComponent({
    components: { Header, CatalogueDisplay },
});
</script>
<template>
    <div>
        <Header />
        <CatalogueDisplay />
    </div>
</template>
