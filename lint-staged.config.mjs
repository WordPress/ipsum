import { existsSync } from 'node:fs';

const hasPhpcs = existsSync( new URL( 'vendor/bin/phpcs', import.meta.url ) );

/**
 * Tasks the pre-commit hook runs on staged files. Each task gets the staged
 * files that match its glob.
 */
export default {
	// Without the Composer packages, PHPCS can't check the WordPress Coding
	// Standards, so the check is skipped with a note instead.
	'*.php': hasPhpcs
		? 'composer run lint --'
		: {
				title: 'PHPCS skipped: run "composer install" to check PHP files',
				task: () => {},
			},
	// The validator reads the whole theme, but only reports problems in the
	// files it's given.
	'{theme.json,style.css,styles/**/*.json,patterns/**/*.php,templates/**/*.html,parts/**/*.html}':
		'node bin/validate-theme.mjs',
};
