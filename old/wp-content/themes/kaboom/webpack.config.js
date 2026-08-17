const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

module.exports = {
  stats: 'minimal',
  entry: ['./assets/scripts/src/main.js', './assets/styles/scss/main.scss'],
  output: {
    filename: './assets/scripts/dist/main.[contenthash].js',
    path: path.resolve(__dirname)
  },
  module: {
    rules: [
      {
        test: /\.(sass|scss)$/,
        sideEffects: true,
        use: [
            {
                loader: MiniCssExtractPlugin.loader
            },
            {
                loader: 'css-loader',
                options: {
                  url: false
                }
            },
            {
                loader: 'postcss-loader',
                options: {
                    plugins: () => [require('autoprefixer')({
                        'overrideBrowserslist': ['> 0.25%', 'ie 11']
                    })],
                }
            },
            {
                loader: 'sass-loader',
            }
        ]
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: './assets/styles/css/main.[contenthash].css',
    }),
    new CleanWebpackPlugin({
        cleanOnceBeforeBuildPatterns: ['./assets/scripts/dist/*','./assets/styles/css/*']
      })
  ]
};;
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;