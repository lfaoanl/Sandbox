export default {
	open(params) {
		if (typeof params === 'string') this.message = params;
		
		this.className = 'show';
		setTimeout(function(){ this.className = '' }, 3000);
	},
	className: '',
	message: ''
};