const path = require('path');
const CopyWebpackPlugin = require('copy-webpack-plugin');

module.exports = {
  mode: process.env.NODE_ENV === 'production' ? 'production' : 'development',
  watchOptions: {
    aggregateTimeout: 300,
    poll: 1000,
    ignored: /node_modules/
  },
  entry: ['babel-polyfill', './assets-dev/js/main.js', './assets-dev/scss/main.scss'],
  output: {
    filename: 'js/app.js',
    path: path.resolve(__dirname, './assets'),
  },
  module: {
    rules: [{
      test: /\.js$/, exclude: /node_modules/, loader: 'babel-loader'
    }, {
      test: /\.scss$/,
      use: [{
        loader: 'file-loader',
        options: {
          name: 'css/app.css',
        }
      },
        {
          loader: 'extract-loader'
        },
        {
          loader: 'css-loader'
        },
        {
          loader: 'postcss-loader'
        },
        {
          loader: 'sass-loader'
        }]
    }]
  },
  // plugins: [
  //   new CopyWebpackPlugin({
  //     patterns: [
  //       { from: "./assets-dev/images", to: "./images" },
  //       { from: "./assets-dev/fonts", to: "./fonts" },
  //     ],
  //   }),
  // ],
};