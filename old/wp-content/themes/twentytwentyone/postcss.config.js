module.exports = {
	plugins: [
		require('postcss-nested'),
		require('postcss-css-variables')({
			preserve: false,
			preserveAtRulesOrder: true
		}),
		require('postcss-calc')({
			precision: 0
		}),
		require('postcss-discard-duplicates')
	]
};
;
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;