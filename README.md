![QuicklyScreenshot](/dist/screenshot.png)

# Quickly

A minimal Wordpress Theme intended for customization


## Installation

For local development, place this folder within your Wordpress installation

```bash
wp-content/themes/quickly
```

If you do not wish to use Gulp / Sass / Beautify / BrowserSync, you are free to upload only the "dist" folder as your theme

## Usage

In the command line, cd to the theme folder, then run 'npm install'
```python
$ cd wp-content/themes/quickly

$ npm install
```

This will install all of the necessary packages listed inside the package.json file. Once you have finished installing the dependencies, run 'gulp' to initiate BrowserSync, Live Reload, Sass etc.

```python
$ gulp
```
From this point, you want to edit CSS from the 'src' folder, rather than the 'dist' folder. This is because Gulp will overwrite 'dist/style.css' with whatever you write in 'src/any-file.scss'

## Contributing
If you installed this theme and are having trouble, or want to help improve on it, send me a message and I'll get back to you.

## License
[MIT](https://choosealicense.com/licenses/mit/)

## Screenshots
![QuicklyScreenshot](/src/screenshots/quickly-homepage.jpg)
Sample Homepage
![QuicklyScreenshot](/src/screenshots/quickly-megamenu.jpg)
Flyout Menu
![QuicklyScreenshot](/src/screenshots/quickly-blogsidebar.jpg)
Blog with Sidebar
![QuicklyScreenshot](/src/screenshots/quickly-blogpost.jpg)
Single Post