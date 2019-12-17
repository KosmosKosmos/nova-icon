<template>
    <div class="index-icon">
        <svg-icon :icon="field.icon" size="1.3em"></svg-icon>
    </div>
</template>

<script>
    export default {
        props: ['resourceName', 'field'],
    }
</script>

<style scoped>
    .index-icon {
        display: block;
        position: relative;
        min-width: 1.2em;
        min-height: 1.2em;
    }
    .index-icon:hover .icon-container {
        position: absolute;
        top: 0;
        left: 0;
        transform: translate(-25%, -25%);
        font-size: 2em;
        transition: font-size .2s;
    }
</style>
