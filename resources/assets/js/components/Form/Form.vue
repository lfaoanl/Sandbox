<template>
	
	<form @submit.prevent="submit" @keydown="form.errors.clear($event.target)">
		
		<slot></slot>
	
	
	</form>

</template>

<script>
	export default {
		data() {
			return {
				isLoading: false,
				form:      {}
			}
		},
		props: {
			action:      {
				required: true,
				type: String
			},
			method:      {
				default: 'post',
				type: String
			},
			prepopulate: {
				type: Function
			},
			before:      {
				type: Function
			},
		},
		
		methods: {
			submit() {
				/*this.isLoading = true;
				
				if (!!this.before) {
					this.before(this.form);
				}
				
				this.form.submit(this.method, this.action)
					.then(data => {
						this.form.errors.clear();
						this.$emit('success', data);
						
						this.$toast.open({
							message: 'Something happened correctly!',
							type:    'is-success'
						});
						
						this.isLoading = false;
					})
					.catch(error => {
						this.$emit('fail', error);
						
						this.$toast.open({
							message: 'Something happened wrongly!',
							type:    'is-danger'
						});
						
						this.isLoading = false;
					});*/
				
				
				
			}
			
			
		},
		mounted() {
			this.$toast.default.open('kaas')

			/*let data = {};
			
			for (let input of this.$children) {
				if (typeof input.name === 'undefined') continue;
				this.form.set(input.name);
				
				input.initialised = true;
				data[input.name]  = '';
			}
			
			this.form.init(data);
*/
//			if (typeof this.prepopulate !== 'undefined') {
//				this.form.prepopulate(this.action).then(() => {
//					this.$emit('prepopulated')
//				});
//			}
			
		}
	}
</script>