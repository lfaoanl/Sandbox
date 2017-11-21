<template>
	<div class="snackbar" :class="className">{{ message }}</div>
</template>

<script>
	export default {
		computed: {
			className() {
				return this.$toast.default.className;
			},
			message() {
				return this.$toast.default.message;
			}
		}
	}
</script>