const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const path = require('path');

module.exports = {
    ...defaultConfig,
    entry: {
        ...defaultConfig.entry,
        example: path.resolve(process.cwd(), 'src', 'example/index.js'),
        'example-child': path.resolve(process.cwd(), 'src', 'example-child/index.js'),
    }
};