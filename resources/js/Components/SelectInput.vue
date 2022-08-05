<template>
  <div :class="$attrs.class">
    <select
      :id="id" ref="input" v-model="selected" v-bind="{ ...$attrs, class: null }"
      class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" :class="{ error: error }"
    >
      <slot />
    </select>
    <div v-if="error" class="form-error text-red-500 text-sm font-semibold">{{ error }}</div>
  </div>
</template>

<script>
import { v4 as uuid } from 'uuid'
export default {
  inheritAttrs: false,
  props: {
    id: {
      type: String,
      default() {
        return `select-input-${uuid()}`
      },
    },
    error: String,
    label: String,
    modelValue: [String, Number, Boolean],
  },
  emits: ['update:modelValue'],
  data() {
    return {
      selected: this.modelValue,
    }
  },
  watch: {
    selected(selected) {
      this.$emit('update:modelValue', selected)
    },
  },
  methods: {
    focus() {
      this.$refs.input.focus()
    },
    select() {
      this.$refs.input.select()
    },
  },
}
</script>
