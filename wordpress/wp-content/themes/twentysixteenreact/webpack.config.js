var path = require('path');
var webpack = require('webpack');

var loaders = [
	{
		test: /\.jsx?$/,
		exclude: /(node_modules|bower_components)/,
		loader: 'babel'
	}
];

module.exports = [
	{
	    entry: './js/src/server.js',
	    output: {
	        path: __dirname,
	        filename: './js/server.js'
	    },
	    module: {
			loaders: loaders
		},
	    stats: {
	        colors: true
	    }
	},
	{
	    entry: './js/src/client.js',
	    output: {
	        path: __dirname,
	        filename: './js/client.js'
	    },
	    module: {
			loaders: loaders
		},
	    stats: {
	        colors: true
	    }
	}
];
