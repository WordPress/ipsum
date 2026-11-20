#!/usr/bin/env python3
"""
Splits Inter into one file per script, so a page only downloads the glyphs it
uses. See https://github.com/WordPress/ipsum/issues/194.

Usage:

	pip install fonttools brotli
	python3 bin/subset-inter.py InterVariable.woff2 InterVariable-Italic.woff2

The two arguments are the full variable fonts from an Inter release
(https://github.com/rsms/inter/releases), in the "web" folder. The script
writes the subsets to assets/fonts/inter/ and prints the fontFace entries to
paste into the Inter font family in theme.json. Run it again every time Inter
is updated.
"""

import json
import sys
from pathlib import Path

from fontTools import subset
from fontTools.ttLib import TTFont

OUTPUT_DIR = Path(__file__).resolve().parent.parent / "assets" / "fonts" / "inter"

# Matches the fontWeight the theme had for Inter before it was split.
FONT_WEIGHT = "100 800"

# The same script ranges Google Fonts uses. Some combining marks are in more
# than one range, so they render with the letters of each script. Latin comes
# last so it wins where ranges overlap: every page loads it anyway.
SUBSETS = [
	("cyrillic-ext", "U+0460-052F, U+1C80-1C8A, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F"),
	("cyrillic", "U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116"),
	("greek-ext", "U+1F00-1FFF"),
	("greek", "U+0370-0377, U+037A-037F, U+0384-038A, U+038C, U+038E-03A1, U+03A3-03FF"),
	("vietnamese", "U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+1EA0-1EF9, U+20AB"),
	("latin-ext", "U+0100-02BA, U+02BD-02C5, U+02C7-02CC, U+02CE-02D7, U+02DD-02FF, U+0304, U+0308, U+0329, U+1D00-1DBF, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF"),
	("latin", "U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD"),
]

# The pyftsubset defaults (kerning, ligatures, marks, fractions and so on),
# plus tabular and case-sensitive forms for font-variant-numeric and
# text-transform. The stylistic sets and character variants are dropped: the
# theme turns none of them on, and they are about a third of the file size.
LAYOUT_FEATURES = subset.Options().layout_features + ["case", "tnum"]


def parse_range(unicode_range):
	"""Turns a unicode-range string into a set of code points."""
	codepoints = set()
	for part in unicode_range.split(","):
		part = part.strip()[2:]
		start, _, end = part.partition("-")
		codepoints.update(range(int(start, 16), int(end or start, 16) + 1))
	return codepoints


def format_range(codepoints):
	"""Turns a set of code points into a unicode-range string."""
	ranges = []
	for cp in sorted(codepoints):
		if ranges and cp == ranges[-1][1] + 1:
			ranges[-1][1] = cp
		else:
			ranges.append([cp, cp])
	return ", ".join(
		"U+%04X" % start if start == end else "U+%04X-%04X" % (start, end)
		for start, end in ranges
	)


def write_subset(source, codepoints, path):
	options = subset.Options()
	options.flavor = "woff2"
	options.layout_features = LAYOUT_FEATURES
	# Keeps the copyright and license strings in every file.
	options.name_IDs = ["*"]
	options.name_languages = ["*"]
	options.notdef_outline = True

	font = TTFont(source)
	subsetter = subset.Subsetter(options)
	subsetter.populate(unicodes=codepoints)
	subsetter.subset(font)
	font.save(path)
	return set(TTFont(path).getBestCmap())


def split(source, style):
	cmap = set(TTFont(source).getBestCmap())
	subsets = [(name, parse_range(unicode_range), unicode_range) for name, unicode_range in SUBSETS]

	# Whatever the script ranges leave out (arrows, math, box drawing and so
	# on) goes into one more file, so no glyph is lost.
	rest = cmap - set().union(*(codepoints for _, codepoints, _ in subsets))
	if rest:
		subsets.insert(0, ("symbols", rest, format_range(rest)))

	faces = []
	covered = set()
	for name, codepoints, unicode_range in subsets:
		if not codepoints & cmap:
			continue
		filename = "inter-var-%s-%s.woff2" % (style, name)
		covered |= write_subset(source, codepoints & cmap, OUTPUT_DIR / filename)
		faces.append(
			{
				"fontFamily": "Inter",
				"fontStyle": style,
				"fontWeight": FONT_WEIGHT,
				"src": ["file:./assets/fonts/inter/" + filename],
				"unicodeRange": unicode_range,
			}
		)

	missing = cmap - covered
	if missing:
		sys.exit("These characters are in no subset: " + format_range(missing))
	return faces


def main():
	if len(sys.argv) != 3:
		sys.exit(__doc__)

	OUTPUT_DIR.mkdir(parents=True, exist_ok=True)
	faces = split(sys.argv[1], "normal") + split(sys.argv[2], "italic")
	print(json.dumps(faces, indent="\t"))


if __name__ == "__main__":
	main()
