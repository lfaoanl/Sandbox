<template>
	<div class="field">
		<div class="field">
			<label v-if="!isEmpty(label)" class="label" :for="id">{{ label }}</label>
			<div class="control">
				<input class="input" :class="{ 'is-danger': !isEmpty(getError) }" :id="id" :type="type" v-bind="$attrs" v-model="model" :name="{ name: belongsToForm }" />
				<!-- Icons here -->
			</div>
			<p v-if="!isEmpty(subtitle)" class="help">{{ subtitle }}</p>
			<p v-if="!isEmpty(getError)" class="help is-danger">{{ getError }}</p>
		</div>
		
		<div v-if="!!confirmation" class="field">
			<label v-if="typeof confirmation === 'string'" class="label">{{ confirmation }}</label>
			<div class="control">
				<input class="input" :type="type">
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: {
			name: {
				required: true
			},
			type: {
				default: 'text',
				type: String
			},
			label: {
				default: '',
				type: String
			},
			subtitle: {
				default: '',
				type: String
			},
			confirmation: {
				default: false,
				type: [String, Boolean]
			},
			error: {
				default: '',
				type: String
			}
		},
		
		data() {
			return {
				model: null,
				belongsToForm: false,
				form: null
			};
		},
		
		mounted() {
			if (!this.$parent.$data.isForm) {
				// Not a form
				this.model = this.name;
				this.belongsToForm = false;
			} else {
				// Is in a form
				this.model = this.$parent.$data.form[this.name];
				this.form = this.$parent.$data.form;
				this.belongsToForm = true;
			}
			
			
		},
		
		methods: {
			isEmpty(string) {
				return string === '';
			}
		},
		
		computed: {
			id() {
				return `f-${this.type}-${Math.floor(Math.random() * 100000)}`;
			},
			getError() {
				
				if (!this.isEmpty(this.error) && !this.belongsToForm) {
					return this.error;
				} else if (this.belongsToForm) {
					return this.form.errors.has(this.name) ? this.form.errors.get(this.name) : '';
				}
				
				return '';
			}
		}
	}
</script>