# Makitweb Copy ID

A lightweight WordPress plugin that adds a **Copy ID** action to the Posts and Pages list in the WordPress admin. Copy any post or page ID to your clipboard in one click — no need to open the editor.

## Demo

📺 **Video:** [I Built a WordPress Plugin with Claude Code — Here's What Actually Happened](https://youtu.be/v2ei1DOiVW8)

📝 **Article:** [Build a WordPress Plugin from Scratch Using Claude Code](https://makitweb.com/i-built-a-wordpress-plugin-with-claude-code-heres-what-actually-happened/)

---

## Features

- Adds a **Copy ID** row action to the Posts list
- Adds a **Copy ID** row action to the Pages list
- Copies the ID to clipboard with one click
- Shows a brief **"ID copied!"** confirmation message
- No settings page, no database writes — zero overhead
- Works with the Clipboard API and includes a fallback for older browsers

## Installation

1. Download or clone this repository
2. Upload the `makitweb-copy-id` folder to `/wp-content/plugins/`
3. Go to **Plugins** in your WordPress admin and activate **Makitweb Copy ID**

## Usage

1. Go to **Posts** or **Pages** in your WordPress admin
2. Hover over any row
3. Click **Copy ID** in the row actions
4. The post or page ID is now in your clipboard

## File Structure

```
makitweb-copy-id/
├── makitweb-copy-id.php   # Main plugin file
└── assets/
    └── js/
        └── copy-id.js     # Clipboard logic
```

## Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher

## License

GPL v2 or later — see [GNU General Public License](https://www.gnu.org/licenses/gpl-2.0.html).
