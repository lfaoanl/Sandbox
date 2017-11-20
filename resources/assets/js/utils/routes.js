export default [
	{
		name: 'form',
		path: '/form',
		component: require('../views/Form.vue')
	},
	{
		name: '404',
		path: '*',
		component: require('../views/404.vue')
	},
	
];