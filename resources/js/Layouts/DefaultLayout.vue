<template>
    <div class="bg-gray-50">
        <page-nav />
        <slot/>
        <page-footer />
    </div>
</template>
<script>
import PageFooter from "../Shared/PageFooter.vue";
import PageNav from "../Shared/PageNav.vue";

export default {
    components: {PageNav, PageFooter}
}
</script>
