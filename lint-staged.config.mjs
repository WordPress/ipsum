import { execSync } from 'node:child_process';
import { existsSync } from 'node:fs';

const hasPhpcs = existsSync( new URL( 'vendor/bin/phpcs', import.meta.url ) );

/**
 * Tasks the pre-commit hook runs on staged files. Each task gets the staged
 * files that match its glob.
 */
export default {
	// Stylelint checks the CSS against the WordPress CSS Coding Standards. It
	// ignores the generated style.min.css, so --allow-empty-input lets a commit
	// that only rebuilds that file pass.
	'*.css': 'stylelint --allow-empty-input',
	// Rebuilds style.min.css so it lands in the same commit as style.css. It needs
	// its own git add because lint-staged only re-stages the files it matched. This
	// is a function because lint-staged warns about any command with "git add" in
	// it, and that warning would tell contributors to remove a step that's needed.
	'style.css': {
		title: 'Rebuilding style.min.css',
		task: () => {
			execSync( 'npm run build && git add style.min.css' );
		},
	},
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
