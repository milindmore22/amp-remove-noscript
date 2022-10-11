# AMP Remove duplicate image with noscript fallback.

The Plugin removes duplicate child elements on AMP pages created because of noscript fallback
Support topic https://wordpress.org/support/topic/duplicate-image-in-amp-wordpress-plugin/

## Plugin Structure

```markdown
.
├── sanitizers
│   ├── class-sanitizer.php
└── amp-remove-noscript.php
```
## Sanitizers

The plugin uses `amp_content_sanitizers` filter to add custom sanitizers, we have added a two examples which add simple toggle for menu and search using amp-state and amp-bind.

### Need a feature in plugin?
Feel free to create a issue and will add more examples.