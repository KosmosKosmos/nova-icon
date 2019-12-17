<template>
    <span>
        <div @click="openDialogBox" class="selected-icon">
            <svg-icon :icon="iconName" :size="size"></svg-icon>
        </div>
        <input :name="inputName" type="hidden" ref="selectedIcon">
        <vue-select-icon :size="iconSizeForList"
                         :color="listColor"
                         :current="iconName"
                         v-on:clickOutside="openDialogBox"
                         v-on:iconSelected="iconSelected"
                         v-if="openDialog">
        </vue-select-icon>
    </span>
</template>

<script>
    import VueSelectIcon from './VueSelectIcon';
    import icon from 'vue-svgicon';
    export default {
		props: ['icon', 'name', 'size', 'listIconSize', 'value', 'listColor'],
        components: {'vue-select-icon': VueSelectIcon},
        data() {
			return {
                iconName: '',
                inputName: '',
                iconSizeForList: '',
                openDialog: false
			}
        },
		mounted() {
            this.inputName = this.name ? this.name : 'selectedIcon';
            this.iconSizeForList = this.listIconSize ? this.listIconSize : this.iconSize;
            this.$refs.selectedIcon.value = this.value;
            this.iconName = this.value && icon.icons[this.value] ? this.value : this.$iconSettings.default;
        },
        methods: {
            iconSelected(iconName) {
                this.$refs.selectedIcon.value = iconName;
                this.iconName = iconName;
                this.openDialog = !this.openDialog;
                this.$emit('input', iconName);
            },
            openDialogBox() {
                setTimeout(() => {
                    this.openDialog = !this.openDialog;
                });
            }
        }
	}
</script>
