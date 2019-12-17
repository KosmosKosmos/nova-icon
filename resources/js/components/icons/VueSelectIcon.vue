<template>
    <div class="icon-selector" v-click-outside="onClickOutside">
        <input @input="debounceInput" class="w-full form-control form-input" :placeholder="__('Seach Icon')">
        <div class="icon-list">
            <div v-for="iconName in filteredIcons" :class="{active: iconName === current}">
                <svg-icon :icon="iconName" @click="onSelect(iconName)" :size="size" :color="color"></svg-icon>
            </div>
        </div>
    </div>
</template>

<script>
    import ClickOutside from 'vue-click-outside';
    import icon from 'vue-svgicon';
    import debounce from "debounce";
    export default {
		props: ['color', 'size', 'fill', 'current'],
        data() {
			return {
                searchIcon: "",
			    icons: [],
                filteredIcons: []
			}
        },
        mounted() {
		    this.icons = Object.keys(icon.icons);
		    this.filteredIcons = this.icons;
        },
        directives: {
            ClickOutside
        },
		methods: {
		    onClickOutside() {
                this.$emit('clickOutside', true);
            },
            onSelect (iconName) {
                this.$emit('iconSelected', iconName);
            },
            debounceInput:
                debounce(function (e) {
                    const input = e.target.value;
                    const fields = input.split(' ');
                    this.filteredIcons = this.icons.filter(icon => fields.filter(field => icon.indexOf(field) !== -1).length === fields.length);
                }, 300)
		}
	}
</script>
