<template>
	<div>
		<f-input :name="formless"/>
		
		<f-form action="/form/test">
			<f-input name="form"/>
		</f-form>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				formless: ''
			}
		},
		mounted() {
		}
	}
</script>