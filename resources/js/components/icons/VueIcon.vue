<template>
    <div class="icon-container">
        <svgicon :fill="true" :icon="iconName" :color="usedColors" :width="size" :height="size" @click="handleClick"></svgicon>
        <div class="icon-tooltip" v-if="title">{{ title }}</div>
    </div>
</template>

<script>
    export default {
        props: ['icon', 'title', 'size', 'color'],
        data() {
            return {
                usedColors: '',
                iconName: ''
            }
        },
        watch: {
            icon(newValue, oldValue) {
                this.iconName = newValue
            }
        },
        created: function() {
            this.usedColors = this.color ? this.color : this.$iconSettings.colors;
            this.iconName = this.icon ? this.icon : this.$iconSettings.default;
        },
        methods: {
            handleClick() {
                this.$emit('click', this.iconName);
            }
        }
    }
</script>
