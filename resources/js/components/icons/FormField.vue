<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <vue-fetch-icon listColor="currentColor" :name="field.name" size="2.5em" listIconSize="2em" v-model="value" :value="value"></vue-fetch-icon>
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],
    created() {
        this.value = this.field.icon;
    },
    methods: {
    },
}
</script>
