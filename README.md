# Include

Short code to inject **html** or **text** content into page


## Install

### Easy way

awaiting approval from https://wordpress.org

### Hard way

- Copy the `lagden-include.php` to `wp-content/plugins/lagden-include`
- Go to admin panel and activate the plugin


## Usage

Only accept `text/plain` or `text/html`

```
[lagden-in src="includes-html/contato.html" /]
```

**Warning**

The plugin uses `ABSPATH`

**e.g.**

```
includes-html/contato.html -> /some_path/your_wordpress/includes-html/contato.html
```


## License

MIT © [Thiago Lagden](http://lagden.in)
