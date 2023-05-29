<script>
import Header from "../atom/Header.vue";
import { defineComponent } from "vue";
export default defineComponent({
    components: { Header },
});
</script>
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <Header />
                    <div class="card-body">I'm an example component.</div>
                </div>
            </div>
        </div>
    </div>
</template>
